output "vpc_id" {
  description = "ID da VPC criada para o ambiente"
  value       = aws_vpc.vpc_lfcompany_001.id
}

output "vpc_cidr" {
  description = "Bloco CIDR da VPC"
  value       = aws_vpc.vpc_lfcompany_001.cidr_block
}

output "subnet_dmz_001_id" {
  description = "ID da subnet publica (DMZ)"
  value       = aws_subnet.snet_dmz_001.id
}

output "subnet_lan_001_id" {
  description = "ID da subnet privada (LAN)"
  value       = aws_subnet.snet_lan_001.id
}

output "nat_gateway_001_ip" {
  description = "IP fixo de saida da infraestrutura (NAT EIP)"
  value       = aws_eip.eip_lfcompany_001.public_ip
}

output "security_group_lfcompany_001_id" {
  description = "ID do Security Group de SSH"
  value       = aws_security_group.sec_gp_vpc_lfcompany_001.id
}