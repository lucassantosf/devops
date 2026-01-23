resource "aws_internet_gateway" "igw_lfcompany" {
  vpc_id = aws_vpc.vpc_lfcompany_001.id

  tags = {
    Name = "igw-${var.project_name}-${var.region}-001"
  }
}