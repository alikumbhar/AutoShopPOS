# AutoShopPOS - Professional Automotive Point of Sale System 🏎️💼

AutoShopPOS is a comprehensive Point of Sale (POS) and management system designed specifically for automotive businesses. This project showcases the integration of a functional business application with a **modern, enterprise-grade DevOps lifecycle**.

---

## 🌟 Project Overview

AutoShopPOS streamlines the operations of an auto shop, from inventory management and customer tracking to order processing and billing. 

### 🛠️ Technical Stack
- **Frontend/Backend**: PHP 8.2, Apache, JavaScript, CSS3, HTML5
- **Database**: MySQL
- **Architecture**: Monolithic MVC (Model-View-Controller) pattern
- **Deployment**: AWS ECS Fargate (Serverless Containers)

---

## 🚀 DevOps Transformation (The "Professional" Edge)

While the application provides business value, the **true engineering value** of this repository lies in its automated deployment lifecycle. I have implemented a full production-ready pipeline to move this app from code to cloud.

### 🏗️ The Cloud Architecture
The application is deployed using a **Cloud-Native approach** on AWS:
- **Containerization**: The app is wrapped in a production-grade Docker image, ensuring "it works on my machine" translates to "it works in production."
- **Serverless Orchestration**: Deployed on **AWS ECS Fargate**, eliminating the need to manage underlying EC2 servers and reducing operational toil.
- **High Availability**: Integrated with an **Application Load Balancer (ALB)** to distribute traffic and ensure zero-downtime updates.
- **Infrastructure as Code (IaC)**: The entire environment (VPC, Subnets, ECS Cluster, IAM Roles) is provisioned using **Terraform**, making the infrastructure reproducible and version-controlled.

### 🔄 CI/CD Pipeline Flow
I implemented a fully automated pipeline via **Jenkins**:
`GitHub Commit` $\rightarrow$ `Docker Build` $\rightarrow$ `Push to Registry` $\rightarrow$ `Terraform Apply` $\rightarrow$ `ECS Service Update`

---

## 📂 Repository Structure

| Folder/File | Purpose |
| :--- | :--- |
| `/application` | Core business logic and PHP controllers |
| `/system` | System configuration and database handlers |
| `/pos` | Point of Sale interface and transaction logic |
| `/aws-ecs-deployment` | **(DevOps Core)** Contains the Dockerfile, Terraform IaC, and Jenkinsfile |
| `index.php` | Main application entry point |

---

## 🛠️ Quick Start for Developers

### Local Development
1. Clone the repo: `git clone https://github.com/alikumbhar/AutoShopPOS.git`
2. Set up a local Apache/MySQL environment (XAMPP/WAMP).
3. Import the database schema provided in the `system/` directory.
4. Configure database credentials in the config file.

### Cloud Deployment (DevOps Path)
If you want to deploy this to AWS:
1. Navigate to `aws-ecs-deployment/terraform` and run `terraform apply`.
2. Use the `Jenkinsfile` in the same directory to automate the build and deploy.

---

## 🧠 Engineering Insights
- **Scalability**: By moving from a traditional VM to ECS Fargate, the application can now auto-scale based on CPU/Memory demand.
- **Security**: The Dockerfile is optimized to run as a non-root user where possible and uses specific PHP extensions to minimize the attack surface.
- **Maintainability**: Separating the `/aws-ecs-deployment` folder allows the developers to focus on the PHP code while the DevOps engineer manages the infrastructure.
