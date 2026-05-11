# UniBank+ ☕💳

## 📌 Project Description

UniBank+ is a smart digital banking platform developed as an academic engineering project.  
It provides a modern banking ecosystem with AI-powered services, including credit management, complaints handling, user administration, accounts, and card management.

The platform is built as a **Desktop application (Java/JavaFX)** connected to a shared MySQL database.

The platform aims to simulate a real-world banking system enhanced with Artificial Intelligence, automation, and secure financial operations.

---

## 🚀 Key Features

### 💰 Credit Management
- Credit simulation & monthly payment calculation
- PDF contract generation (iText 7)
- Email sending (JavaMail / Brevo)
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
- AI response suggestion (Grok / OpenRouter)
- Voice-to-text (Vosk)

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
- Financial statistics (JavaFX Charts)
- Currency conversion
- Financial news API (GNews)
- PDF export (iText 7)

### 🪪 Card Management
- Card activation / blocking
- Fraud detection
- Stripe payments
- SMS alerts
- Spending analytics

---

## 🤖 AI & Machine Learning
- Sentiment analysis (HuggingFace)
- Fraud detection system
- AI chatbot (Grok / xAI)
- Voice transcription (Vosk)
- Smart report generation (Grok)
- Image analysis (OCR)
- Toxicity detection

---

## 🛠️ Technologies Used

- Java 17
- JavaFX 17
- Maven
- MySQL / JDBC
- iText 7 (PDF generation)
- JavaMail / Brevo (Email)
- JWT — jjwt
- BCrypt — jBCrypt
- Vosk + JNA (Speech recognition)
- OkHttp (REST API calls)
- Gson / Jackson (JSON)
- Stripe Java SDK
- BootstrapFX
- Ikonli / FontAwesome 5
- dotenv-java
- Google API Client
- Logback

---

## 🧠 Topics
`fintech` `banking-system` `javafx` `java` `ai` `machine-learning` `desktop-app` `api` `security` `digital-banking` `mysql` `pdf` `jwt` `bcrypt` `stripe`

---

## 🔑 Keywords
UniBank+, banking platform, AI banking, credit system, complaint management, fintech project, JavaFX project, smart banking system, desktop banking

---

## 👨‍💻 Team Members

| Module | Member |
|--------|--------|
| 💰 Credit | Asala |
| 📩 Complaint | Lamis Touhami |
| 👤 User | Yassmine |
| 💳 Account | Aya |
| 🪪 Card | Aziz |

---

## ⚙️ Installation

### Prerequisites
- Java 17+
- Maven or [mvnd](https://github.com/apache/maven-mvnd)
- MySQL Server running on `localhost:3306`

### Steps

```bash
# Clone the repository
git clone https://github.com/your-repo/unibank-plus-java.git
cd unibank-plus-java

# Configure your .env file with API keys
# Configure src/main/java/utils/MyDatabase.java with DB credentials

# Run the project
mvn javafx:run
