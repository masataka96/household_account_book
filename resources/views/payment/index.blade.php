@extends('layouts.app')

@extends('layouts.base')

@section('title','家計簿アプリ')

@section('h1','家計簿')

@section('content')

<h1>収支一覧</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>日時</th>
            <th>収支名</th>
            <th>金額</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($payments as $payment)
        <tr>
            <td>{{ $payment->date }}</td>
            <td>{{ $payment->payment_name }}</td>
            <td>{{ $payment->amount }}</td>
            <td><a href="{{ route('payment.edit', ['id'=>$payment->id]) }}" class="btn btn-info">編集</a></td>
            <td>
                <form action="{{ route('payment.destroy', ['id'=>$payment->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('payment.create') }}"><p>収支の登録へ</p></a>
@endsection