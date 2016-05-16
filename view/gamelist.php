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



<body>
 <div class="row">

  <div class="col-xs-3">
  </div>

  <div class="col-xs-6">


    <table class="table table-striped">

      <tr> <th>date and time</th> <th>site</th> <th>home team</th><th>away team</th> <th>surface</th> <th></th><th></th></tr>

      <?php foreach ($games as $game) {?>                        

      <tr>
        <td><?php echo $game['gameDateTime'];?></td>
        <td><?php echo $game['siteName'];?></td>
        <td><?php echo $game['home'];?></td>
        <td><?php echo $game['away'];?></td>
        <td><?php echo $game['surface'];?></td>
        <!--<td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=<?php //echo "\"#".$game['gameId']."\"";?>>Modify this game</button></td>
        <td><form method="post" action="gamelist.php" class="form-inline" role="form"><input type="hidden" name="action" value="deleteGame" required> <input type="hidden" name="gameId" value=<?php //echo"\"".$game['gameId']."\"";?>> <button type="submit">supprimer</button>
        </form>-->


        <div id=<?php echo "\"".$game['gameId']."\"";?>class="modal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center">Modify an existing game</h4>
              </div>
              <div class="modal-body">





                <!--game INFOs*********************************************************************-->


                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-12 lead" align="center">Game modification form<hr></div>
                        </div>
                        <div class="col-md-10">



                          <form method='post' role="form" class="form-inline">

                            <div  class="form-group">
                              <input type="hidden" name="action" value="updateGame" required>
                              <input type="hidden" name="game" value=<?php echo"\"".$game['gameId']."\""?> required>

                            </div>


                            <div class="form-group">
                              <label for="site">site : </label>
                              <select name="site" id="site" >
                                <?php
                                foreach ($sites as $site) {

                                  echo "<option value="."\"".$site['siteName']."\">".$site['siteName']."</option>";
                                } 
                                ?> 
                              </select>
                            </div>
                            <br><br>

                            <div class="form-group" >
                              <label for="gameDate">Date : </label>
                              <input type="date"  name="date" id="gameDate" required>
                              <label for="gameTime">Time : </label>
                              <input type="time" name="time" id="gameTime" required>

                            </div>
                            <br><br>





                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Update !</button>
                            </div>






                          </form>





                        </div>
                        <div class="row">

                        </div>
                      </div>
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

    <?php } ?>


  </table>

  <td><button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#addGameFromGamesModal">Create a Game</button></td>




</div>








<div id="addGameFromGamesModal" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Game creation form </h4>
      </div>
      <div class="modal-body">





        <!--game INFOs*********************************************************************-->


        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 lead" align="center">Create a new game ! <hr></div>
                </div>
                <div class="col-md-10">



                  <form method='post' role="form" class="form-inline">

                    <div  class="form-group">

                      <input type="hidden" name="action" value="createGame" required>
                      <input type="hidden" name="home" value=<?php echo"\"1\""?> required>

                    </div>


                    <div class="form-group">
                      <label for="away">away team : </label>
                      <select name="away" id="away" >
                        <?php
                        foreach ($teams as $team) {
                                          //if !($team['teamId']==TEAMOFACTIVEACCOUNT){

                          echo "<option value="."\"".$team['teamId']."\">".$team['teamName']."</option>";
                                          //}
                        } 
                        ?> 
                      </select>
                    </div>
                    <br><br>

                    <div class="form-group">
                      <label for="site">site : </label>
                      <select name="site" id="site" >
                        <?php
                        foreach ($sites as $site) {

                          echo "<option value="."\"".$site['siteName']."\">".$site['siteName']."</option>";
                        } 
                        ?> 
                      </select>
                    </div>
                    <br>

                    <div class="form-group" >
                      <label for="gameDate">Date : </label>
                      <input type="date"  name="date" id="gameDate" required>
                      <label for="gameTime">Time : </label>
                      <input type="time" name="time" id="gameTime" required>

                    </div>
                    <br><br>


                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Submit !</button>
                    </div>

                  </form>
                </div>
                <div class="row">

                </div>
              </div>
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
</div>
<?php include("footer.php"); ?>
</body>
</html>