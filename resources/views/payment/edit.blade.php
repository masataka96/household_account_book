@extends('layouts.app')

@section('content')
<div class="container small">
  <h1>収支を編集</h1>
  <form action="{{ route('payment.update', ['id'=>$payment->id]) }}" method="POST">
  @csrf
    <fieldset>
      <div class="form-group">
            <label for="name">{{ __('内容') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
            <input type="text" class="form-control" name="name" id="name">
            <label for="amount">{{ __('支出|収入') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
            <input type="number" class="form-control" name="amount" id="amount">
            <label for="date">{{ __('日付') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
            <input type="date" class="form-control" name="date" id="date">
      </div>
      <div class="d-flex justify-content-between pt-3">
        <a href="{{ route('payment.index') }}" class="btn btn-outline-secondary" role="button">
            <i class="fa fa-reply mr-1" aria-hidden="true"></i>{{ __('一覧画面へ') }}
        </a>
        <button type="submit" class="btn btn-success">
            {{ __('更新') }}
        </button>
      </div>
    </fieldset>
  </form>
</div>
@endsection