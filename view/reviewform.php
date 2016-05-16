
 <!DOCTYPE html>
 <html>
 <head>

  <meta charset="utf-8">

  <title>Soccer !</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.1/css/bootstrap-dialog.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>

<!DOCTYPE html>


<meta charset="utf-8">

<title>Soccer !</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.1/css/bootstrap-dialog.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>


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
          <li><a  href="profile.php"> Profile</a></li>
          <li><a href="playerlist.php"> Players</a></li>
          <li ><a href="sitelist.php"> Sites </a></li>
          <li   class="active"><a href="gamelist.php"> Games </a></li>
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


<div class="col-md-6 col-md-offset-2">
  <div class="container" style="background-color:  #efefef">
    <div class="row">
    <?php if (!(isset($sent))){ ?>
      <h1>Give a review !</h1>




      <div class="col-md-8 col-md-offset-2">

        <form method='post' action="review.php" role="form" class="form-horizontal">

          <dl>
            <input type="hidden" name="action" value="review">
            <dt><label for="name">Title</label></dt>
            <dd><input type="text" id="title" name="title" required></dd>
            <dt><label for="email">Text</label></dt>
            <dd><textarea minlength="10" cols="40" rows="5" id="text" name="text" required></textarea></dd>
            <p><button type="submit" class="btn btn-primary">Send !</button></p>

          </dl>

        </form>
      </div>

      <?php }
      else { ?>

      <img src="../assets/thanks.png" alt="Thank you" style="width:80%;height:420px;">
      <?php } ?>



    </div>


  </div>
</div>
</div>
</html>


