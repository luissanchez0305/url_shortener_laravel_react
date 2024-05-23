# Laravel URL Shortener Backend

This is the backend for the URL shortener application, built with Laravel.

## Installation

1. **Clone the repository**

    ```
    sh
    git clone https://github.com/luissanchez0305/laravel-url-shortener.git
    cd laravel-url-shortener
    ```

2. **Install dependencies**
    ```
    composer install
    ```

3. **Set up environment variables**
Copy the .env.example file to .env and update the environment variables as needed.

    ```
    sh
    Copiar código
    cp .env.example .env
    ```

4. **Generate application key**
   ```
   php artisan key:generate
   ```

5. **Store sessions on the DB**
    ```
    php artisan session:table
    ```

5. **Run migrations**

    ```
    php artisan migrate
    ```

6. **Install Sanctum for API authentication**

    ```
    php artisan install:api
    ```
## Running the Application

1. **Start the Laravel development server**

    ```
    php artisan serve
    ```

    The application will be available at http://127.0.0.1:8000.


## API Endpoints
- POST /api/shorten: Shortens a URL.

    ```
        Request body: { "original_url": "https://example.com" }
        Response: { "id": 1, "original_url": "https://example.com", "shortened_url": "abcd1234", "created_at": "...", "updated_at": "..." }
    ```
- GET /api/{shortened_url}: Redirects to the original URL.

    ```
    Response: Redirects to the original URL.
    ```

## Running Tests**
    ```
    php artisan test
    ```


