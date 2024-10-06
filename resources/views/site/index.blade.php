<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

site index

<br>
<br>
<br>

@if(auth('site')->check())
    <div class="d-flex align-items-center mb-3">
        <div class="text-white fw-bold">you are logged in site guard!</div>
        <a class="text-white btn btn-danger bg-gradient mx-2" href="#"
           onclick="event.preventDefault();document.getElementById('site-logout-form').submit();">logout site</a>
        <form id="site-logout-form" action="{{ route('site.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
@else
    <a class="text-white btn btn-success bg-gradient mb-3" href="{{ route('site.showLoginForm') }}">user login</a>
@endif

<br>
<br>
<br>

@if(auth('admin')->check())
    <div class="d-flex align-items-center mb-3">
        <div class="text-white fw-bold">you are logged in admin guard!</div>
        <div class="d-flex">
            <a class="text-white btn btn-danger bg-gradient mx-2" href="#"
               onclick="event.preventDefault();document.getElementById('admin-logout-form').submit();">logout admin</a>
            <a href="{{ route('admin.index') }}">admin panel</a>
        </div>
        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
@else
    <a class="text-white btn btn-success bg-gradient mb-3" href="{{ route('admin.showLoginForm') }}">admin login</a>
@endif


</body>
</html>
