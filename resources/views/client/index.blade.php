@extends('client.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="clientDashCard card">
                    <div class="card-body">
                      <h5 class="clientDashTitle card-title">Total Categories</h5>
                      <div class="clientDashButtonContainer">
                        <a href="/client/categories" class="clientDashButton btn btn-primary">{{$categories}}</a>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="clientDashCard card">
                    <div class="card-body">
                      <h5 class="clientDashTitle card-title">Total Products</h5>
                      <div class="clientDashButtonContainer">
                        <a href="/client/products" class="clientDashButton btn btn-primary">{{$products}}</a>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <div style="height:30px"></div>
        <div class="row">
            <div class="col">
                <div class="clientDashCard card">
                    <div class="card-body">
                      <h5 class="clientDashTitle card-title">Pending Orders</h5>
                      <div class="clientDashButtonContainer">
                        <a href="/client/orders" class="clientDashButton btn btn-primary">{{$ordersCount}}</a>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
