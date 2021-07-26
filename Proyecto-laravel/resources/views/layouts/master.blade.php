<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Learn laravel</title>
</head>
<body>
    {{-- {{dump($errors)}} --}}

    {{-- @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif --}}
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    @if(isset($errors) && $errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @yield('content')
</body>
</html>