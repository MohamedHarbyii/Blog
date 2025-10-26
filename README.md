<h1 align="center">بسم الله الرحمن الرحيم</h1>

<h2 align="center">🧠 Laravel Blog API</h2>

<p align="center">
A complete RESTful Blog API built with Laravel, featuring authentication, authorization, and full CRUD operations.
</p>

---

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white)

---

## 📘 About the Project

This project is a **Blog API** built with **Laravel**, designed to demonstrate backend development skills — including authentication, authorization, and data handling.  
It’s fully RESTful and ready to integrate with any frontend (like React, Vue, or mobile apps).

---

## 🚀 Features

✅ **User Authentication:**  
Secure registration and login using **Laravel Sanctum (Token-based)**.

✅ **Post Management (CRUD):**  
Users can create, read, update, and delete their own posts.

✅ **Comment System:**  
Users can comment on posts.

✅ **Authorization with Policies:**  
Only post owners (or admins) can modify or delete their posts.

✅ **Tag & Category Support:**  
(Optional) Organize posts by tags or categories.

---

## 🧩 Tech Stack

| Layer | Technology |
| :--- | :--- |
| **Backend Framework** | Laravel (PHP 8.2+) |
| **Database** | MySQL |
| **Authentication** | Laravel Sanctum |
| **API Testing** | Postman |
| **Documentation** | Markdown / Postman Collection |

---

## ⚙️ Installation Guide

Follow these steps to set up the project locally 👇

### 1️⃣ Clone the repository
```bash
git clone https://github.com/MohamedHarbyii/Blog.git
cd Blog
2️⃣ Install dependencies
bash
Copy code
composer install
3️⃣ Configure environment
Copy the example environment file and update database credentials:

bash
Copy code
cp .env.example .env
Then edit .env:

ini
Copy code
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
4️⃣ Generate the app key
bash
Copy code
php artisan key:generate
5️⃣ Run migrations
bash
Copy code
php artisan migrate
6️⃣ (Optional) Seed database
bash
Copy code
php artisan db:seed
7️⃣ Start the server
bash
Copy code
php artisan serve
Your API will be available at 👉 http://localhost:8000

📡 API Endpoints
Method	Endpoint	Description
POST	/api/register	Register a new user
POST	/api/login	Log in a user and receive token
GET	/api/posts	Get all posts (paginated)
POST	/api/posts	Create a new post (requires auth)
GET	/api/posts/{id}	Get a single post
PUT	/api/posts/{id}	Update a post (authorized only)
DELETE	/api/posts/{id}	Delete a post (authorized only)
POST	/api/posts/{id}/comments	Add a comment (requires auth)

🧪 API Testing
You can test all API endpoints using Postman.
📁 Postman Collection: coming soon
(or export your collection from Postman and upload it to the repo)

🖼️ Preview
(Add screenshots here — e.g., Postman requests, API responses, or database structure)

📜 License
This project is open source and distributed under the MIT License.
See the LICENSE file for more information.

👤 Author
Mohamed Harby
📧 mohamedharbyii54@gmail.com
🔗 LinkedIn Profile

⭐ If you found this project helpful, please give it a star on GitHub
