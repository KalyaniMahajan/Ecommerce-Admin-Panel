@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    All Products
                    <a href="{{ route('products.create') }}" class="btn btn-success float-right">Create product</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name}}</td>
                                <td>
                                    <img src="{{ asset('/images/'.$product->main_image) }}" alt="Image"/>
                                </td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <a href="{{ route('product.gallery', ['product'=> $product->id]) }}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-picture"></i></a>
                                    <a href="{{ route('products.edit', ['product'=> $product->id]) }}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i></a>
                                    <form action="{{ route('products.destroy', ['product'=> $product->id]) }}" method="POST" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
