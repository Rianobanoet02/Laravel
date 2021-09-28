@include('layouts.header')
@include('layouts.silebar')



<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Bordered table</h4>
                <p class="card-description">
                Add class <code>.table-bordered</code>
                </p>
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                </div>
            @endif
           <a href="{{url('crud/create')}}" class="btn btn-primary mr-2">Create Data</a>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th> No</th>
                        <th> Name</th>
                        <th> Address</th>
                        <th> Name File</th>
                        <th> File</th>
                        <th> Date</th>
                        <th> Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach ($cruds as $cd)
                        <tr><td> {{$loop->iteration}}</td>
                        <td> {{$cd->name}}</td>
                        <td> {{$cd->address}}</td>
                        <td> {{$cd->namefile}}</td>
                        <td> {{$cd->file}}</td>
                        <td> {{$cd->date}}</td>
                        <td>
                            <a href="/crud/{{$cd->id}}" class="btn border-success mr-lg-1">edit</a>
                            <a href="/crud/{{$cd->id}}/delete" class="btn border-danger mr-lg-1" onclick="return confirm('apakah anda yakin menghapus data ini')">delete</a>
                        </td>
                    </tr>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
            </div>
            <ul class="pagination">
                <li class="page-item ">
                    {{ $cruds->onEachSide(1)->links() }}
                </li>
            </ul>
            </div>
        </div>
    </div>

@include('layouts.footer')
