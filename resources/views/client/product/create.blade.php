@extends('client.dashboard')

@section('content')
    <div class="container">
        <h3 class="title">Add Product</h3>
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Product Title') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col mb-3">
                <label for="quantity" class="col-md-4 col-form-label text-md-end">{{ __('Quantity') }}</label>
                <div class="col-md-6">
                    <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror"
                        name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>

                    @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col mb-3">
                <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>
                <div class="col-md-6">
                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}" required autocomplete="price" autofocus>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col mb-3">
                <label for="description"
                    class="col-md-4 col-form-label text-md-end">{{ __('Product Description') }}</label>

                <div class="col-md-6">
                    <textarea class="form-control" id="description" type="text" rows="3" @error('description') is-invalid @enderror"
                        name="description" value="{{ old('desc') }}" required autocomplete="description"
                        autofocus></textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col mb-3">
                <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                <div class="col-md-6">
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        value="{{ old('image') }}" required autocomplete="image" autofocus>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- <div class="col mb-3">
                <label for="cat" class="col-md-4 col-form-label text-md-end">{{ __('Select Category') }}</label>
                <select class="selectpicke" name="cat[]" id="category_id" multiple="miltiple" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div> --}}
            <div class="row mt-2">
                <div class="col-md-4 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $('select').selectpicker();

        });
    </script>
@endsection
