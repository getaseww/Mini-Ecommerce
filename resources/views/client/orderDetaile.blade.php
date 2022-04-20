@extends('client.dashboard')

@section('content')
    <div class="container">
        <h3 class="title">Order Detaile</h3>
        <div class="row">
            <h5 class="orderTitle">Name: </h5>
            <h5>  {{ $order->name }}</h5>
        </div>
        <div class="row">
            <h5 class="orderTitle">E-mail: </h5>
            <h5>  {{ $order->email }}</h5>
        </div>
        <div class="row">
            <h5 class="orderTitle">Phone: </h5>
            <h5>  {{ $order->phone }}</h5>
        </div>
        <div class="row">
            <h5 class="orderTitle">Address: </h5>
            <h5>  {{ $order->address }}</h5>
        </div>
    </div>
@endsection
