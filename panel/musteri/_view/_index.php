<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Aquacora Water System Corp.</title>
        <!-- Bootstrap -->
        <link href="<?=CUSTOMER_URL?>_assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=CUSTOMER_URL?>_assets/css/waves.min.css" type="text/css" rel="stylesheet"><link rel="stylesheet" href="css/nanoscroller.css">
        <!-- <link rel="stylesheet" href="css/nanoscroller.css">-->
        <link href="<?=CUSTOMER_URL?>_assets/css/style.css" type="text/css" rel="stylesheet">
        <link href="<?=CUSTOMER_URL?>_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?=CUSTOMER_URL?>_assets/css/themify-icons.css" rel="stylesheet">
        <link href="<?=CUSTOMER_URL?>_assets/css/color.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="account">
        <div class="container">
            <div class="row">
                <div class="account-col text-center">
                    <img src="<?=CUSTOMER_URL?>_assets/logo.png" />
                    <h3>&nbsp;</h3>
                    <form class="m-t" role="form" method="post">
                      <input type="hidden" name="process" value="login">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="E-Posta/GSM" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Şifre" required="">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block ">Giriş Yap</button>
                        <p>Aquacora &copy; 2018</p>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?=CUSTOMER_URL?>_assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?=CUSTOMER_URL?>_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=CUSTOMER_URL?>_assets/js/pace.min.js"></script>
    </body>
</html>
