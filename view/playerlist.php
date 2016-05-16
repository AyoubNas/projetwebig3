
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


<?php if (isset($error)){

  include_once('../controller/banner.php');}?>



  <body>

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
              <li  class="active"><a href="playerlist.php"> Players</a></li>
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

<body>
  <div class="row">

    <div class="col-xs-3">
    </div>

    <div class="col-xs-6">

      <table class="table table-striped table-bordered">

        <tr> <th>Names</th> <th>Birth year</th> <th>team</th> </tr>

        <?php foreach($players as $player){?>

        <tr>

          <td><?php echo $player['playerLogin'].' ('.$player['playerFirstName'].' '.$player['playerLastName'].')';?></td>
          <td> <?php echo $player['playerBirthYear']?></td>
          <td> <?php if ($player['teamName']=='') echo "<font color=\"grey\">(No team yet) </font>"; else echo $player['teamName'];?></td>

          
          <!--<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=<?php //echo "\"#".$player['playerId']."\"";?>>change info</button>-->
          <!--<form method="post" action="playerlist.php" class="form-inline" role="form"><input type="hidden" name="action" value="deletePlayer" required> <input type="hidden" name="playerId" value=<?php //echo"\"".$player['playerId']."\"";?>> <button type="submit">delete</button></form>-->


          <div id=<?php echo "\"".$player['playerId']."\"";?>class="modal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" align="center">edit player info</h4>
                </div>
                <div class="modal-body">





                  <!--game INFOs*********************************************************************-->


                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="panel panel-default">



                        <form data-toggle="validator"  action="playerlist.php" role="form" method="post" class="form-inline">
                          <br><br>

                          <div  class="form-group form-inline">
                            <input type="hidden" name="action" value="updatePlayer" required>
                            <input type="hidden" name="playerId" value=<?php echo"\"".$player['playerId']."\""?> required>
                          </div>

                          <div  class="form-group form-inline">
                            <label for="login" class="control-label">Login</label>
                            <input type="text" class="form-control" size="10" name="login" id="login" placeholder="Login here" required>


                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" data-error="invalid email adress" required>
                          </div>  


                          <br><br>
                          <label for="fname" class="control-label">First     </label>
                          <input type="text" class="form-control" id="fname" size="19" name="fname" placeholder="First Name here" required>

                          <label for="inputLastName" class="control-label"> Last </label>
                          <input type="text" class="form-control" id="inputLastName" size="19" name = "lname" placeholder="Last name here" required>
                          <br><br>


                          <label for="inputPassword" class="control-label">Password</label>

                          <input type="password" data-minlength="6" size="15"class="form-control" id="inputPassword" name="password" placeholder="Password" required>


                          <input type="password" class="form-control" size="15" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
                          <br>    <br>


                          <label for="inputbYear" class="control-label">birthYear</label>
                          <input type="number" min="1940" max="2006" name="birthYear" class="form-control" id="inputbYear" placeholder="birthYear" required>

                          <br><br>

                          <button type="submit" class="btn btn-primary">Submit</button>







                        </form>





                        

                        
                      </div>
                    </div>
                  </div>

                  <!--profile information****************END******************************************************-->
                </div>
                <div class="modal-footer">
                </div>
              </div>

            </div>
          </div>









        </td>



      </tr>

      <?php }?>




    </table>

  </div>

</div>



<?php include("footer.php"); ?>
</body>
</html>