# Deploy AWS RDS :

1. Search for RDS service, and 'Create Database' option

2. Select the following options:

    Standard create

    Mysql

    Version : 5.7 , 8.0

    Template: Free Tier

    Identify with name

    -----------------------

    Credentials settings:

    Master username: <LUCASUSER>

    Select 'Auto generate a password' or define/confirm one

        After finally created, if auto generate option selected, will be showed modal 'View Credential details' and password will be saw

    -----------------------

    DB instance class:

    Select the configuration of machine RDS

    db.t2.micro

    -----------------------

    Storage:

    General Purpose (SSD)

    Allocate Storage 20 GB

    Enable storage autoscaling

    -----------------------

    Connectivity:

    Select the VPC 

    Select option - Create new DB Subnet Group

    Public Access (define if your RDS will be access from internet public)

        Yes

    Select the Security Group created only for RDS

    Availabilty Zones:

    Select the zones selected on VPC works - No preference or select ones

    -----------------------

    Database Authentication

    Password Authentication

    -----------------------

    The other options are default, don't need be changed, like backup maintance, eg;

# Helpfuls :

Class - Creating RDS/Aurora on AWS

https://www.youtube.com/watch?v=QIYJ3bFnmIQ&list=PLOF5f9_x-OYUaqJar6EKRAonJNSHDFZUm&index=8