# Note: this is visual and doesn't currently function (at least I haven't tested it)

# Super basic example of Terraform structure
# Configs Terraform settings and the relevant providers
terraform {

  # Terraform backends are 
  # backend "s3" {
  #   bucket = "<bucket-name>"
  #   key    = "terraform.tfstate"
  #   region = "<region>"
  #   dynamodb_table = "<table-name>"
  # }

  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "~> 4.16"
    }
  }

  required_version = ">= 1.2.0"
}

# Authenticates against the provider
provider "aws" {
  access_key=""
  secret_key=""
  region=""
}

# Provisions resources as required (resource name recognised by provider followed by custom name)
resource "random_id" "sample" {
  byte_length = 4
}

resource "aws_s3_bucket" "my_bucket" {
  bucket = "my-first-bucket-${random_id.sample.hex}"

  tags = {
    Name = "My first bucket"
    Environment = "Staging"
  }

  # Provisioners can be used to run scripts locally or remotely (based on type) for pre and post creation/destruction.
  # provisioner "remote-exec"/"local-exec" {}
}
