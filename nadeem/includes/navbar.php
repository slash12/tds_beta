<!-- <script src="../js/jquery-3.2.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script src="../js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">  -->

<?php
require('includes/connect.php');

function save_state($a)
{
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     @$b = $_POST['$a'];
     echo $_POST["$a"];
 }
}


  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $lg_err_arr = array();

    //lg-username
    @$lguname_cc = trim($_POST['txtlguname']);
    //Empty Validation
    if (empty($lguname_cc)) {
        $lg_err_arr[] = "Please Enter your Username";
    } else {
        $lguname = mysqli_real_escape_string($dbc, $lguname_cc);
        //echo "<script>alert('test1')</script>";
    }

    //lg-password
    @$lgpass_cc = trim($_POST['txtlgpass']);
    //Empty Validation
    if (empty($lgpass_cc)) {
        $lg_err_arr[] = "Please Enter your Password";
    } else {
        $lgpass = mysqli_real_escape_string($dbc, md5($lgpass_cc));
        //echo "<script>alert('test2')</script>";
    }

    if(empty($lg_err_arr))
    {
      //echo "<script>alert('test3')</script>";
      $lg_search = "SELECT username, password FROM tbl_user WHERE username = '$lguname' AND password = '$lgpass';";
      $lg_search_exe = mysqli_query($dbc, $lg_search);

      if($lg_search_exe)
      {
        //echo "<script>alert('test4')</script>";
        if(mysqli_num_rows($lg_search_exe) > 0)
        {
          session_start();
          $_SESSION['uname'] = $lguname;
          header('Location: index.php');
        }
        else
        {
          //echo "<script>alert('test5')</script>";
          echo "<script> $(document).ready(function(){
              $('#frmlg').modal({show: true});
          }); </script>";
          @$lg_err = "<div id='lg-error'>Invalid username and password, Please try again</div>";
        }
      }
    }
  }
?>


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
          <?php
          if(isset($_SESSION['uname']))
          {
            echo "<li class='nav-item'>
                <a class='nav-link btn btn-default navbar-btn' href='#'>Hello, ".@$_SESSION['uname']."</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link btn btn-default navbar-btn' href='logout.php'>Logout</a>
            </li>";
          }
          else
          {
            // echo "<script>alert('test');</script>";
            // echo "<script>alert('".$_SESSION['uname']."');</script>";
            echo "<li class='nav-item'>
                <a class='nav-link btn btn-default navbar-btn' data-toggle='modal' data-target='#frmlg'>Login</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link btn btn-default navbar-btn' href='Register.php'>Register</a>
            </li>";
          }

            ?>
        </ul>
    </div>
  </div>
  </nav>

  <!-- Login Modal -->
  <div class="modal fade" id="frmlg" name="frmlg" tabindex="-1" role="dialog" aria-labelledby="frmlgtitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo @$lg_err; ?>
          <form method="post" id="frmlgcon" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!--Username-->
            <div class="form-group row">
              <div class="col-8">
                <label for="txtuname">Username</label>
                <input type="text" class="form-control" id="txtlguname" name="txtlguname" placeholder="Username..." value="<?php @save_state('txtlguname');?>" required>
              </div>
            </div>
              <!--Password-->
              <div class="form-group row">
                <div class="col-8">
                  <label for="txtpass">Password</label>
                  <input type="password" class="form-control" id="txtlgpass" name="txtlgpass" placeholder="Password..." required>
                </div>
              </div>
                <!--Submit Button-->
                <input type="submit" class="btn btn-primary" id="btnlgsubmit" value="Sign-in">

                <!--Forget your Password-->

                <a href="#" class="alert-link" id="lkfgpass">Forget your Password</a>

                <!--Remember Me -->
                <div class="form-group">
                  <div class="form-check" id="chkremcont">
                      <input class="form-check-input" type="checkbox" value="1" id="chklgrem">
                      <label class="form-check-label" for="chklgremtxt">Remember me</label>
                  </div>
                </div>
          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>


  <!-- <script src="../js/bootstrap.min.js"></script> -->
