@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Categories
                    <a href="{{ url('/') }}" class="btn btn-primary float-right">Back</a>
                    <a href="{{ route('categories.create') }}" class="btn btn-success float-right" style="margin-right: 5px;">Add Category</a>
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
                                <th>Category Name</th>
                                <th>Parent Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allCats as $category)
                                <tr>
                                <td>{{ $category->name}}</td>
                                    <td>
                                        @if ($category->parent)
                                            {{ $category->parent->name}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('categories.edit', ['category'=> $category->id]) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                        <form action="{{ route('categories.destroy', ['category'=> $category->id]) }}" method="POST" style="display: inline-block;">
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
