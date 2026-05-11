# UniBank+ 🌐💳

## 📌 Project Description

UniBank+ is a smart digital banking platform developed as an academic engineering project.  
It provides a modern banking ecosystem with AI-powered services, including credit management, complaints handling, user administration, accounts, and card management.

The platform is built on **two integrated versions** — a **Web version (Symfony)** and a **Desktop version (Java/JavaFX)** — both sharing the same MySQL database.

The platform aims to simulate a real-world banking system enhanced with Artificial Intelligence, automation, and secure financial operations.

---

## 🖥️ Platform Versions

| Feature | 🌐 Web (Symfony) | ☕ Desktop (Java/JavaFX) |
|---------|-----------------|------------------------|
| Credit Management | ✅ | ✅ |
| Complaint Management | ✅ | ✅ |
| User Management | ✅ | ✅ |
| Account Management | ✅ | ✅ |
| Card Management | ✅ | ✅ |
| Shared Database | ✅ MySQL | ✅ MySQL |

---

## 🚀 Key Features

### 💰 Credit Management
- Credit simulation & monthly payment calculation
- PDF contract generation (Dompdf / iText 7)
- Email sending (Symfony Mailer / JavaMail)
- Currency conversion API
- Interactive map of agencies
- AI voice assistant (Vosk)

### 📩 Complaint Management (AI Powered)
- Full CRUD system
- Pagination & filtering
- AI sentiment analysis (HuggingFace)
- Duplicate detection (Eden AI)
- Auto-summarization
- OCR image moderation
- AI response suggestion (OpenRouter / Grok)
- Voice-to-text (Vosk / Whisper)

### 👤 User Management
- User CRUD
- Search & filters
- Authentication (JWT / session)
- OTP verification via email
- Login history tracking
- hCaptcha integration
- AI reports generation (Grok)

### 💳 Account Management
- Deposit / withdrawal
- Transaction history
- QR Code payments
- Financial statistics (Google Charts / JavaFX Charts)
- Currency conversion
- Financial news API (GNews)
- PDF export

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
- AI chatbot (Ollama / Qwen / Grok)
- Voice transcription (Vosk / Whisper)
- Smart report generation (Grok)
- Image analysis (OCR)
- Toxicity detection

---

## 🛠️ Technologies Used

### 🌐 Web Version (Symfony)
- Symfony 6.4
- PHP 8+
- Doctrine ORM
- Twig
- MySQL
- REST API
- Docker (optional)
- Chart.js
- Bootstrap

### ☕ Desktop Version (Java)
- Java 17
- JavaFX 17
- Maven
- MySQL / JDBC
- iText 7 (PDF)
- JavaMail / Brevo
- JWT (jjwt) / BCrypt (jBCrypt)
- Vosk + JNA (Speech recognition)
- OkHttp / Gson / Jackson
- Stripe Java SDK
- BootstrapFX / Ikonli
- dotenv-java

---

## 🧠 Topics
`fintech`, `banking-system`, `symfony`, `javafx`, `java`, `ai`, `machine-learning`, `web-development`, `desktop-app`, `api`, `security`, `digital-banking`, `php`, `mysql`

---

## 🔑 Keywords
UniBank+, banking platform, AI banking, credit system, complaint management, fintech project, Symfony project, JavaFX project, smart banking system, desktop banking, web banking

---

## 👨‍💻 Team Members

| Module | Member |
|--------|--------|
| Credit | Asala |
| Complaint | Lamis Touhami |
| User | Yassmine |
| Account | Aya |
| Card | Aziz |

---

## ⚙️ Installation

### 🌐 Web Version (Symfony)

```bash
git clone https://github.com/your-repo/unibank-plus.git
cd unibank-plus
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
symfony server:start
