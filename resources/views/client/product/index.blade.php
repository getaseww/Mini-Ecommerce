@extends('client.dashboard')

@section('content')@extends('client.dashboard')

@section('content')
    <div class="createCatButton  pb-5">
        <a href="/client/product/create">
            <button type="button" class="btn btn-success">Add Product</button></a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td> <a  href="/client/product/delete/{{$product->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}
@endsection

@endsection