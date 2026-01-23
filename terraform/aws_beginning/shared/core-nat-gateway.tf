resource "aws_eip" "eip_lfcompany_001" {
  domain = "vpc"

  tags = {
    Name = "eip-nat-${var.project_name}-${var.region}-001"
  }
}

resource "aws_nat_gateway" "nat_lfcompany_001" {
  allocation_id = aws_eip.eip_lfcompany_001.id
  subnet_id     = aws_subnet.snet_dmz_001.id  

  tags = {
    Name = "nat-${var.project_name}-${var.region}-001"
  }

  # Garante que o IGW seja criado antes do NAT
  depends_on = [aws_internet_gateway.igw_lfcompany]
}