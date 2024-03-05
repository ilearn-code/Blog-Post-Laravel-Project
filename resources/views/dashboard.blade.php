<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">
  <style>
    table th,
    td {
      text-align: center;
    }

    .table img {
      min-width: 50px;
      /* Adjust this value as needed */
      height: auto;
      /* Maintain aspect ratio */
      max-width: 100%;
      /* Ensure image doesn't exceed cell width */
    }


  </style>
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">

        <!-- Left side of the navbar -->
        <div class="d-flex justify-content-start align-items-center">
            <!-- Items aligned at the start -->
            <div class="nav-item me-3 h5">Welocome , {{ucfirst(session()->get('first_name'))}}</div>
            <a class="nav-item nav-link bg-danger p-2" href="{{url('/logout')}}">logout</a>
        </div>

        <!-- Center of the navbar -->
        <div class="navbar-brand mx-auto">
            <!-- Items centered horizontally -->
            <span class="navbar-brand mb-0 ">Dashboard</span>
        </div>

        <!-- Right side of the navbar -->
        <div class="d-flex justify-content-end align-items-center">
           
                @if(request()->routeIs('show-dashboard-posts'))
                <a class="btn btn-primary mx-2 p-2" href="{{url('/posts/add')}}">Add</a>
                @if(session()->get('role')=='admin')
                <a class="nav-link btn btn-success mx-2 p-2" href="{{ route('show-dashboard-users') }}">All Users</a>
                @endif
                @else
                <a class="btn btn-primary mx-2 p-2" href="{{url('/user/add')}}">Add</a>
                <a class="nav-link btn btn-success mx-2 p-2" href="{{ route('show-dashboard-posts') }}">All Posts</a>
                @endif
       
        </div>

    </div>
</nav>



  <!-- @php
  pp(request()->session()->get('user_id'));

  @endphp -->

  @if(session('message'))

  {{session('message')}}

  @endif

  @if(request()->routeIs('show-dashboard-posts'))
  @include('posts')
  @elseif(request()->routeIs('show-dashboard-users'))
  @include('users')
  @endif




  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    crossorigin="anonymous"></script>
</body>

</html>