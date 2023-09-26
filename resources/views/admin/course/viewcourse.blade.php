@extends("admin.layout")
@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Course:</h1>
       <a href="/courses/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
       class="fas fa-plus fa-sm text-white-50"></i>Add course</a>
</div>
<div class="row">
    <div class="col-md-6">
     @if (isset($message))
         <div class="alert alert-success text-capitalize text-center">{{$message}}</div>
     @endif
    </div>
</div>
<div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Couse view:</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Course Name:</th>
                         <th>Catgegory name:</th>
                         <th>Create_Date:</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($alldata as $singledata)
                         <tr>
                            <th>{{$singledata->title}}</th>
                             <th>{{$singledata->category["title"]}}</th>
                             <th>{{$singledata->created_at}}</th>
                             <th>
                                 <a class="btn btn-primary" href="/courses/{{$singledata->id}}">view</a>
                                 <a class="btn btn-success" href="/courses/{{$singledata->id}}/edit">Edit</a>
                                 <form class="d-inline" action="/courses/{{$singledata->id}}" method="post">
                                    @if ($singledata->id)
                                        @method("delete")
                                    @endif
                                     @csrf
                                     @method("delete")
                                     <button onclick="return confirm('r u sure delete')" class="btn btn-danger">Delete</button>
                                 </form>
                             </th>
                         </tr>
                      @endforeach
                 </tbody>
             </table>
      </div>
    </div>
</div>
@endsection
