
<div class="container">

<div class="row justify-content-center">

  <div class="col-md-10">


    <table class="table mt-5">
      <thead>
        <tr>
          <th>
         First Name
          </th>
          <th>
            Last Name
          </th>
          <th>
            Email
          </th>
          <th>
            Password
          </th>
          <th>
            status
          </th>
          <th>Role Code</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)

        <tr>
          <td>
            {{ucfirst($user->first_name)}}
          </td>

          <td>
            {{ucfirst($user->last_name)}}
          </td>
          <td>
            {{$user->email}} 
          </td>
          <td>
            {{$user->password}} 
          </td>
          <td>
            @if($user->status=='2')

            <span class="badge bg-warning">pending</span>



            @elseif($user->status=='1')
            <span class="badge bg-success">approved</span>

            @elseif($user->status=='0')

            <span class="badge bg-danger">rejected</span>
            </button>


            @endif
          </td>
          <td>
            @if($user->role_code=='cw')
            <span class="badge bg-warning">Content Writer</span>
            @elseif($user->role_code=='admin')
            <span class="badge bg-success">Admin</span>
            @endif
          </td>
          <td>
            <a class="btn btn-primary" href="{{url('/user/edit/')}}/{{$user->id}}">Edit</a>
            <a class="btn btn-danger" href="{{url('/user/delete/')}}/{{$user->id}}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</div>
</div>