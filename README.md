# Shipment Tracking Application

A simple Shipment Tracking Web Application built using Laravel 12 and PHP 8.2.
This project allows users to view shipments, track their current status, and see shipment history with a clean, server-rendered interface.

![Project Home](public/homescreen.jpg)

## Features

- Authentication
- Shipment Tracking using Tracking Number
- View all Shipments with Pagination
- Shipment details page


## Tech Stack

- PHP ^8.2
- Laravel Framework ^12.0
- MySQL 
- Blade Templates with SSR
- Tailwind CSS

## Installation & Setup

1. Clone the Repository

```bash
git clone https://github.com/your-username/shipment-tracker.git
cd shipment-tracker
```

2. Install Dependencies

```bash
composer install
npm install
```
3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

4. Run Migrations

```bash
php artisan migrate
```

4. Run Seeders

```bash
php artisan db:seed
```

6. Run project in development

```bash
composer dev
```

## Project Demo

![Project Demo](https://github.com/sreeharshrajan/shipment-tracker-assessment/raw/refs/heads/main/public/project_demo.gif)

![Project Demo - Shipment Details](https://github.com/sreeharshrajan/shipment-tracker-assessment/raw/refs/heads/main/public/homescreen-shipment-details.jpg)

![Project Demo - Shipment Listing](https://github.com/sreeharshrajan/shipment-tracker-assessment/raw/refs/heads/main/public/shipment-listing.jpg)

## License

This project is open-sourced under the MIT License.

## Author

[Sreeharsh Rajan](https://sreeharsh.vercel.app/)
- Full Stack Developer

