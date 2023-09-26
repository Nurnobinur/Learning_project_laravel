@extends("admin.layout")
@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-5">Lession:</h1>
       <a href="/lessions" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
       class="fas fa-download fa-sm text-white-50"></i> Go back</a>
</div>
   <div class="row">
         <div class="col-md-6 offset-3">
             @if ($editdata->id)
                 <h4>Updatae lession</h4>
                 @else
                 <h4>Create lession</h4>
             @endif




            <form action="/lessions/{{$editdata->id}}" method="post" enctype="multipart/form-data">
                @if (isset($editdata->id))
                    @method("put")
                @endif
                @csrf

                <div class="form-group">
                  <label for="title">Write lession:</label>
                  @error("title")
                      <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                  @enderror
                  <input type="text" name="title" value="{{old('title',$editdata->title)}}" class="form-control" id="title" placeholder="Enter lession">
                </div>

                <div class="form-group">
                    <label for="course">Choise course:</label>
                    @error("course_id")
                         <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                     @enderror
                    <select name="course_id" value="{{old('category_id',$editdata->category_id)}}" id="cateory" class="form-control">
                        <option value="">select course:</option>
                        @foreach ($showcourse as $singlecourse )
                            <option value="{{$singlecourse->id}}"  @if ($singlecourse->id==old('course_idd'))
                                selected
                            @endif>
                                {{$singlecourse->title}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Write Description:</label>
                    @error("description")
                    <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                @enderror
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter description">{{old('description',$editdata->description)}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
         </div>

    </div>

@endsection
