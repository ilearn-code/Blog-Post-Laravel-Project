
<div class="container">

<div class="row justify-content-center">

  <div class="col-md-10">


    <table class="table mt-5
  ">
      <thead>
        <tr>
          <th>
            Posts
          </th>
          <th>
            Content
          </th>

          <th width=100 height=100>
            Featured Image
          </th>
          <th>
            Author
          </th>
          <th>
            status
          </th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)

        <tr>
          <td>
            {{$post->title}}
          </td>

          <td>
            {{$post->content_text}}
          </td>
          <td > 

          <!-- <img src="{{asset('/storage/app/public')."/".$post->featured_image}}" alt="" width="100%"> -->
          <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Post Image">


          </td>
          <td>
            @if(isset($post->author->first_name) && $post->author->last_name)
            {{ucfirst($post->author->first_name)}} {{ucfirst($post->author->last_name)  }}
            @endif
          </td>
          <td>
            @if($post->status=='2')

            <span class="badge bg-warning">pending</span>



            @elseif($post->status=='1')
            <span class="badge bg-success">approved</span>

            @elseif($post->status=='0')

            <span class="badge bg-danger">rejected</span>
            </button>


            @endif
          </td>
          <td>
            <a class="btn btn-primary" href="{{url('/posts/edit/')}}/{{$post->id}}">Edit</a>
            <a class="btn btn-danger" href="{{url('/posts/delete/')}}/{{$post->id}}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</div>
</div>