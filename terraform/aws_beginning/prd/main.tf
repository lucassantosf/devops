# --- 3. Busca Automática da AMI (Amazon Linux 2023) ---
data "aws_ami" "amazon_linux" {
  most_recent = true
  owners      = ["amazon"]

  filter {
    name   = "name"
    values = ["al2023-ami-*-x86_64"]
  }
}

# --- 4. Criação da EC2 na DMZ ---
resource "aws_instance" "web_server" {
  ami           = data.aws_ami.amazon_linux.id
  instance_type = "t3.micro"

  subnet_id              = data.terraform_remote_state.infrastructure_shared.outputs.subnet_lan_001_id
  vpc_security_group_ids = [data.terraform_remote_state.infrastructure_shared.outputs.security_group_lfcompany_001_id]

  tags = {
    Name = "vm-${var.project_name}-${var.region}-001"
  }
}