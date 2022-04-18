@extends('admin.dashboard')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">View Store</th>
                <th scope="col">Role</th>
                <th scope="col">Change Role</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td> <a href="{{ route('category.edit', $user->id) }}" class="btn btn-primary">View Store</a>
                    </td>
                    <td>{{ $user->roles[0]->name }}</td>
                    <td>
                        @if ($user->roles[0]->name == 'CLIENT')
                            <a href="{{ route('admin.changeRole', $user->id) }}" class="btn btn-primary">Make Admin</a>
                        @endif
                    </td>
                    <td> <a href="/admin/user/delete/{{ $user->id }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
@endsection
