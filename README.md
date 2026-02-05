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

Since this package is in development, add the repository to your project's `composer.json`:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "[https://github.com/ahmed-tech-t/laravel-starter-kit](https://github.com/ahmed-tech-t/laravel-starter-kit)"
    }
],


Then, run the installation command:


composer require ahmed-tech-t/laravel-starter-kit:dev-main

Usage 💡

Simply run the master command and provide the name of your entity (e.g., Product):
php artisan create Product

Files Generated:

    app/Models/Product.php

    database/migrations/xxxx_create_products_table.php

    app/Services/ProductService.php

    app/Repositories/ProductRepository.php

    app/Repositories/Eloquent/ProductRepositoryImp.php

    app/DTOs/ProductDto.php

    app/Entities/ProductEntity.php

    app/Http/Controllers/ProductController.php

    That's a great call. Keeping everything in English makes your package accessible to the global developer community and aligns with standard Laravel conventions.

Here is the professional, all-English version of your README.md. It’s structured to look like a high-quality open-source tool.
Professional README.md Content
Markdown

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

Since this package is in development, add the repository to your project's `composer.json`:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "[https://github.com/ahmed-tech-t/laravel-starter-kit](https://github.com/ahmed-tech-t/laravel-starter-kit)"
    }
],
```
Then, run the installation command:

```bash
composer require ahmed-tech-t/laravel-starter-kit:dev-main
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