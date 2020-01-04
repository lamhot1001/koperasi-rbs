<?php
$system_name = $this->db->get_where('title',array('type'=>'system_name'))->row()->description;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $system_name; ?></title>
    <link rel="shorcut icon" href="<?php echo base_url();?>icon.ico" type="image/x-icon" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <!--bootstrap v4.0.0-alpha.6-->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/component/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
        
    <link href="<?php echo base_url(); ?>assets/layout/css/animate.css" rel="stylesheet">
    
    <link href="<?php echo base_url(); ?>assets/layout/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url(); ?>assets/layout/css/colors/megna.css" id="theme" rel="stylesheet">
    

<style>
    .switch{
        text-indent: -9999px;
        display: block;
    }
    
    .switch-btn{
        width: 80px;
        height: 40px;
        background: #ffde15;
        position: relative;
        border-radius: 20px;
        cursor: pointer;
        box-shadow: inset 0 3px 10px rgba(0,0,0,.3);
    }
    
    .switch-btn:before{
        content: '';
        position: absolute;
        height: 36px;
        width: 36px;
        background: linear-gradient(#fff,#f2f2f2);
        left: 2px;
        top: 2px;
        border-radius: 50px;
        transition: all 250ms ease-out;
        box-shadow: 0 8px 6px -4px rgba(0,0,0,.25)
    }
    
    input[type=checkbox]:checked + .switch-btn:before{
        left: 42px;  
    }
     input[type=checkbox]:checked + .switch-btn{
        background: #14a950; 
    }
</style>
    
</head>
<body>
    <section id="wrapper" class="login-register">
    <div class="login-box login-sidebar card">
        <div class="white-box">
            <div align="center">
                <img src="<?php echo base_url(); ?>assets/layout/img/logo-login.png" style="width:100%;">
            </div>
            <script>
                function myFunction() {
                  var checkBox = document.getElementById("myCheck");
                  var text = document.getElementById("text");
                  if (checkBox.checked == true){
                      window.location.href="<?php echo site_url('member');?>";

                  } else {
                    window.location.href="<?php echo site_url('login');?>";

                  }
                }
            </script> 
                   
        <form class="form-horizontal form-material" action="" method="post">
           <?php if($jenis == 'admin') { ?>
                    <div align="center">
                           <label class="switch">
                          <input type="checkbox" unchecked id="myCheck"  onclick="myFunction()"> 
                        <div class="switch-btn"></div>
                    </label><h4>Admin | Operator is LOGIN</h4>
                    </div>
                <?php } else { ?>
                     <div align="center">
                           <label class="switch">
                          <input type="checkbox" checked id="myCheck"  onclick="myFunction()"> 
                        <div class="switch-btn"></div>
                    </label><h4>Collector is LOGIN</h4>
                    </div>
				<?php } ?>     
                <?php
                    if(!empty($pesan)){
                        echo '<div style="color:red">' . $pesan . '</div>';
                    }    
                ?>
        <div class="form-group">
            <div class="col-xs-12">
                <input type="text" name="u_name" id="u_name" class="form-control" placeholder="Username" value="<?php echo set_value('u_name');?>"/>
                <?php echo form_error('u_name','<p style="color:red;">','</p>');?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input type="password" name="pass_word" class="form-control" placeholder="Password" />
                <?php echo form_error('pass_word','<p style="color:red;">','</p>');?>

            </div>
        </div>
            
        <button type="submit" class="btn btn-info style1 btn-lg btn-block text-uppercase waves-effect waves-light"  name="btn-login" style="width:100%; color:white"> Login </button>

        </form>
            
        </div>
    </div>
</section> 

</body>
</html>