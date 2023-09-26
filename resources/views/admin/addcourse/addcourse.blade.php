@extends("admin.layout")
@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-5">Course:</h1>
       <a href="/categorise" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
       class="fas fa-download fa-sm text-white-50"></i> Go back</a>
</div>
   <div class="row">
         <div class="col-md-6 offset-3">
             @if ($editdata->id)
                 <h4>Updatae Category</h4>
                 @else
                 <h4>Create Category</h4>
             @endif




            <form action="/courses/{{$editdata->id}}" method="post" enctype="multipart/form-data">
                @if (isset($editdata->id))
                    @method("put")
                @endif
                @csrf

                <div class="form-group">
                  <label for="title">Write Course:</label>
                  @error("title")
                      <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                  @enderror
                  <input type="text" name="title" value="{{old('title',$editdata->title)}}" class="form-control" id="title" placeholder="Enter course">
                </div>

                <div class="form-group">
                    <label for="photo">Choise category:</label>
                    @error("title")
                         <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                     @enderror
                    <select name="category_id" value="{{old('category_id',$editdata->category_id)}}" id="cateory" class="form-control">
                        <option value="">select valule:</option>
                        @foreach ($showcategory as $singlecategory )
                            <option value="{{$singlecategory->id}}"  @if ($singlecategory->id==old('category_idd'))
                                selected
                            @endif>
                                {{$singlecategory->title}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Write Description:</label>
                    @error("description")
                    <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                @enderror
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter course">{{old('description',$editdata->description)}}</textarea>
                </div>

                <div class="form-group">
                    <label for="photo">Choise photo:</label>
                    @error("photo")
                        <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                    @enderror
                    <input type="file" value="{{$editdata->photo}}" name="photo" id="photo" class="form-control" placeholder="Enter course">
                    @if ($editdata->photo)
                        <img width="120" class="mt-3" height="120" src="{{$editdata->photo}}" alt="">

                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
         </div>

    </div>

@endsection
