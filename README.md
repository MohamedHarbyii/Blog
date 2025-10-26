

-----

\<h1 align="center"\>بسم الله الرحمن الرحيم\</h1\>
\<h2 align="center"\>Laravel Blog API\</h2\>

-----

-----

## 📝 Overview

This is a complete **Blog RESTful API** built using the **Laravel Framework**.
It includes user authentication, post & comment management, and a full authorization system using Laravel’s Policies.
Perfect for learning or as a base for your own Laravel-based API projects.

-----

## 🚀 Key Features

  - 🔐 **User Authentication:** Secure register/login using **Laravel Sanctum** (Token-based).
  - 📝 **Post Management (CRUD):** Create, read, update, and delete posts.
  - 💬 **Comment System:** Users can add comments to posts.
  - 🛡️ **Authorization System:** Policies ensure only the post owner or admin can modify/delete.
  - 🏷️ **Extendable:** Add features like categories, tags, or image uploads easily.

-----

## 🛠️ Tech Stack

| Layer | Technology |
|:------|:------------|
| **Backend** | Laravel (PHP 8.2+) |
| **Database** | MySQL |
| **Authentication** | Laravel Sanctum |
| **Testing / Docs** | Postman |

-----

## ⚙️ Getting Started

Follow these steps to run the project locally 👇

### 🧩 Prerequisites

  - PHP \>= 8.2
  - Composer
  - MySQL

### 🏗️ Installation

1.  **Clone the repository**

    ```bash
    git clone https://github.com/MohamedHarbyii/Blog.git
    cd Blog
    ```

2.  **Install dependencies**

    ```bash
    composer install
    ```

3.  **Copy and edit environment file**

    ```bash
    cp .env.example .env
    ```

    *Now, open the `.env` file and set your database credentials (DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD).*

4.  **Generate application key**

    ```bash
    php artisan key:generate
    ```

5.  **Run migrations**

    ```bash
    php artisan migrate
    ```

6.  **(Optional) Seed database**

    ```bash
    php artisan db:seed
    ```

7.  **Start local server**

    ```bash
    php artisan serve
    ```

    *Your API will be live at: `http://localhost:8000`*

-----

## 📚 API Endpoints

You can test these endpoints using Postman.

| Method | Endpoint | Description |
|:---|:---|:---|
| **POST** | `/api/register` | Register a new user |
| **POST** | `/api/login` | Log in and receive token |
| **GET** | `/api/posts` | Get all posts (paginated) |
| **POST** | `/api/posts` | Create new post (Auth required) |
| **GET** | `/api/posts/{id}` | Get single post |
| **PUT** | `/api/posts/{id}` | Update post (Authorized) |
| **DELETE**| `/api/posts/{id}` | Delete post (Authorized) |
| **POST** | `/api/posts/{id}/comments` | Add comment (Auth required) |

-----

## 📄 License

Distributed under the MIT License.
See `LICENSE` file for more details.

-----

## 📬 Contact

**Mohamed Harby**

  - 📧 **Email:** `mohamedharbyii54@gmail.com`
  - 🔗 **LinkedIn:** [LinkedIn Profile](https://www.google.com/search?q=httpsli-nk-to-your-linkedin)
