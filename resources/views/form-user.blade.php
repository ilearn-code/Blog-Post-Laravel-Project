<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 ">
        @if(session('message'))
        <div class="alert alert-success mb-3">
            {{ session('message') }}
        </div>
        @endif
        <a href="{{route('show-dashboard-users')}}" class="btn btn-secondary">Back</a>
     
        <form action="{{$url}}" class=" py-5 bg-light rounded" method="post">
            @csrf
            <h2 class="text-center">{{$title}}</h2>
            <div class="row ">

                <div class="form-group col-md-4  offset-md-2 mb-2">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" class="form-control" name="first_name" @if(isset($user_data))
                        value="{{$user_data->first_name}}" @endif placeholder="Enter The First Name">
                    @error('first_name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="form-group col-md-4 mb-2">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" class="form-control" name="last_name" @if(isset($user_data))
                        value="{{$user_data->last_name}}" @endif placeholder="Enter the last name">


                    @error('last_name')
                    <div class="alert alert-danger">

                        {{$message}}

                    </div>
                    @enderror


                </div>

                <div class="form-group col-md-8 offset-md-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" @if(isset($user_data))
                        value="{{$user_data->email}}" @endif name="email" placeholder="Enter Your Email">



                    @error('email')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror


                </div>

                <div class="form-group col-md-8 offset-md-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" value="{{ old('password') ? old('password'): ($user_data->password ?? '') }}" name="password" placeholder="Enter your passowrd">
                    @error('password')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror


                </div>

                <div class="form-group col-md-8 offset-md-2">
                    <label for="cpassword" class="form-label" >Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" value="{{ ($user_data->password ?? null) ? $user_data->password : '' }}
" name="confirm_password"
                        placeholder="confirm Password">


                    @error('confirm_password')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror


                </div>
                <div class="form-group col-md-8 offset-md-2">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="">Select..</option>
                        <option value="1" @if(isset($user_data) && $user_data->status == 1) selected @endif>Approved
                        </option>
                        <option value="2" @if(isset($user_data) && $user_data->status == 2) selected @endif>Pending
                            Approval</option>
                        <option value="0" @if(isset($user_data) && $user_data->status == 0) selected @endif>Disabled
                        </option>
                    </select>
                    @error('status')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                </div>
               
                <div class="form-group col-md-8 offset-md-2">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="">Select..</option>
                        <option value="cw" @if(isset($user_data) && $user_data->role_code=='cw') selected
                            @endif>Content Writer</option>
                        <option value="admin" @if(isset($user_data) && $user_data->role_code == 'admin') selected
                            @endif>Admin</option>
                    </select>
                    @error('role')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                </div>
               

                <div class="col-md-8 m-auto offset-md-4">
                <x-submit-button>Submit</x-submit-button>
                </div>

            </div>
    </div>

    </div>



    </form>

</body>

</html>