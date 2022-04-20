@extends('client.dashboard')

@section('content')
    <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Product Id</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">More Information</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
                <tr>
                    <th scope="row">{{$key +1}}</th>
                    <td>{{ $order['product_id'] }}</td>
                    <td>{{ $order['quantity'] }}</td>
                    <td>
                        @if ($order['status']=='unpaid')
                            <a href="{{route('order.update',$order['id'])}}"  class="btn btn-secondary">Complete</a>
                        @else
                            <a  class="btn btn-success">Completed</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('order.show',$order['order_id'])}}" class="btn btn-primary">Show</a>
                    </td>
                    <td> <a  href="{{route('order.delete',$order['order_id'])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
