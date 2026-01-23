resource "aws_security_group" "sec_gp_vpc_lfcompany_001" {
  name        = "ssh-access-${var.project_name}-${var.region}-001"
  description = "Permitir entrada SSH"
  vpc_id      = aws_vpc.vpc_lfcompany_001.id

  ingress {
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"] 
  }

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  tags = { 
    Name = "sg-ssh-${var.project_name}-${var.region}-001" 
  }
}