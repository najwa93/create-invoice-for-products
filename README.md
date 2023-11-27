<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Introduction
Create invoice for products is a simple laravel project that accepts products from multiple countries(with product details such as weight,item price..) and genrate detailed invoice with total prices

, shipping fees, vat number for products.It also applies some offers on specific products and generatesalso detailed invoice

containing overall total price after discounts. The project created with Laravel framework and Bootstrap for both frontend & backend.

## Development Config & Commands
Please run these commands:

1- git clone https://github.com/najwa93/create-invoice-for-products.git

2- composer install

3- cp .env.example   .env

4- php artisan key:generate

5- npm install

6- npm run build

# Technical Choices & Architecture:
Unfortunately I didn't use specific design pattern, but if I have much time I would use repository design pattern, it applies organization,flexibility and help move between different code resources without affecting
another sections of application's code.

I use Bootstrap Framework because it helps me build professionl interface immediately.If I would have more time, I'd prefer to build admin panel including crud for products and details.

I also would prefer to support printing the invoice with dompdf library. I'd like to make the app support translation and authentication.

I didn't make unit testing because I didn't try it before but maybe if I was gaved more time I read about unit testing and made it.
