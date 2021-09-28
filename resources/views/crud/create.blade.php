@include('layouts.header')
@include('layouts.silebar')



<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic form elements</h4>
                <form class="forms-sample" method="post" action="{{url('/crud/create')}}" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" @error('name') is-invalid @enderror name="name" id="name" placeholder="Name" req>
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputAddress3">Address</label>
                    <input type="text" class="form-control"@error('address') is-invalid @enderror name="address" id="exampleInputAddress3" placeholder="Address">
                    @error('address')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPFile4">file name</label>
                    <input type="text" class="form-control" @error('filename') is-invalid @enderror name="namefile" id="exampleInputFile4" placeholder="File">
                    @error('filename')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" @error('file') is-invalid @enderror type="file" id="formFile" name="file" placeholder="file" >
                    @error('file')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputdate3">date</label>
                    <input type="date" class="form-control" @error('file') is-invalid @enderror name="date" id="exampleInputdate3" placeholder="date">
                    @error('date')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>

                </div>

                </form>
            </div>
            </div>
        </div>
      </div>













@include('layouts.footer')
