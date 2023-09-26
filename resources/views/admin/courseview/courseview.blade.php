@extends("admin/layout")
@section("content")
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Course Detels</h1>
        <a href="/courses" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Go back</a>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2">
            @if (isset($message))
                <div class="alert alert-success">{{$message}}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">view couse details:</h6>
                </div>
                <div class="card-body">
                    <table class="table pl-4">
                        <thead>
                            <tr>
                                <th>Couse Category:</th>
                                <td>{{$singledata->category->title}}</td>
                            </tr>
                            <tr>
                                <th>Couse Title:</th>
                                <td>{{$singledata->title}}</td>
                            </tr>
                            <tr>
                                <th class="d-block">Couse Description:</th>
                                <td>{{$singledata->description}}</td>
                            </tr>
                            <tr>
                                <th>Couse Photo:</th>
                                <td>
                                    @if ($singledata->photo)
                                        <img width=200 height=200 src="{{$singledata->photo}}" alt="">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Action:</th>
                                    <td>
                                        <a class="btn btn-success" href="/courses/{{$singledata->id}}/edit">Edit</a>
                                        <form class="d-inline" action="/courses/{{$singledata->id}}" method="post">
                                            @if ($singledata->id)
                                                 @method("delete")
                                             @endif
                                            @csrf
                                            @method("delete")
                                            <button onclick="return confirm('r u sure delete')" class="btn btn-danger">Delete</button>
                                        </form>
                                </td>
                            </tr>
                        </thead>

                    </table>
                </div>
        </div>
    </div>

@endsection
