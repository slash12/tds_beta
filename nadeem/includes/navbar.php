<!-- <script src="../js/jquery-3.2.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script src="../js/bootstrap.min.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> -->



<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navShirtPrint" aria-controls="navShirtPrint" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <a class="navbar-brand" href="#">
      <img src="img/logo_poule.png"  class="d-inline-block align-top" />
      ShirtPrints
    </a>
    <div class="collapse navbar-collapse" id="navShirtPrint">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Brower T-Shirt</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Create T-Shirt</a>
        </li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link btn btn-default navbar-btn" data-toggle="modal" data-target="#frmlg">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-default navbar-btn" href="Register.php">Register</a>
            </li>
        </ul>
    </div>
  </div>
  </nav>

  <!-- Login Modal -->
  <div class="modal fade" id="frmlg" tabindex="-1" role="dialog" aria-labelledby="frmlgtitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!--Username-->
            <div class="form-group row">
              <div class="col-8">
                <label for="txtuname">Username</label>
                <input type="text" class="form-control" id="txtlguname" name="txtlguname" placeholder="Username...">
              </div>
            </div>
              <!--Password-->
              <div class="form-group row">
                <div class="col-8">
                  <label for="txtpass">Password</label>
                  <input type="password" class="form-control" id="txtlgpass" name="txtlgpass" placeholder="Password...">
                </div>
              </div>
                <!--Submit Button-->
                <input type="submit" class="btn btn-primary" id="btnlgsubmit">
          </form>
        </div>
        <div class="modal-footer">
          <!-- <button type="submit" class="btn btn-secondary" data-dismiss="modal">Submit</button>
          <button type="reset" class="btn btn-primary">Cancel</button> -->
        </div>
      </div>
    </div>
  </div>


  <!-- <script src="../js/bootstrap.min.js"></script> -->
