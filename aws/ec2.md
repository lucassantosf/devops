# Deploy AWS EC2 :

1. Search for EC2 service, and click on 'Launch instances'

2. Select the following options:

    Give a name

    Select the OS Image 

    Select instance type (configuration : RAM,CPU,etc)

    Network settings ( Select VPC created before, Subnet )

    Select Firewall ( Security Group created for this only API )

    Select size of Storage

    Create new key .pem for SSH 

# Image ?

    After created the EC2, and installed all the aplication you wanna run with in this EC2, you can build a image of all this files.

    It's like a 'backup' of your EC2, after taked the image, you can select this image when lauching a new one, and up a new EC2 equals

    your image. 


# Helpfuls :

Class - Creating EC2 on AWS

https://www.youtube.com/watch?v=a6nU5NTHJDM&list=PLOF5f9_x-OYUaqJar6EKRAonJNSHDFZUm&index=10