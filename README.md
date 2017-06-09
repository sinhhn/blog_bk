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
### Project Structure
https://drive.google.com/open?id=0B_HW_DcSR59FYm9XVFNmM0Y2WU0https://github.com/sinhhn/bloghttps://github.com/sinhhn/bloghttps://drive.google.com/open?id=0B_HW_DcSR59FYm9XVFNmM0Y2WU0https://drive.google.com/open?id=0B_HW_DcSR59FYm9XVFNmM0Y2WU0{}
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
