    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registeration Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    </head>
    <body>
   

        <div class="container mt-5 ">
        @if(session('message'))
        <div class="alert alert-success mb-3">
            {{ session('message') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mb-3">
            {{ session('error')}}
        </div>
    @endif
<h2 class="text-center" >Registeration Form</h2>
<form  action="{{route('process-register')}}" class=" py-5 bg-light rounded" method="post"  >
    @csrf

        <div class="row ">

                <div class="form-group col-md-4  offset-md-2 mb-2">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" class="form-control" name="first_name" value="{{old('first_name')}}" placeholder="Enter The First Name">
                     @error('first_name')
                     <div class="alert alert-danger">
                {{ $message }}
                </div>
                    @enderror
                
                </div>
                <div class="form-group col-md-4 mb-2">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" class="form-control" name="last_name"  value="{{old('last_name')}}" placeholder="Enter the last name">
                    
                   
                    @error('last_name')
                    <div class="alert alert-danger">

                {{$message}}

                </div>
                @enderror
                    
                  
                </div>

                <div class="form-group col-md-8 offset-md-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter Your Email">
             
               
             
                @error('email')
                <div class="alert alert-danger">
{{$message}}
</div>
               @enderror    
    

                </div>

                <div class="form-group col-md-8 offset-md-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"  value="{{old('password')}}">
             @error('password')
             <div class="alert alert-danger">  
{{$message}}
   </div>
      @enderror             
 

                </div>
                <div class="form-group col-md-8 offset-md-2">
                    <label for="cpassword" class="form-label" >Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="confirm_password" value="{{old('cpassword')}}">
               
                
 @error('confirm_password')
 <div class="alert alert-danger">
                {{$message}}
                </div>
                @enderror
 
 
                </div>
                <div class="col-md-8 m-auto offset-md-4">
                <x-submit-button>Submit</x-submit-button>
              
                </div>
          
                <div class="col-md-8 m-auto offset-md-4 mt-2">
                <span>Already have an account? <a href="{{ route('show-login') }}">Login</a> </span> 
</div>
               
              </div>
            </div>
       
        </div>

        
            
        </form>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" crossorigin="anonymous"></script>
    </body>
    </html>
