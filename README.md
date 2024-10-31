## Country Query Backend (Laravel)

This Laravel backend project retrieves country information from the World Bank API based on ISO codes. It handles the API request, processes the response, and returns data in JSON format.

### Prerequisites

* PHP >= 8.0
* Composer
* Laravel 11
* Git

### Setup Instructions

1. **Clone the Repository:**

```bash
git clone https://github.com/JoshuaGr33n/country-query-backend.git
cd laravel-country-query-backend
```

2. **Install Dependencies:**

```bash
composer install
```

3. **Environment Configuration (if needed):**

* Duplicate `.env.example` to `.env`.
* Configure the `.env` file with your settings (if needed).

4. **Generate Application Key:**

```bash
php artisan key:generate
```

5. **Run the Laravel Server:**

```bash
php artisan serve
```

### API Endpoint

Access the API at `http://localhost:8000/country` (or your server's base URL).

**Example Request (POST /country):**

```json
{
  "code": "US"
}
```

### Testing

Run tests with:

```bash
php artisan test
```

### Additional Information

* This project doesn't use a database.

