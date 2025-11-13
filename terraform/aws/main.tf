terraform {
  required_providers {
    aws = {
      source = "hashicorp/aws"
      version = "6.20.0"
    }
  }
}

provider "aws" {
    region = "us-east-1"
}

resource "aws_vpc" "TerraformTestVPC" {
    cidr_block = "11.0.0.0/16"
    tags={
        Name = "TerraformTestVPC"
    }
}

resource "aws_subnet" "TerraformTestSubnet" {
    vpc_id = aws_vpc.TerraformTestVPC.id
    cidr_block = "11.0.1.0/24"
    availability_zone = "us-east-1a"

    tags={
        Name = "TerraformTestSubnet"
    }
}

resource "aws_internet_gateway" "TerraformTestIG" {
    vpc_id = aws_vpc.TerraformTestVPC.id

    tags={
        Name = "TerraformTestIG"
    }
}

resource "aws_route_table" "TerraformTestRT" {
  vpc_id = aws_vpc.TerraformTestVPC.id

  route {
    cidr_block = "0.0.0.0/0"
    gateway_id = aws_internet_gateway.TerraformTestIG.id
  } 

  tags = {
    Name = "TerraformTestRT"
  }
}

resource "aws_route_table_association" "a" {
  subnet_id      = aws_subnet.TerraformTestSubnet.id
  route_table_id = aws_route_table.TerraformTestRT.id
}

resource "aws_security_group" "TerraformTestSG" {
    name        = "TerraformTestSG"
    description = "Allow SSH example"
    vpc_id      = aws_vpc.TerraformTestVPC.id

    ingress {
        from_port = 0
        to_port = 0
        protocol = "-1"
        cidr_blocks = ["0.0.0.0/0"]
        ipv6_cidr_blocks = ["::/0"]
    }

    egress {
        from_port = 0
        to_port = 0
        protocol = "-1"
        cidr_blocks = ["0.0.0.0/0"]
        ipv6_cidr_blocks = ["::/0"]
    }

    tags = {
        Name = "TerraformTestSG"
    }
}

resource "aws_instance" "TerraformTestEC2" {
  ami           = "ami-0c398cb65a93047f2"
  instance_type = "t2.micro"
  subnet_id     = aws_subnet.TerraformTestSubnet.id
  associate_public_ip_address = true 
  key_name = "pay-admin"
  vpc_security_group_ids = [aws_security_group.TerraformTestSG.id]

  tags = {
    Name = "TerraformTestEC2"
  }
}

output "ec2-ip" {
  value = aws_instance.TerraformTestEC2.public_ip
}