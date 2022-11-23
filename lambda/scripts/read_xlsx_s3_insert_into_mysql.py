import boto3
import pymysql
import pandas as pd 
import io
import os
import time
import calendar
import uuid

s3_cient = boto3.client('s3')

# Read Excel file content from S3 bucket
def read_data_from_s3(event):
    bucket_name = event["Records"][0]["s3"]["bucket"]["name"]
    s3_file_name = event["Records"][0]["s3"]["object"]["key"] 
    resp = s3_cient.get_object(Bucket=bucket_name, Key=s3_file_name)
 
    file_content = resp["Body"].read()
    read_excel_data = io.BytesIO(file_content)

    data = pd.read_excel(read_excel_data)  
    return data
    
# Read folder
def read_folder_from_s3(event):
    bucket_name = event["Records"][0]["s3"]["bucket"]["name"]
    s3_file_name = event["Records"][0]["s3"]["object"]["key"]
    folder = s3_file_name.split('/')
    return folder[0]
    
# Handler
def lambda_handler(event, context):
    rds_endpoint = os.environ['DB_HOST']
    username = os.environ['DB_USERNAME']
    password = os.environ['DB_PASSWORD']
    db_name = os.environ['DB_DATABASE']
    conn = None
    try:
        conn = pymysql.connect(host=rds_endpoint, user=username, passwd=password, db=db_name, connect_timeout=5)
    except pymysql.MySQLError as e:
        print("ERROR: Unexpected error: Could not connect to MySQL instance.")

    data = read_data_from_s3(event)
    folder = read_folder_from_s3(event)
    
    # Iterate over excel file content and insert into MySQL database
    with conn.cursor() as cur:
        for index, row in data.iterrows(): 
            try:  
                string = row.to_json() 
                cur.execute('insert into cargas_logs (content,type) values(%s,%s)',(string,folder))
                conn.commit()
            except Exception as e:
                print(e)
                continue
            
    # Dispatch manually CargaJob into MySQL database
    with conn.cursor() as cur:
        try:
            # Generate UUID
            myuuid = uuid.uuid4()
            myuuid = str(myuuid)
            # Generate payload string for query
            p = '{"uuid": "'+myuuid+'","displayName": "App\\\Jobs\\\CargaJob","job": "Illuminate\\\Queue\\\CallQueuedHandler@call","maxTries": null,"maxExceptions": null,"failOnTimeout": false,"backoff": null,"timeout": null,"retryUntil": null,"data": {"commandName": "App\\\Jobs\\\CargaJob","command": "O:17:\\"App\\\Jobs\\\CargaJob\\":11:{s:7:\\"\\u0000*\\u0000tipo\\";N;s:3:\\"job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}}"}}'
            # Generate timestamp for query
            ts = calendar.timegm(time.gmtime())  
            # Execute query
            cur.execute('insert into jobs (queue,payload,attempts,reserved,available_at,created_at) values ("default",%s,0,0,'+str(ts)+','+str(ts)+')',(str(p)))
            conn.commit()
        except Exception as e:
            print(e)
        
    if conn:
        conn.commit()