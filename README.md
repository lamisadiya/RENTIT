# 📦 RENTIT — Online House & Apartment Rental Platform

RENTIT is a complete property rental platform built using **HTML, CSS, JavaScript, PHP, and MySQL**.  
It allows users to browse apartments, submit rental applications, make payments, and manage their profiles.  
Admins can manage listings, review applications, and update project details.

---

## 🚀 Features

### 👤 User Features
- User signup & login (session-based authentication)  
- Browse apartments by location (Bashundhara, Gulshan, Uttara, etc.)  
- View full project details with images  
- Submit rental applications  
- View payment status, receipts & confirmations  
- Update personal profile  

### 🛠️ Admin Features
- Admin login  
- Add, edit, and delete apartment listings  
- Approve or decline rental applications  
- View all submitted applications  
- Manage project categories & images  

### 💳 Payment Workflow
- Payment form  
- Payment receipt  
- Payment success page  

---
## 📁 Project Structure
RENTIT/
│
├── index.html                # Homepage
├── Login.html                # User login page
├── Signup.html               # User signup page
├── logout.php                # Logout handler
│
├── admin_dashboard.html      # Admin dashboard
├── adminLogin.html           # Admin login
│
├── addapartment.html         # Add project/apartment form
├── delete_listing.php        # Delete listing
├── delete_application.php    # Remove submitted application
│
├── rentalapplicationform.html  # Submit rental application
├── insert_data.php           # Save application details into DB
│
├── payment.html              # Payment form
├── paymentreceipt.html       # Receipt
├── paymentsuccessful.html    # Success message
│
├── Bashundharaprojects.html
├── Gulshanprojects.html
├── Uttaraprojcts.html        # Property listings by area
│
├── # JavaScript files
│   ├── loginCheck.js
│   ├── loadApartmentGulshan.js
│   ├── loadApartmentBashundhara.js
│   └── loadApartmentUttara.js
│
├── # Stylesheets
│   ├── master.css
│   ├── homestyle.css
│   ├── contact.css
│   ├── inbox.css
│   └── form.css
│
│
├── rentitdb.sql              # Database export
└── README.md                 # About the project


---

## 🛠️ Tech Stack

### Frontend
- HTML5  
- CSS3  
- JavaScript  

### Backend
- PHP (Core PHP)

### Database
- MySQL  
- phpMyAdmin  

### Hosting
- XAMPP / WAMP / cPanel supported  

---

## 🔧 Setup Instructions

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/lamisadiya/RENTIT.git
cd RENTIT

## 📁 Project Structure

