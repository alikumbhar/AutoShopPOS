# AWS ECS Fargate Deployment - AutoShopPOS 🚀

This directory contains the complete DevOps automation suite to deploy the AutoShopPOS application on **AWS Elastic Container Service (ECS)** using **Fargate** (Serverless).

## 🏗️ Architecture Overview

The application is containerized and deployed to a highly available AWS environment.

### Deployment Flow
`GitHub Commit` $\rightarrow$ `Jenkins Pipeline` $\rightarrow$ `Docker Hub` $\rightarrow$ `AWS ECS Fargate` $\rightarrow$ `Application Load Balancer (ALB)`

### Tech Stack
- **Containerization**: Docker (PHP 8.2-Apache)
- **CI/CD**: Jenkins (Pipeline-as-Code)
- **Infrastructure**: Terraform (IaC)
- **Orchestration**: AWS ECS Fargate
- **Networking**: AWS VPC, Public/Private Subnets, ALB

---

## 📂 File Structure

| File/Folder | Purpose |
| :--- | :--- |
| `Dockerfile` | Production-grade multi-stage build for the PHP app |
| `terraform/` | IaC files to provision VPC, ECS Cluster, and IAM Roles |
| `Jenkinsfile` | Automated pipeline for Build, Push, and Deploy |

---

## 🚀 Implementation Guide

### 1. Infrastructure Provisioning (Terraform)
The provided Terraform code creates a production-ready environment:
- **VPC**: Isolated network with public and private subnets.
- **ECS Cluster**: A managed cluster for Fargate tasks.
- **IAM Roles**: Specifically scoped execution roles for pulling images from Docker Hub.

```bash
cd aws-ecs-deployment/terraform
terraform init
terraform apply -auto-approve
```

### 2. CI/CD Automation (Jenkins)
The `Jenkinsfile` automates the entire delivery lifecycle:
1. **Checkout**: Pulls the latest code from GitHub.
2. **Build**: Creates a Docker image using the production `Dockerfile`.
3. **Push**: Uploads the tagged image to Docker Hub.
4. **Deploy**: Triggers a `force-new-deployment` on the ECS service to roll out the new version.

### 3. Production Dockerization
The `Dockerfile` is optimized for PHP:
- Uses `php:8.2-apache`.
- Installs necessary extensions (`gd`, `mysqli`, `pdo_mysql`).
- Configures Apache `mod_rewrite` for clean URLs.
- Sets correct `www-data` permissions for security.

---

## 🧠 DevOps Insights
- **Serverless Execution**: By using **Fargate**, we remove the need to manage EC2 worker nodes, reducing operational overhead.
- **Zero-Downtime**: The use of an ALB and ECS rolling updates ensures that users experience no downtime during deployments.
- **Infrastructure as Code**: Every piece of the AWS environment is versioned in Terraform, allowing for instant disaster recovery.
