<!-- Start Page Content-->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
    <div class="panel-heading"><i class="fa fa-list"></i>&nbsp;Daftar List Pengguna</div>
    <div class="panel-body table-responsive">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr align="center">
                    <th>Nama Anda</th>
                    <th>Username</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pengguna as $user): ?>
                    <tr>
                        <td><?php echo $user['nama']; ?></td>
                        <td><?php echo $user['u_name']; ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td>
                            <?php if($user['aktif'] == 'N'): ?>
                            <div class="label label-table label-danger">Non-Aktif</div>
                            <?php else: ?>
                            <div class="label label-table label-success">Aktif</div>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if($user['level'] == 'admin'): ?>
                            <div class="label label-table label-info"><i class="fa fa-user"></i> Admin</div>
                            <?php else: ?>
                                <div class="label label-table label-warning"><i class="fa fa-user"></i> Operator</div>
                            <?php endif ?>
                        </td>
                        <td>
                            <a href="#"><i class="fa fa-pencil text-success m-r-10"></i></a>
                                    
                            <a href="#" data-toggle="modal" data-target="#delmodal_<?php echo $user['id'];?>"><i class="fa fa-trash text-danger m-r-10"></i></a>

                            <a href="#" data-toggle="modal" data-target="#stsmodal_<?php echo $user['id'];?>"><i class="fa fa-gears m-r-10"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
</div>
</div>
<!-- End Page Content -->

<?php foreach ($pengguna as $user): ?>
    <div id="stsmodal_<?php echo $user['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labeledby="myModalLabel" aria-hidden="true" style="display:none;">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
            <h4 class="modal-title">Active and Inactive User&nbsp;&nbsp;<i class="fa fa-gears"></i></h4>    
        </div> 
            <div class="modal-body">
                 <?php if($user['aktif'] == 'N'): ?>  
                    <form role="form" action="<?php echo base_url('pengguna/aktif_user/'.$user['id']) ?>" method="post">
                         <p> Do you really want to Active User ?</p>
                        <input type="text" value="Y" name="aktif" readonly hidden>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-rounded btn-sm" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-default btn-rounded btn-sm"><i class="icon-gears"></i>&nbsp;Active</button>
                        </div>
                    </form>
                 <?php else: ?>
                    <form role="form" action="<?php echo base_url('pengguna/aktif_user/'.$user['id']) ?>" method="post">
                         <p> Do you really want to Inactive User ?</p>
                        <input type="text" value="N" name="aktif" readonly hidden>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-rounded btn-sm" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-default btn-rounded btn-sm"><i class="icon-gears"></i>&nbsp;Inactive</button>
                        </div>
                    </form>
                 <?php endif ?>  
            </div>       
        </div>    
        </div>
        </div>
<?php endforeach ?>