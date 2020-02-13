@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Gallery
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
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->gallery as $product)
                            <tr>
                                <td>
                                    <a href="{{url('storage/product/'.$product->image_url)}}" target="__blank">
                                        <img src="{{url('storage/product/'.$product->image_url)}}" class="img-thumbnail" alt="Image" style="max-width: 150px">
                                    </a>
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
