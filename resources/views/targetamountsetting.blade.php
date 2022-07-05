<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- 独自のCSSを反映する-->
    <link rel="stylesheet" href="{{asset('css/targetamote.css')}}">

    <title>目標金額設定</title>


</head>

<body>
        <!-- As a link -->
    <nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">家計簿</a>
    </div>
    </nav>

    <h1 class="main-title mt-4">目標金額設定</h1>
    {{Form::open(['method' => 'post' , 'url' => 'targetamountpost'])}}
    <P class="fs-1 text-center mt-5">金額:{{Form::text('money' , $targetamountsetting , ['id' => 'money'])}}</p>
    <P class="fs-3 text-center mt-5">{{ Form::button('設定' , ['type' => 'submit'])}}</P>
    {{Form::close()}}

</body>
</html>
