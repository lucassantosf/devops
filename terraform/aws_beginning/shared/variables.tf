variable "project_name" {
  type    = string
  default = "lfcompany"
}

variable "region" {
  type    = string
  default = "us-east-1"
}

variable "vpc_cidr" {
  type    = string
  default = "10.0.0.0/16"
}

variable "snet_dmz_001_cidr_block" {
  type    = string
  default = "10.0.1.0/24"
}

variable "snet_lan_001_cidr_block" {
  type    = string
  default = "10.0.2.0/24"
}
