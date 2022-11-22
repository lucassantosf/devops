import boto3
import pymysql
import pandas as pd 
import io
import json

s3_cient = boto3.client('s3')

# Read XLSX file content from S3 bucket
def read_data_from_s3(event):
    bucket_name = event["Records"][0]["s3"]["bucket"]["name"]
    s3_file_name = event["Records"][0]["s3"]["object"]["key"]
    resp = s3_cient.get_object(Bucket=bucket_name, Key=s3_file_name)
    
    file_content = resp["Body"].read()
    read_excel_data = io.BytesIO(file_content)

    data = pd.read_excel(read_excel_data)  
    return data

def lambda_handler(event, context):
    rds_endpoint  = ">>>"
    username = ">>>"
    password = ">>>"
    db_name = "lambda"
    conn = None
    try:
        conn = pymysql.connect(host=rds_endpoint, user=username, passwd=password, db=db_name, connect_timeout=5)
    except pymysql.MySQLError as e:
        print("ERROR: Unexpected error: Could not connect to MySQL instance.")

    data = read_data_from_s3(event) 
        
    with conn.cursor() as cur:
        for index, row in data.iterrows(): # Iterate over excel file content and insert into MySQL database
            try: 
                string = json.dumps(row.to_json()) 
                print('string',string) 
                cur.execute('insert into Employees (Name) values(%s)' % (string))
                conn.commit()
            except Exception as e:
                print(e)
                continue  
        
    if conn:
        conn.commit()