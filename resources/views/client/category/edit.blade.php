@extends('client.dashboard')

@section('content')
    <div class="createCatButton  pb-5">
        <a href="/client/category/create">
            <button type="button" class="btn btn-success">Create Category</button></a>
    </div>
    <div class="container">
        <h3 class="title">Add Category</h3>
        <form method="POST" action="{{ route('category.update', $category->id) }}">
            @csrf
            @method('PUT')
            <div class="col mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Category Name') }}</label>

                <div class="col-md-6">
                    <input id="name" value="{{ $category->name }}" type="text"
                        class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                        required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col mb-3">
                <label for="description"
                    class="col-md-4 col-form-label text-md-end">{{ __('Category Description') }}</label>

                <div class="col-md-6">
                    <textarea class="form-control" id="description" type="text" rows="3" @error('description') is-invalid @enderror"
                        name="description" value="{{ old('desc') }}" required autocomplete="description"
                        autofocus>{{ $category->description }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-4 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
