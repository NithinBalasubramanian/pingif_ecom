<?php $this->load->view('front/header.php'); ?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>
</head> -->
<style>

</style>
<body>
<div class="container">
<div class="row log">
    
    <div class="col-md-6 order-1">
        <div class="text-center">
            <h3>PAXXEI </h3>
        </div>
        <div class="login">
            <div class="sign">
                <h2 class="s">Signin to your account</h2>
            </div>
            <div class="box">
            <div class="card loginbox">
                <div class="cardbody">
                <?php if($this->session->flashdata('msg')){ ?>
                <p class="alert alert-danger"><?php echo $this->session->flashdata('msg'); ?></p>
                <?php }elseif($this->session->flashdata('msg_pos')){ ?>
                    <p class="alert alert-success"><?php echo $this->session->flashdata('msg_pos'); ?></p>
                <?php }else{ ?>
                <p class="login-box-msg" >Signin to log your session</p>
                <?php } ?>
                    <form method="post" action="<?php echo base_url(); ?>vendor/login/front/vendor_login">
                        <div class="row">
                            <div class="col-md-3 email">Email<span style="color:red"> *</span></div>
                            <div class="col-md-9"><input type="email" name="email" required class="form-control" ></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3 email">Password<span style="color:red"> *</span></div>
                            <div class="col-md-9"><input type="password" name="password" required  class="form-control" ></div>
                        </div>
                        <div class="forgot">
                            <a href="<?php echo base_url(); ?>View/front/vendor_reset" class="fo">Forgot Password</a>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-transparent sig signin" style="  background-color:#2AC37D;">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mid-one order-2">
        <div class="registerInfoCtr">
            <div class="regbox">
                <h3 class="dark">Selling with PAXXEI  is now really easy!</h3>
                <h3 class="light">List your products and start your business with PAXXEI </h3>
                <p class="para">Start selling absolutely free. All you need is to register,
                            list your catalogue and start selling your products.</p>
                <div class="butt text-center">
                <a href="<?php echo base_url(); ?>View/front/vendor_register" class="start">Start Selling</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>