<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
    />

    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

    <title>Laravel 8 Crud</title>
  </head>
  <body class="d-flex vw-100 vh-100 align-items-center justify-content-center">


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        All Students Info
                    </div>
                    @if(session('update'))
                    <div class="alert alert-primary alert-dismissible fade show m-2" role="alert">
                        <strong>{{ session('update') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
                        <strong>{{ session('delete') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Roll</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serial=1;
                                    @endphp
                                    @foreach ($students as $row)
                                        <tr>
                                        <th scope="row">{{$serial++}}</th>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->class }}</td>
                                            <td>{{ $row->roll }}</td>
                                            <td>
                                                <a href="{{ url('student/edit/'.$row->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ url('student/delete/'.$row->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        Add New Student 
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('student/store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=Name>
                                <div id="emailHelp" class="form-text"></div>
                                @error('name')
                                <p class="text-danger">{{ $message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Class</label>
                                <input type="text" name="class"class="form-control @error('class') is-invalid @enderror" id="exampleInputPassword1" placeholder=Class >
                                @error('class')
                                <p class="text-danger">{{ $message}}</p>
                                @enderror
                            </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Roll</label>
                                <input type="text" name="roll" class="form-control @error('roll') is-invalid @enderror" id="exampleInputPassword1" placeholder=Roll >
                                @error('roll')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>

