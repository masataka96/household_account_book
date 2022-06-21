<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>収支入力画面</title>
    </head>
    <body >
    <body>
    <div class="title">
        <h1>収支一覧</h1>
    </div>
    <div class="main">
        <h2>収支."金額"</h2>
    </div>
    <!-- タスク一覧表示 -->
    @if (count($payments) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Current Payments
        </div>
     
        <div class="panel-body">
            <table class="table table-striped task-table">
     
                <!-- テーブルヘッダ -->
                <thead>
                    <th>Payment</th>
                    <th>&nbsp;</th>
                </thead>
     
                <!-- テーブル本体 -->
                <tbody>
                    @foreach ($tpayments as $payment)
                    <tr>
                        <!-- 収支名 -->
                        <td class="table-text">
                            <div>{{ $payment->name }}</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    </body>
</html>