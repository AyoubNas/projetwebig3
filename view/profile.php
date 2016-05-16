   <!DOCTYPE html>
   <html>
   <head>

    <meta charset="utf-8">

    <title>Soccer !</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.1/css/bootstrap-dialog.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  </head>

  <?php if (isset($error)){

    include_once('../controller/banner.php');}?>




    <div class="row">


      <div class="col-xs-1">
      </div>

      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            </button>
            <a class="navbar-brand active" href="profile.php"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a  href="profile.php"> Profile</a></li>
              <li><a href="playerlist.php"> Players</a></li>
              <li><a href="sitelist.php"> Sites </a></li>
              <li><a href="gamelist.php"> Games </a></li>
              <li><a href="teamlist.php"> Teams </a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
            <li><a href="review.php">send a review</a></li>
              <li><a href="disconnect.php">Log out</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>



<br>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 lead">Your profile<hr></div>
          </div>
          <div class="row">
            <div class="col-md-4 text-center">
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="only-bottom-margin"> <?php echo $profile[0]['playerLogin'];?></h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">

                  <span class="text-muted">Name : </span> <?php echo $profile[0]['playerFirstName'];?> <?php echo $profile[0]['playerLastName'];?> <br>
                  <span class="text-muted">Email: </span> <?php echo $profile[0]['playerEmail'];?><br>
                  <span class="text-muted">Birth year : </span> <?php echo $profile[0]['playerBirthYear'];?><br>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#editProfileModal">Change your info</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="editProfileModal" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change your info</h4>
      </div>
      <div class="modal-body">


        <form data-toggle="validator" role="form" class="form-inline" method='post' action='profile.php'>

          <input type="hidden" name="action" value="editProfile" required>
          <input type="hidden" name="id" value=<?php echo "\"".$_COOKIE['id']."\""?> required>

          <label for="firstName" class="control-label">First Name : </label>
          <input type="text" class="form-control" name='firstName' placeholder="First Name"  value=<?php echo "\"".$profile[0]['playerFirstName']."\"";?>>

          <label for="lastName" class="control-label">Last Name : </label>
          <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name"  value=<?php echo "\"".$profile[0]['playerLastName']."\"";?>> <br><br>

          <label for="email" class="control-label">Email : </label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value=<?php echo "\"".$profile[0]['playerEmail']."\"";?> >
          <br><br>



          <label for="password" class="control-label"> New Password : </label>
          <input type="password" name="newpass" class ="form-control" placeholder="Password" id="password">
          <input type="password" data-minlength="6" class="form-control" placeholder="Confirm Password" id="confirm_password" >
          <br><br>


          <label for="birthYear" class="control-label">birth Year : </label>
          <input type="number" min="1955" max="2006" step="1" class="form-control" id="birthYear" name="birthYear" placeholder="BirthYear" value=<?php echo "\"".$profile[0]['playerBirthYear']."\"";?>>
          <br><br>

          <label for="inputPassword" class="control-label" id="mdp" required> current password to confirm :  </label>
          <input type="password"  class="form-control list-sort" id="inputPassword" name ="password" placeholder="Password" required>

          <button type="submit" class="btn btn-primary">Submit changes</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close and cancel</button>

      </div>
    </div>

  </div>
</div>
<?php include('footer.php');?>




<script>

  var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords must match !");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;

</script>