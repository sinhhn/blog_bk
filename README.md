# blog
## Basic controller - view
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
//uss @yield, @include
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
