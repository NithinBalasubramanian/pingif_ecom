<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>PINGIF_ECOM ADMINISTRATION</title>
</head>
 
 <div class="loginpage">
    <div class="login-box" style=" background-color:blue;">
        <div class="login-logo"> 
            <!-- <b style="font-size: 30px;">Admin</b> -->
        </div>
        <div class="card">
            <div class="card-body login-card-body">
            <h4 style="text-align:center;color:white;">PINGIF_ECOM SHOP</h4>
            <hr>
                <?php if($this->session->flashdata('msg')){ ?>
                <p class="alert alert-danger"><?php echo $this->session->flashdata('msg'); ?></p>
                <?php }else{ ?>
                <p class="login-box-msg" >Signin to log your session</p>
                <?php } ?>
                <form action="<?php echo base_url(); ?>vendor/vendor_login" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="email" class="form-control " name="user_name" required placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </div>
                        <input type="password" class="form-control " name="password" required placeholder="Password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6" style="text-align:left;">
                        <div class="pad-ver">
                            <a href="" style="text-decoration:none;font-size:13px;color:white;">Forgot Password? </a>
                        </div>
                        <br>
                        <!-- <div class="pad-ver">
                            <a href="<?php echo base_url(); ?>View/vendor/register" style="text-decoration:none;font-size:13px;color:white;">Become a vendor </a>
                        </div> -->
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group text-right main_login">
                            <button type="submit" class="btn fa fa-unlock-alt snbtn sign" style="padding:8px 20px;"><span style="margin-left:5px;">Sign In</span></button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>