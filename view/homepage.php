   <!DOCTYPE html>
   <html>
   <head>

    <meta charset="utf-8">

    <title>Soccer !</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.1/css/bootstrap-dialog.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  </head>










  <body>

    <nav class="navbar navbar-default">

    </nav>

    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
          <h1 class="text-center login-title">Welcome !</h1>
          <div class="account-wall">
            <form class="form-signin" action="login.php" method="POST">

              <input type="hidden" name="action" value="login" required>
              <input type="text" class="form-control" name="login" placeholder="Nick Name" required autofocus>
              <input type="password" class="form-control" name="pass" placeholder="Password" required>
              
              <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Log In</button>
              <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#registerModal">Sign up !</button>
            </form>
          </div>
        </a>
      </div>
    </div>




    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div id="registerModal" class="modal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Sign up form</h4>
          </div>
          <div class="modal-body">


            <form data-toggle="validator"  action="register.php" role="form" method="post" class="form-inline">
              <label for="inputNickname" class="control-label">Nickname/Login</label>
              <input type="text" class="form-control" name="login" id="inputNickName" placeholder="NickName/Login here" required>

              <label for="inputEmail" class="control-label">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" data-error="invalid email adress" required>


              <br><br>
              <label for="inputFirstName" class="control-label">First     </label>
              <input type="text" class="form-control" id="inputFirstName" name="firstName" placeholder="First Name here" required>

              <label for="inputLastName" class="control-label"> Last </label>
              <input type="text" class="form-control" id="inputLastName" name = "lastName" placeholder="Last name here" required>
              <br><br>


              <label for="inputPassword" class="control-label">Password</label>

              <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="password" placeholder="Password" required>


              <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
              <br>		<br>

              <input type="number" min="1940" max="2006" name="birthYear" class="form-control" id="inputLastName" placeholder="birthYear" required>

              <br><br>

              <button type="submit" class="btn btn-primary">Submit</button>







            </form>






          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

  </body>

  <script>


  </script>