# Laravel Starter Kit 🚀

A powerful Laravel Artisan generator to scaffold a complete Architectural Layer (Model, Service, Repository, DTO, etc.) in a single command. 

This package is designed for developers who follow clean code principles and want to skip the repetitive "boilerplate" phase of starting a new feature.

## Features ✨

Generates the following layers automatically:
* **Model & Migration**: Standard Laravel database layer.
* **Service Layer**: For handling Business Logic.
* **Repository Pattern**: Interface and Eloquent Implementation.
* **DTOs & Entities**: For structured data handling.
* **Mappers**: To transform data between layers.
* **Controller**: A pre-configured controller to tie it all together.

## Installation 🛠️


Run the following command in your Laravel project:

```bash
composer require ahmed-tech-t/laravel-starter-kit
```
Usage 💡

Simply run the master command and provide the name of your entity (e.g., Product):
Bash

```bash
php artisan create Product
```
Files Generated:

    app/Models/Product.php

    database/migrations/xxxx_create_products_table.php

    app/Services/ProductService.php

    app/Repositories/ProductRepository.php

    app/Repositories/Eloquent/ProductRepositoryImp.php

    app/DTOs/ProductDto.php

    app/Entities/ProductEntity.php

    app/Http/Controllers/ProductController.php

Requirements ⚠️

    PHP: 8.0+

    Laravel: 9.0 | 10.0 | 11.0+

Contributing 🤝

Contributions are welcome! If you have suggestions for improving the architecture or adding new stubs, feel free to open a Pull Request.

Maintained by Ahmed Rashed
