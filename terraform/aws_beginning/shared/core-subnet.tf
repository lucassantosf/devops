resource "aws_subnet" "snet_dmz_001" {
  vpc_id     = aws_vpc.vpc_lfcompany_001.id
  cidr_block = "${var.snet_dmz_001_cidr_block}"   

  tags = {
    Name = "snet-dmz-${var.project_name}-${var.region}-001"
  }
}

resource "aws_subnet" "snet_lan_001" {
  vpc_id     = aws_vpc.vpc_lfcompany_001.id
  cidr_block = "${var.snet_lan_001_cidr_block}"

  tags = {
    Name = "snet-lan-${var.project_name}-${var.region}-001"
  }
}