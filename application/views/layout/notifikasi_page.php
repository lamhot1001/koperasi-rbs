
<!--Jatuh Tempo-->
<?php
    $jml = 0;
?>


<li class="dropdown" title="Jatuh Tempo">
    <?php 
        if($jml > 0){
            echo '
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-warning">&nbsp;&nbsp;&nbsp;</i>
            <span class="badge badge-sm badge-red">'.$jml.'</span></a>
            ';
          
            ?>
        <?php } else {
                echo '
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-warning">&nbsp;&nbsp;&nbsp;</i>
                    <div class="badge badge-success"><i class="fa fa-check-circle"></i></div></a>
                ';
            ?>
            <ul class="dropdown-menu dropdown-tasks animated bounceInRight">
                <li>
                    <div class="drop-title">Notifikasi Jatuh Tempo</div>
                </li>
                <li>
                    <ul>
                        <p>Saat ini tidak ada Notifikasi</p>
                    </ul>
                </li>
            </ul>
<script type="text/javascript">
$(document).ready(function() {
    $(".slimScrollDiv").height(100);
});

</script>
        <?php
        }
    ?>
</li>
    
   
<!--
       <ul class="dropdown-menu mailbox animated bounceInRight">
            <li>
                <div class="drop-title">You have 4 new messages</div>
            </li>
            <li>
                <div class="message-center">
                    <a href="#">
                        <div class="user-img"> <img src="<?php echo base_url();?>optimum/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                    </a>
                    <a href="#">
                        <div class="user-img"> <img src="<?php echo base_url();?>optimum/plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                    </a>
                    <a href="#">
                        <div class="user-img"> <img src="<?php echo base_url();?>optimum/plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                    </a>
                    <a href="#">
                        <div class="user-img"> <img src="<?php echo base_url();?>optimum/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                    </a>
                </div>
            </li>
            <li>
                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
            </li>
        </ul>
</li>-->
