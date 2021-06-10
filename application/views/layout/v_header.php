<div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->
                <a class="navbar-brand" class="fa fa-home"  style="font-size: 17px;">GIS | Panti Asuhan</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 13px;"> Tanggal : 

<?= date('D, d M Y   |') ?>

<?php if ($this->session->userdata('user')=="") { ?>
    <a href="<?= base_url('login') ?>" class="btn btn-success square-btn-adjust">Silahkan Login</a> 
<?php }else{ ?>
    Nama : <?= $this->session->userdata('user')->nama_admin ?>
    <a href="<?= base_url('webgis') ?>" class="btn btn-danger square-btn-adjust">Logout</a>
<?php } ?>
</div>
</nav>   
           <!-- /. NAV TOP  -->