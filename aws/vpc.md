# Creating and configuring VPC :

1. Search 'VPC' service , create one with following configurations :

    IPv4 CIDR 

        10.0.0.0/16 - The range of IP adrress the VPC will have

    No IPv6 CIDR block

2. Create 2 Subnets on VPC created step before, on menu 'Subnet'

    Choose VPC

    Search for 'Zone' 
 
    Choose a 'Subnet Name' refering to the Zone letter

    Choice IPv4 CIDR block , like:

        10.0.1.0/24

        10.0.2.0/24

3. Create 'Internet Gateway' and attach to VPC - Give external access to VPC 'see' the 'Public Internet'

    Give a name for it

    After simple creation , 'Action'->Attach to VPC

4. Edit your VPC to enable 'DNS hostname' and 'Resolutions' to facilite the machines to search each other easier with no IP (can have quick changes)

    -List VPC, select it, 'Action' -> edit DNS hostnames

        Select 'Enable' option

    -List VPC, select it, 'Action' -> edit DNS resolution

        Select 'Enable' option

5. 'Route Table' - Determine how requests from inside and outside will work

    1.Configure the 'Public'/'External' Acess of VPC. It allows APP the go to internet and download packages, eg.

        Create or select one, tab 'Routes' define two IP series:

        Destination        Target
        10.0.0.0/16        local
        0.0.0.0/0          <select Internet Gateway>

        tab 'Subnet associations' need be associated with one subnet created - the subnet 1

    2.Configure the 'Private' Acess of VPC. 

        Create or select one, tab 'Routes' define two IP series:

        Destination        Target
        10.0.0.0/16        local 

        tab 'Subnet associations' need be associated with one subnet created - the subnet 2

6. Configure the Firewall of VPC, RDS, etc

    1. For API , eg:

        Name it

        Select the VPC

        'Inbound Roles' - what origin can from OUT to IN 
            'SSH', port 22, My IP, describe it  
            'HTTP', port 80, My IP, describe it  
            'HTTPS', port 443, My IP, describe it 

    2. For RDS, creating:

        Name it

        Select the VPC

        'Inbound Roles' - what origin can from OUT to IN for two cases:
            'Type Mysql', port 3306, My IP, describe it
            'Type Mysql', port 3306, SG of API, describe it

# Concepts:

VPC
Subnet
Internet Gateway
Route Table
Security Group - Firewall

# Definitions:

Class - Creating VPC on AWS

https://www.youtube.com/watch?v=WMsADIgy4ms&list=PLOF5f9_x-OYUaqJar6EKRAonJNSHDFZUm&index=8
