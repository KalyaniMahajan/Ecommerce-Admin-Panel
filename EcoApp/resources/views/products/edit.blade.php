@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Products
                    <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Create product</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('products.update', ['product'=>$product->id] ) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{ $product->name }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" name="category" value="{{ $product->category_id }}">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description:</label>
                            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="actual_price">Actual Price:</label>
                            <input type="actual_price" class="form-control" id="actual_price" name="actual_price" value="{{ $product->actual_price }}">
                            <span class="text-danger">{{ $errors->first('actual_price') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="discount_price">Discount Price:</label>
                            <input type="discount_price" class="form-control" id="discount_price" name="discount_price" value="{{ $product->discounted_price }}">
                            <span class="text-danger">{{ $errors->first('discount_price') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="image">Product Image:</label>
                            <input type="file" id="image" name="image">
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="image">Add Gallery:</label>
                            <input type="file" id="gallery" name="gallery[]" multiple>
                            <span class="text-danger">{{ $errors->first('gallery') }}</span>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
