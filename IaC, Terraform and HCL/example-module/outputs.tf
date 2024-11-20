output "public_ip" {
  description = "The public IP of the created EC2 instance."
  value       = aws_instance.demo_instance.public_ip
}