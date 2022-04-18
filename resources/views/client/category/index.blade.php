@extends('client.dashboard')

@section('content')
    <div class="createCatButton  pb-5">
        <a href="/client/category/create">
            <button type="button" class="btn btn-success">Create Category</button></a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Category Name</th>
                <th scope="col">Visibility</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $cat)
                <tr>
                    <th scope="row">{{ $cat->id }}</th>
                    <td>{{ $cat->name }}</td>
                    <td>
                        @if ($cat->visible)
                            <a href="/client/category/visibility/{{$cat->id}}"  class="btn btn-primary">Hide</a>
                        @else
                            <a href="/client/category/visibility/{{$cat->id}}" class="btn btn-secondary">Display</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('category.edit',$cat->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td> <a  href="/client/category/delete/{{$cat->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $category->links() !!}
@endsection
