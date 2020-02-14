@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Gallery - {{$product->name}}
                    <a href="{{ route('products.index') }}" class="btn btn-primary float-right">Back</a>
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
                                <td>
                                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="image">Add Image:</label>
                                                <input type="file" id="gallery_img" name="gallery_img[]" multiple>
                                                <span class="text-danger">{{ $errors->first('gallery_img') }}</span>
                                                <input type="hidden" name="prod_id" value="{{$product->id}}">
                                            </div>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                    </form> <br/>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div id="mdb-lightbox-ui"></div>
                                        <div class="mdb-lightbox">
                                        @foreach($product->gallery as $product)
                                          <figure class="col-md-4" style="float: left;">
                                            <a href="{{ asset('/prod_imgs/'.$product->image_url) }}" data-size="1600x1067">
                                              <img alt="picture" src="{{ asset('/prod_imgs/'.$product->image_url) }}" class="img-fluid" style="width: 300px; height: 150px;">
                                            </a>
                                          </figure>
                                        @endforeach
                                        </div>
                                      </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    // MDB Lightbox Init
    $(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
    });
</script>