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
    <title>家計簿</title>
</head>
<header>
    <h1 class="main-title mt-5">家計簿</h1>
</header>
<body>
<P class="fs-2 text-center">目標金額:{{$money ?? ''}}</P>
<div class="container overflow-hidden">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 border bg-light text-primary ">収入</div>
    </div>
    <div class="col">
      <div class="p-3 border bg-light text-danger">支出</div>
    </div>
  </div>
</div>
<!-- セルに罫線を表示 -->
<table class="table table-bordered mt-5 mb-5 text-center">
  <thead  class="main-column">
    <tr>
      <th scope="col" class="text-primary">収入</th>
      <th scope="col" class="text-danger">支出</th>
      <th scope="col" class="text-success">内容</th>
      <th scope="col">日付</th>
    </tr>
  </thead>
</table>
<div class="card" style="width: 150px;">
  <h5 class="card-header">結果</h5>
  <div class="card-body">
    <a href="#" class=""></a>
  </div>
</div>
</body>
</html>



