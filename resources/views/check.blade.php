@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title text-center mb-5">CHECK THẺ NẠP</h1>
    <div class="search-card">
        <form action="{{asset('check')}}" method="post" class="my-5">
            @csrf
            @if(session('status'))
            <div class="alert alert-danger">
                {{session('status')}}
            </div>
            @endif
            <div class="row">
                <label for="user_id" class="font-weight-bold">USER_ID:</label>
                <input type="text" class="col-md-4 ml-5" id="user_id" name="user_id">
                <button class="btn btn-danger ml-5">check</button>
            </div>
            <div class="row my-3">
                <label for="status" class="font-weight-bold mr-1">STATUS:</label>
                <select name="status" id="status" class="col-md-4 ml-5">
                    <option value="">chọn</option>
                    <option value="SUCCESS">SUCCESS</option>
                    <option value="FAIL">FAIL</option>
                    <option value="INIT">INIT</option>
                </select>
            </div>
            <div class="row">
            <label for="pay_method" class="font-weight-bold text-uppercase">pay_method:</label>
            <select name="pay_method" id="pay_method" class="col-md-4 ml-5 mb-3">
                    <option value="">chọn</option>
                    <option value="txu">TXU</option>
                    <option value="vtc_card">VTC_CARD</option>
                    <option value="fpt_gate">FPT_GATE</option>
                    <option value="phone_card">PHONE_CARD</option>
                    <option value="appota_pay">APPOTA_PAY</option>
                </select>
            </div>
            <div class="row">
                <label for="transaction_id" class="font-weight-bold">TRANSACTION_ID:</label>
                <input type="text" class="col-md-4 ml-5" id="transaction_id" name="transaction_id">
            </div>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>order_id</th>
                    <th>pay_method</th>
                    <th>receive_to</th>
                    <th>user_id</th>
                    <th>amount</th>
                    <th>status</th>
                    <th>payment_gate</th>
                </tr>
            </thead>
            <tbody>
            @foreach($card as $item)
                <tr>
                    <td>{{$item->order_id}}</td>
                    <td>{{$item->pay_method}}</td>
                    <td>{{$item->receive_to}}</td>
                    <td>{{$item->user_id}}</td>
                    <td>{{ number_format($item->amount,0,'','.') }}đ</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->payment_gate}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script>
            $(function() {
                $("td:contains('SUCCESS')").css("background-color", "#31B404");
                $("td:contains('FAIL')").css("background-color", "##DF0101");
            });
        </script>



        @endsection