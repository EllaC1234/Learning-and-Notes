# Variables - global or module level. Direct or input assignment.
# The variables will often be defined in variables.tf and actual values in variables.tfvars.
variable "instance_type" {
  type = string
  default = "t2.micro"
  description = "EC2 Instance Type"

  # Can provide validations for variables
  validation {
   condition = length(var.instance_type) > 4
   error_message = "The instance type provided is not valid."
 }
}

# Local variables - module or config level. 
locals {
  ami_id = "ami-0c55b159cbfafe1f0"
}

# Using env variables 
resource "aws_vpc" "sample_vpc" {
  cidr_block = "{{vpc_cidr_block}}" 
  instance_tenancy = "{{instance_tenancy}}"
}

# Create an EC2 instance
resource "aws_instance" "example" {
  ami = local.ami_id
  instance_type = var.instance_type

  tags = {
    Name = "Terraform-created-instance"
  }
}

# Output variable
output "instance_id" {
  value = aws_instance.example.ami
}