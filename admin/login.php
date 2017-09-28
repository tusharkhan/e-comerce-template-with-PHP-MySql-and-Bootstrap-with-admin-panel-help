<?php
    include '../classes/AdminLogin.php';
?>

<!DOCTYPE html>
<html lang="<?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?>">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Admin Login </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet" type="text/css" />
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="login-text" style="margin: 0 auto">
                        <?php
                            $adminLoginObject = new AdminLogin();

                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']))
                            {
                                $adminEmail    = $_POST['adminEmail'];
                                $adminPassword = md5($_POST['adminPass']);

                                $adminLoginObject->adminLogin($adminEmail, $adminPassword);
                            }

                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register']))
                            {
                                $adminLoginObject->registerAdmin($_POST['signupFirstName'], $_POST['signupLasttName'], $_POST['signupEmail'], $_POST['signupPassword'],$_FILES);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php //echo $_SERVER['PHP_SELF'];?>" method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="email" class="form-control" name="adminEmail" placeholder="E-mail" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="adminPass" />
              </div>
              <div>
                  <input type="submit" name="login" class="btn btn-default submit" value="Login" />
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="First Name" name="signupFirstName" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Last Name" name="signupLasttName" />
              </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Admin Image</label>
                    <div class="btn-group col-md-6 col-sm-6 col-xs-12">
                        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                        <input type="file" data-role="magic-overlay" name="image" data-target="#pictureBtn" data-edit="insertImage" />
                    </div>
                </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="signupEmail" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="signupPassword" />
              </div>
              <div>
                <button type="submit" name="register" class="btn btn-default submit"> Register </button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
