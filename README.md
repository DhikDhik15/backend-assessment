<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How To Use

- Clone from this repository.
- Run in console composer update.
- Run in console php artisan storage:link.
- Run in console php artisan:migrate.
- Run in console php artisan db:seed.

## Answer number 1 until 3

- Run in console php artisan app:solve-assessment

## Answer number 4

- Run in console php artisan serve
- Run in other console curl http://localhost:8000/api/ping

## Answer Number 6

SELECT c.name, p.name AS product, SUM(o.total_price) AS total_spent
FROM customers c
JOIN orders o ON c.id = o.customer_id
JOIN products p ON o.product_id = p.id
WHERE c.city = 'New York'
GROUP BY c.name, p.name;
