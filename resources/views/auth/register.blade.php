
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('/images/favicon.ico')}}">

    <title>Login</title>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/custom.css')}}" rel="stylesheet">
  </head>
  <body>

    <div class="container" id="login">
        <div class="row">
            <div class="col-lg-12">
             

              <form action="{{asset('/register')}}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                      type="text" 
                      class="form-control" 
                      id="email" 
                      placeholder="Enter your email" 
                      name="email">
                  </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input 
                  type="password" 
                  class="form-control" 
                  id="password" 
                  placeholder="Enter your password" 
                  name="password">
              </div>

               <div class="form-group">
                <label for="password">Retype Password</label>
                <input 
                  type="password" 
                  class="form-control" 
                  id="conpassword" 
                  placeholder="Confirm Password" 
                  name="conpassword">
              </div>

              <button type="submit" class="btn btn-primary">Register</button>
              <a href="/login" class="btn btn-success">login</a>
        </form>
          </div>
           </div>
        </div>
    </div>
  </body>
</html>