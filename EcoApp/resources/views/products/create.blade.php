@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
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
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description:</label>
                            <textarea class="form-control" id="description" placeholder="Enter description" name="description"></textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="actual_price">Actual Price:</label>
                            <input type="actual_price" class="form-control" id="actual_price" placeholder="Enter actual price" name="actual_price">
                            <span class="text-danger">{{ $errors->first('actual_price') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="discount_price">Discount Price:</label>
                            <input type="discount_price" class="form-control" id="discount_price" placeholder="Enter discount price" name="discount_price">
                            <span class="text-danger">{{ $errors->first('discount_price') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="image">Product Image:</label>
                            <input type="file" id="image" name="image">
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
