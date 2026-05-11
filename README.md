## 📌 Project Description
UniBank+ is a smart digital banking platform developed as an academic engineering project.  
It provides a modern banking ecosystem with AI-powered services, including credit management, complaints handling, user administration, accounts, and card management.

The platform aims to simulate a real-world banking system enhanced with Artificial Intelligence, automation, and secure financial operations.

---

## 🚀 Key Features

### 💰 Credit Management
- Credit simulation
- Monthly payment calculation
- PDF contract generation (Dompdf)
- Email sending (Symfony Mailer)
- Currency conversion API
- Interactive map of agencies
- AI voice assistant

### 📩 Complaint Management (AI Powered)
- Full CRUD system
- Pagination & filtering
- AI sentiment analysis (HuggingFace)
- Duplicate detection (Eden AI)
- Auto-summarization
- OCR image moderation
- AI response suggestion (OpenRouter)

### 👤 User Management
- User CRUD
- Search & filters
- Authentication (JWT / session)
- OTP verification
- Login history tracking
- AI reports generation

### 💳 Account Management
- Deposit / withdrawal
- Transaction history
- QR Code payments
- Financial statistics (Google Charts)
- Currency conversion
- Financial news API

### 🪪 Card Management
- Card activation / blocking
- Fraud detection
- Stripe payments
- SMS alerts (Twilio)
- Crypto news integration
- Spending analytics

---

## 🤖 AI & Machine Learning
- Sentiment analysis (HuggingFace)
- Fraud detection system
- Naive Bayes / K-Means clustering
- AI chatbot (Ollama / Qwen)
- Voice transcription (Whisper)
- Smart report generation (Grok)

---

## 🛠️ Technologies Used
- Symfony 6.4
- PHP 8+
- Doctrine ORM
- Twig
- MySQL
- REST API
- Docker (optional)
- Chart.js
- Bootstrap

---

## 🧠 Topics
fintech, banking-system, symfony, ai, machine-learning, web-development, api, security, digital-banking, php, mysql

---

## 🔑 Keywords
UniBank+, banking platform, AI banking, credit system, complaint management, fintech project, Symfony project, smart banking system

---

## 👨‍💻 Team Members
- Credit Module: Asala
- Complaint Module: Lamis Touhami
- User Module: Yassmine
- Account Module: Aya
- Card Module: Aziz

---

## ⚙️ Installation
git clone https://github.com/your-repo/unibank-plus.git
cd unibank-plus
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
symfony server:start
