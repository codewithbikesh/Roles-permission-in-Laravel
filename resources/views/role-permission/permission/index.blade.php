<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Permission</title>
  </head>
  <body>
    @include('role-permission.nav-links')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card mt-3">
                    <div class="card-header">
                       <h4>Permission
                        <a href="{{ url('permissions/create') }}" class="btn btn-primary float-end">Add Permission</a>
                       </h4>
                    </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($permissions as $permission)
                        <tr>
                          <td>{{ $permission->id }}</td>
                          <td>{{ $permission->name }}</td>
                          <td>
                            <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-danger">Delete</a>
                          </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>