# HelloNina - Blog

Codes for the new blog plataform to be used in [hellonina](http://hellonina.com.br/).

## Getting Started

This repository is a learning object for building a new blog plataform.

### Prerequisites

To run the project you'll need to supply Laravel server requirements as shown in the  [documentation](https://laravel.com/docs/5.4/installation):
* PHP >= 5.6.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension


### Installing

Clone/extract the project source onto your machine:

```
git clone https://github.com/ninamarra/blog_laravel.git
```

Install the project with composer:

```
cd your/project/folder
composer install
```

Create a new **.env** file from the **.env.example** and generate a new key for your project:
```
cp .env.example .env
php artisan key:generate
```

All set. To run the project use:
```
php artisan serve
```

You need to update the **.env** file with your credentials. Don't forget to create the database.

## Built With
* [Laravel](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Renda template](https://moozthemes.com/renda-clean-blog-bootstrap-theme/) - Blog template
* [CoreUI](http://coreui.io/) - Admin panel template

## Authors

* **Nina Marra** - *Initial work* - [the blog](http://hellonina.com.br/)


## Acknowledgments

I'm keeping solutions for doubts that appeard during the development in a file - see [REFERTO.md](REFERTO.md) for details.
