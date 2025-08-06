# Open Healthcare Management System (OHMS)

## Introduction

Welcome to the Open Healthcare Management System (OHMS)! This system aims to revolutionize healthcare management for small and medium-sized medical enterprises and practitioners. By providing innovative solutions to traditional inefficiencies, OHMS strives to streamline operations, enhance patient-provider interactions, and elevate the quality of care delivery.

## Background of the Project

OHMS emerged in response to the challenges faced by SME medical centers and individual practitioners. Traditional healthcare appointment systems and management solutions often suffer from inefficiencies that hinder effective patient care. OHMS is designed to address these challenges and provide a comprehensive solution tailored to the unique needs of SME medical centers and independent practitioners.

## Objectives and Scope

The primary objective of OHMS is to develop a secure, streamlined Healthcare Membership Management System (HMMS) specifically for SME medical centers and practitioners. OHMS focuses on improving patient engagement, increasing healthcare provider efficiency, and elevating overall healthcare outcomes. Key features include:

- Intuitive appointment scheduling  
- Robust patient data management  
- Clear medication and treatment communication  
- A patient-centric approach to care delivery

## Installation Instructions

To install and run the Open Healthcare Management System (OHMS) locally or on a server:

1. **Clone the repository**

   git clone https://github.com/your-username/your-repo-name.git  
   cd your-repo-name

2. **Install dependencies**

   composer install  
   npm install

3. **Set up environment configuration**

   cp .env.example .env  
   Then update `.env` with:
   - Database credentials  
   - Stripe (test or live) keys  
   - SMTP mail settings

4. **Optimize the application**

   php artisan optimize

5. **Create a storage symlink**

   php artisan storage:link

6. **Build frontend assets**

   npm run dev  
   (Use `npm run build` for production)

7. **Run migrations and seed the database**

   php artisan migrate:fresh --seed

8. **Start the development server**

   php artisan serve  
   Then open http://localhost:8000 in your browser.

### Default Admin Credentials

- Email: admin@example.com  
- Password: admin@321

> ⚠️ Change these credentials before deploying to production.


## Default Admin Credentials

To access the system with administrative privileges, use the following default credentials:

- **Name:** Admin  
- **Email:** `admin@example.com`  
- **Password:** `admin@321`

> ⚠️ **Important:** For security purposes, it is strongly recommended to change the default admin password after the first login in a production environment.

## Developed By

**Project Group 11 – Final Year Applied Project**  
**Unit:** CSG3101.2 – Applied Project  
**Trimester:** 2024 T1, ECU SRI

**Students:**
- Chandima Galahitiyawa (10637143)  
- Hiruni Hansika (10639177)  
- Packiyanathan Jeewandhiga (10635068)  
- Minadi Vimansa (10624233)

**Supervised by:**
- Lead Coordinator: Dr. Maneesha Caldera  
- Project Supervisor: Ms. Inoshi Madushika Jayaweera