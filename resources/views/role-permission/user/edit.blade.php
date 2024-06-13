<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Role</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <h4>Edit User
                        <a href="{{ url('users') }}" class="btn btn-primary float-end">Back</a>
                       </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('users/'.$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                         <div class="mb-3">
                               <label for="">Name</label>
                               <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
                               @error('name')
                               <span class="text-danger">{{ $message }}</span>
                               @enderror
                         </div>
                         <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" readonly class="form-control" />
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                      </div>
                      <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                  </div>
                  <div class="mb-3">
                    <label for="">Role</label>
                    <select name="roles[]" class="form-control" multiple>
                        <option value="">Select Role</option>
                        @foreach ($roles as $role)
                        <option 
                        value="{{ $role }}" 
                        {{ in_array($role, $userRoles)? 'selected':''}}
                        >{{ $role }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
              </div>
                         <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                         </div>
                    </form>
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