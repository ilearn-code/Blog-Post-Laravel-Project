<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

        <style>
            img {
      min-width: 50px;
      /* Adjust this value as needed */
      height: auto;
      /* Maintain aspect ratio */
      max-width: 20%;
      /* Ensure image doesn't exceed cell width */
    }
        </style>
</head>

<body>
   
<div class="container mt-5 ">
        @if(session('message'))
        <div class="alert alert-success mb-3">
            {{ session('message') }}
        </div>
    @endif

<a href="{{route('show-dashboard-posts')}}" class="btn btn-secondary">Back</a>
        <form action="{{$url}}" class="py-5 bg-light rounded" method="post" enctype="multipart/form-data">
                    <h2 class="text-center">{{$title}}</h2>
            @csrf
                <div class="row">
                     <div class="form-group col-md-8 offset-md-2 my-2">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" class="form-control" @if(isset($post)) value="{{$post->title}}" @endif
                    name="title" placeholder="Enter the title">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-8 offset-md-2 my-2">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content_text" placeholder="Enter Your Content"
                        rows="5">@if(isset($post)){{$post->content_text}}@endif</textarea>
                        @error('content_text')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                @if(session()->get('role')=='admin' && request()->routeIs('edit-post'))
                <div class="form-group col-md-8 offset-md-2">
                        <label for="status">Status</label>
                     <select class="form-control" id="status" name="status">
                        <option >Select..</option>
                        <option value="1" @if(isset($post->status) && $post->status == 1) selected @endif>Approved</option>
                        <option value="2" @if(isset($post->status) && $post->status == 2) selected @endif>Pending Approval</option>
                        <option value="0" @if(isset($post->status) && $post->status == 0) selected @endif>Disabled</option>
                     </select>
                </div>
                @elseif(request()->routeIs('edit-post'))
                    <input type="hidden" name="status" value="{{isset($post->status)?$post->status:''}}">
                @else
                    <input type="hidden" name="status" value="2">
                @endif

                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                <div class="form-group col-md-8 offset-md-2 my-2">   
                    <label for="image">Featured Image</label>
                    <input class="form-control" type="file" name="image" id="image">
                   
                @if(request()->routeIs('edit-post'))
                <label class="form-label" for="currentImage" style="display:block">Current Image</label>
                    <img src="{{ asset('storage/' . $post->featured_image) }}"  id="currentImage" alt="Post Image">
                @endif
                @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

            </div>
                </div>
                

           

            <div class="col-md-8 m-auto text-center">
            <x-submit-button>Submit</x-submit-button>
            </div>
        </form>


    </div>
</body>

</html>