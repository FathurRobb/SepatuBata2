<!DOCTYPE html>
<html>
<head>
	<title>LogIn Form</title>
    <!--
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">-->
    
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/login.css');?>">
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>
	<div class="container">
        <div class="card card-login mx-auto text-center bg-white">
            <div class="card-header mx-auto bg-white">
                <span> <img src="<?php echo base_url('');?>assets/images/LogoBata.png" class="w-75" alt="Logo"> </span><br/><br>
                            <span class="logo_title mt-5"> Login Dashboard </span>
    <!--            <h1>--><?php //echo $message?><!--</h1>-->

            </div>
            <div class="card-body">
                <form action="<?php echo site_url('login/cek_login'); ?>" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user fa-sm" style="display: inline-block;
    width: 100%;"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key fa-sm" style="display: inline-block;
    width: 100%;"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>