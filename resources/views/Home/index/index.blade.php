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
    <form action="/home/index" method="post">
        {{ csrf_field() }}  {{-- 隐藏域 和token值--}}
        <input type="text" name="username"></br>
        <input type="text" name="age"></br>
        <input type="text" name="sex"></br>
        <input type="submit" value="提交">
    </form>
</body>
</html>