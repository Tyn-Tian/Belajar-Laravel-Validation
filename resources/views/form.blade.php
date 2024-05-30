<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/login">
        @csrf
        <label for="username">Username <input type="text" name="usename"></label> <br>
        <label for="password">Password <input type="text" name="password"></label> <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>