<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
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
            {{ session('error') }}
        </div>
    @endif
<h2 class="text-center" >Login Form</h2>
<form  action="{{route('process-login')}}" class=" py-5 bg-light rounded" method="post"  >
    @csrf

        <div class="row ">

                
                <div class="form-group col-md-8 offset-md-2 my-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter Your Email">
             
               
             
                @error('email')
                <div class="alert alert-danger">
{{$message}}
</div>
               @enderror    
    

                </div>

                <div class="form-group col-md-8  offset-md-2 my-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"  placeholder="Enter Your Password" value="{{old('password')}}">
             @error('password')
             <div class="alert alert-danger">  
{{$message}}
   </div>
      @enderror             
 

                
               
                </div>
                <div class="col-md-8 m-auto offset-md-4">
                <!-- <button type="submit">Submit</button> -->
                <x-submit-button>Submit</x-submit-button>
                
                </div>
                <div class="col-md-8 m-auto offset-md-4 mt-2">
                <span>Don't have an account? <a href="{{ route('show-register') }}">Register</a></span>
</div>
              </div>
              </div>
            </div>
       
        </div>

        
            
        </form>
       
         </body>
    </html>
