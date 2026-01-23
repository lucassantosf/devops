# --- TABELA PUBLICA (DMZ) ---
resource "aws_route_table" "rt_public_001" {
  vpc_id = aws_vpc.vpc_lfcompany_001.id

  route {
    cidr_block = "0.0.0.0/0"
    gateway_id = aws_internet_gateway.igw_lfcompany.id
  }

  tags = {
    Name = "rt-pub-${var.project_name}-${var.region}-001"
  }
}

resource "aws_route_table_association" "rta_public_001" {
  subnet_id      = aws_subnet.snet_dmz_001.id
  route_table_id = aws_route_table.rt_public_001.id
}

# --- TABELA PRIVADA (LAN) ---
resource "aws_route_table" "rt_private_001" {
  vpc_id = aws_vpc.vpc_lfcompany_001.id

  route {
    cidr_block     = "0.0.0.0/0"
    nat_gateway_id = aws_nat_gateway.nat_lfcompany_001.id
  }

  tags = {
    Name = "rt-priv-${var.project_name}-${var.region}-001"
  }
}

resource "aws_route_table_association" "rta_private_001" {
  subnet_id      = aws_subnet.snet_lan_001.id
  route_table_id = aws_route_table.rt_private_001.id
}