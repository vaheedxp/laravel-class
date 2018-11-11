
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
             <?php 
                  if(Session::has('email_not_match')):
                    echo '<div class="alert  alert-danger">';
                      echo Session::get('email_not_match');
                    echo '</div>';
                  elseif(Session::has('passwrod_not_match')):
                    echo '<div class="alert  alert-danger">';
                      echo Session::get('passwrod_not_match');
                    echo '</div>';
                  endif;

                  if(Session::has('successful_loguot')):
                        echo '<div class="alert  alert-success">';
                        echo Session::get('successful_loguot');
                        echo '</div>';
                  endif;
                ?>

              <form action="{{asset('/authenticate')}}" method="post">
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
              <button type="submit" class="btn btn-primary">Login</button>
              <a href="/newaccount" class="btn btn-success">Create Account</a>
        </form>
          </div>
           </div>
        </div>
    </div>
  </body>
</html>