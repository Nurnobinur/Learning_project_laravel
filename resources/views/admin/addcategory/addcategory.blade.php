@extends("admin.layout")
@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Category</h1>
       <a href="/categorise" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
       class="fas fa-download fa-sm text-white-50"></i> Go back</a>
</div>
   <div class="row">
         <div class="col-md-6 offset-3">
            <form action="/categorise/{{$editdadta->id}}" method="post">
                @if (isset($editdadta->id))
                    @method("put")
                @endif
                @csrf
                <div class="form-group">
                  <label for="title">Write Category:</label>
                  @error("title")
                      <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                  @enderror
                  <input type="text" value="{{old('title',$editdadta->title)}}" name="title" class="form-control" id="title" placeholder="Enter catagory">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
         </div>

    </div>

@endsection
