# Create your own Blog with laravel and docker
## Development Environment
### Install
* [Install laravel](https://laravel.com/docs/5.4#installing-laravel)
* [Install Docker](https://www.docker.com)
* [laradock](http://laradock.io/getting-started/)

### Config
* Create blog project
```
laravel new blog
```
* Go to blog directory and checkout laradock
* Go to laradock directory, create .env config
```
cp env-example .env
```
* Create docker container
```
docker-compose up -d mysql nginx redis
```
* Create database
```
docker-compose exec mysql bash
mysql -uroot -proot
create database blog;
```
* Modify .env of your project as bellow:
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=root
```
* migrate database
```
docker-compose exec workspace bash
php artisan migrate
```
* Acess localhost


## Basic of laravel

### Basic controller - view
```
//Route
Route::get('/', 'PageControllers@getIndex'); //// should be last line in route

//Controller
namespace App\Http\Controllers;


class PageControllers extends Controller
{
    public function getIndex()
    {
        return view('welcome');//// welcome view
    }
}
```

## Passing data to view
```
//Controller
namespace App\Http\Controllers;

class PageControllers extends Controller
{
    public function getIndex()
    {
        $data = [];
        $data['fullname'] = "laziii";
        $data['greeting'] = "Hello";
        return view('welcome')->withData($data); // It's mean: pass $data to welcome view
    }
}

//View
//welcome.blade.php
<h1>{{$data['greeting']}} {{$data['fullname'] }}</h1>
```

### Layout with blade
//use @yield, @include
```
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>
<body>
@include('partials._nav')

<div class="container">
    @yield('content')
    @include('partials._footer')
</div>

@include('partials._javascript')
</body>

</html>

```
### Working with model
* Create a new model
```
php artisan make:model Post -m // -m or --migration 
```
* Define a table
```
// database/migrations
class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');    // create auto increment colunm
            $table->string('title')->default('No title given');     //varchar colunm
            $table->text('body');     // Text colunm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

```
After defined table, you can migrate with php artisan:
```
php artisan migrate
```

### Working with Form
Use Laravel Collective From
* Update composer
```
// Composer.json
 "require": {
        "php": ">=5.6.4",
        "laravel/framework": "5.4.*",
        "laravel/tinker": "~1.0",
        "laravelcollective/html":"^5.4.0"
    },
    
// Run command
composer update
```
* Add to project
```
//config/app.php
'providers' => [
///
Collective\Html\HtmlServiceProvider::class,
///
]

'aliases' => [
///
'Form' => Collective\Html\FormFacade::class,
'Html' => Collective\Html\HtmlFacade::class,
///
]

// view
{!! Form::open(['route' => 'posts.store']) !!}
            {{Form::label('title', 'Title')}}
            {{Form::text('title', null, array('class' => 'form-control'))}}
            {{Form::label('body', 'Post Body:')}}
            {{Form::textarea('body', null, array('class' => 'form-control'))}}

            {{Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;'))}}
            {!! Form::close() !!}
```

