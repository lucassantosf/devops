output "bucket_arn" {
  value       = aws_s3_bucket.bucket.arn
  description = "The ARN of the s3 bucket"
}

output "bucket_id" {
  description = "The ID of the s3 bucket"
  value       = aws_s3_bucket.bucket.id
}

output "bucket_policy" {
  description = "The policy of the s3 bucket"
  value       = aws_s3_bucket_policy.bucket_policy.policy
}