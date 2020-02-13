@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit Category
                    <a href="{{ route('categories.index') }}" class="btn btn-primary float-right">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('categories.update', ['category'=>$category->id] ) }}" method="post">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group">
                            <label for="name">Category Name:</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{ $category->name }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Parent Category:</label>
                            <select class="form-control" name="parent_category">
                                <option>Select a category</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" @if($cat->id == $category->parent_id) selected @endif>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('parent_category') }}</span>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
