<html>
<head>
<title>Welcome: @yield('title',$title)</title>
<link rel="stylesheet" href="{{url('lib/bootstrap/css/bootstrap.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
        <h1>College Management System</h1>
        <br>
        <a href="{{route('home')}}">Home</a>
        <a href="{{route('about')}}">About</a>
        <a href="{{route('contact')}}">Contact</a>
        <a href="{{route('program')}}">Program</a> 
        <hr>
        </div>
        @yield('body')
        @yield('container')
    </div>
</body>
</html>