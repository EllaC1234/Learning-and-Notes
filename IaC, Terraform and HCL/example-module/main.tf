# Defines module
resource "aws_instance" "demo_instance" {
  ami           = var.ami_id
  instance_type = var.instance_type
  subnet_id     = var.subnet_id
}

# Would then be referenced from root directory as:
# module "demo_instance" {
#   source = "./example-module"

#   instance_type     = "t2.micro"
#   ami_id            = "ami-0942ecd5d85baa812"
#   subnet_id         = "subnet-0de74f42ed235f734"
# }

# Outputs from root directory:
# output "public_ip" {
#   value = module.demo_instance.public_ip
# }