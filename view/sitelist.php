 <!DOCTYPE html>
 <html>
 <head>

  <meta charset="utf-8">

  <title>Socccer !</title>

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
            <li   class="active"><a href="sitelist.php"> Sites </a></li>
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

      <tr> <th>Name</th> <th>Adress</th> <th> Surface </th><th></th></tr>

      <?php foreach ($sites as $site) 
      { ?>

      <tr>

        <td> <?php echo $site['siteName']?></td>
        <td><?php echo $site['siteAdrNumber'].' '.$site['siteAdrStreet'].' '.$site['siteAdrPostCode'].' '.$site['siteAdrCity'];?></td>
        <td><?php echo $site['surface'];?> </td>

        <?php if (isset($profile[0]['playerTeam'])) {?>


        <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=<?php echo "\"#".$site['siteName']."\""?>> create a game here ! </button>


          <div id=<?php echo "\"".$site['siteName']."\""?> class="modal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">create a game in <?php echo $site['siteName'];?> </h4>
                </div>
                <div class="modal-body">





                  <!--profile information*********************************************************************-->


                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12 lead">create a game<hr></div>
                          </div>
                          

                          <div class="col-md-10">

                            
                            
                            <form method='post' role="form" class="form-inline">

                              <div  class="form-group">
                                <input type="hidden" name="home" value=<?php echo "\"".$profile[0]['playerTeam']."\""?> required>
                                <input type="hidden" name="site" value=<?php echo "\"".$site['siteName']."\"";?> required>
                              </div>


                              <div class="form-group">
                                <label for="awayTeam">opponent : </label>
                                <select name="away" id="awayTeam" >
                                  <?php
                                  foreach ($teams as $team) {

                                    if (!(($team['teamId'])==$profile[0]['playerTeam'])){

                                      echo "<option value="."\"".$team['teamId']."\">".$team['teamName']."</option>";
                                    }
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
                                <button type="submit" class="btn btn-primary">create !</button>
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

      <?php }}  ?>


    </table>


  </div>






</div>
<?php include("footer.php"); ?>
</body>
</html>