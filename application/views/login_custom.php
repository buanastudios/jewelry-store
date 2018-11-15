<?php
 /**
  * @author Arti Hikmatullah Perbawana Sakti Buana <sakti.buana@arthipesa.com>
  * Telegram/Whatsapp/Wire +6285720502217 
  */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo ''.($pageTitle=='') ? 'Storeself 2.0' : $pageTitle; ?></title>
        <!-- Favicon -->
        <link href="<?php echo base_url('assets/img/favicon.ico?'.mt_rand()); ?>" rel="shortcut icon" type="image/x-icon" />
        <!-- Scalabel --> 
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<!-- Description --> 
		<meta name="description" content="Selamat datang di halaman agen, distributor kain Ummu Luthfi Textile, FURSAN&middot;RAMADA&middot;BONANZA&middot;JAGUARD&middot;LEXUS&middot;PARADISO<br/>FAIRUS&middot;SATEN CRYSTAL&middot;ZARAA SATEN #Kainekspor#kwalitasperimum#kainburj#abayasaudi#abayaarab#eksport#kain#kain#istimewah#jilbab#gamis#abaya#gamis#khimar#fursan#kainekspor#cadar#bandana#abayaqatar#abaya#saudiabaya#dubaiabaya#cadarbandana#burjelmedina#textile#ummuluthfitextile#fusan#lexus#abaya" />
        <!-- Bootstrap 3.3.2 -->
        <link rel="stylesheet" href="<?php echo VENDORPATH. '/bootstrap-3.3.7-dist/css/bootstrap.min.css?rand='.mt_rand(); ?> " crossorigin="anonymous">
        <!-- Animate for Noty -->
        <link href="<?php echo VENDORPATH.'/noty/demo/animate.css?rand='.mt_rand(); ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
		<link href="<?php echo VENDORPATH.'/fontawesome-free-5.1.0-web/css/all.css?'.mt_rand(); ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.css?rand='.mt_rand()); ?>" rel="stylesheet">        
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url('vendor/iCheck/square/blue.css?rand=').mt_rand(); ?>" rel="stylesheet"> 
		<!-- Select 2 CSS -->
		<link rel="stylesheet" href="<?php echo base_url('vendor/select2/select2/dist/css/select2.css').'?rand='.mt_rand(); ?> " crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url('vendor/select2/select2-bootstrap-theme/dist/select2-bootstrap.css').'?rand='.mt_rand(); ?> " crossorigin="anonymous">
        <!-- Login -->
        <link href="<?php echo base_url('assets/css/login.css?rand='.mt_rand()); ?>" rel="stylesheet" type="text/css" />
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <div class="login-title">
                    <div id="login-title-upper"><?php // $loginBoldTitle; ?></div>
                    <!--br/-->
                    <div id="login-title-lower"><?php //echo $loginTitle; ?></div>
					<div class="text-center"><img style="-webkit-filter: drop-shadow(5px 5px 5px #222);
  filter: drop-shadow(5px 5px 5px #222);z-index:999;filter:invert(0%);width:150px;height:150px;" src="<?php echo site_url('assets/img/logos/boxed.png'); ?>"/></div>
                </div>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Selamat Datang!<br/>Silahkan <i>sign-in</i> untuk memulai aktivitas.</p>
                <form action="<?php echo base_url('login/proses2'); ?>" method="post">
                    <?php
                    if (validation_errors() || $this->session->flashdata('result_login')) {
                        ?>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('result_login'); ?>
                        </div>    
                    <?php } ?>
                    <div class="form-group has-feedback">
                        <input type="hidden" name="referrer_uri" class="form-control" placeholder="Referrer URI" value="<?php echo $this->session->flashdata('referrer_uri'); ?>" />
                        <select id="predefined_username" name="predefined_username" class="form-control" data-placeholder="Select Something" placeholder="Username" style="width:100%;">                            
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">	
                        <div class="col-xs-8">    
                            <div class="checkbox icheck">
                                <label>
                                    <!--<input type="checkbox"> Remember Me-->
                                </label>
                            </div>                        
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>                
               <!--  <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
                </div> --><!-- /.social-auth-links -->

                <!-- <a href="<?php echo site_url('login/forgot'); ?>">I forgot my password</a><br>
                <a href="<?php echo site_url('register'); ?>" class="text-center">Register a new membership</a> -->

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo VENDORPATH.'/jQuery/jQuery-2.1.3.min.js?rand='.mt_rand(); ?>"></script> 
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo VENDORPATH. '/bootstrap-3.3.7-dist/js/bootstrap.min.js?rand='.mt_rand();?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('vendor/iCheck/icheck.min.js').'?rand='.mt_rand(); ?>"></script>       
        <!-- Select2 -->
        <script src="<?php echo base_url('vendor/select2/select2/dist/js/select2.full.js').'?rand='.mt_rand();?>" type="text/javascript"></script>

        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
        
        <!-- ArtHiPeSA Config -->
		<script src="<?php echo base_url('assets/js/config.js?rand='.mt_rand()); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/login_custom.js?rand='.mt_rand()); ?>" type="text/javascript"></script>
    </body>
</html>
