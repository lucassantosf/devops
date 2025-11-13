# AWS Lambda Data Processing Scripts

## Overview
This repository contains AWS Lambda scripts for processing data from S3 and inserting it into MySQL databases, with a focus on CSV and Excel file handling.

## Library Dependencies
### Required Libraries
- `pymysql.zip` (in `libs/`): MySQL database connector
- `pandas_xlrd.zip` (in `libs/`): Pandas library for Excel file processing

## Script Types

### CSV Processing
- `read_csv_s3_insert_into_mysql.py`
  - Reads CSV files from Amazon S3
  - Inserts data into MySQL database
  - **Requires**: `pymysql` library

### Excel Processing
- `read_xlsx_s3_insert_into_mysql.py`
  - Basic XLSX file processing from S3
  - Inserts data into MySQL
  - **Requires**: `pymysql` and `pandas` libraries

- `read_xlsx_s3_insert_into_mysql_data_type.py`
  - Advanced Excel processing
  - Handles data type conversions
  - **Requires**: `pymysql` and `pandas` libraries

- `read_xlsx_s3_insert_into_mysql_data_type_delete_file.py`
  - Comprehensive Excel processing
  - Performs data type conversion
  - Deletes source file after successful processing
  - **Requires**: `pymysql` and `pandas` libraries

### Additional Tools
- `slack_integration`: Potential notification system

## Setup and Configuration

### Library Installation
1. Ensure `pymysql.zip` is in `libs/` directory for MySQL connectivity
2. Add `pandas_xlrd.zip` to `libs/` for Excel file processing

### Lambda Layer Configuration
- Use AWS Lambda Layers to manage external libraries
- Attach library ZIP files as Lambda Layers

## Learning Resources
### Tutorial Videos
- [AWS: Read CSV from S3 to MySQL via Lambda](https://www.youtube.com/watch?v=ozbsi3AVcZY)
- [Read Excel from S3 on Lambda Trigger](https://www.youtube.com/watch?v=WadlKJW6Jh8)
- [AWS Lambda Layers for Pandas](https://www.youtube.com/watch?v=zrrH9nbSPhQ)

## Best Practices
- Use Lambda Layers for library management
- Implement error handling
- Configure appropriate IAM roles
- Use environment variables for sensitive information

## Contribution
Improvements and additional data processing scripts are welcome.

## Disclaimer
These scripts are for educational purposes. Always test thoroughly in a controlled environment before production use.
