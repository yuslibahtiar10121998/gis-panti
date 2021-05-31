<div class="col-sm-7">
    <div class="panel panel-primary">
        <div class="panel-heading">
                Edit Data Admin Panti Asuhan
             </div>
             <div class="panel-body">
             <?php
                 //code validasi data tidak boleh kosong
                 echo validation_errors('<div class="alert alert-danger alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');

                 //notifikasi data berhasil disimpan
                 if ($this->session->flashdata('pesan')){
                 echo  '<div class="alert alert-success alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                 echo $this->session->flashdata('pesan');
                 echo '</div>';
                 }

                 echo form_open('adminpanti/edit/'.$adminpanti->id_admin);
             ?>

                <div class="form-group">
                    <label>Nama Admin Panti Asuhan</label>
                    <input name="nama_admin" placeholder="Nama Admin Panti Asuhan" value="<?= $adminpanti->nama_admin ?>" class="form-control" />
                </div> 

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input name="nomor_telepon" placeholder="Nomor Telepon" value="<?= $adminpanti->nomor_telepon ?>" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" placeholder="Email" value="<?= $adminpanti->email ?>" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input name="username" placeholder="Username" value="<?= $adminpanti->username ?>" class="form-control" />
                </div> 

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control" />
                </div> 

                <div class="form-group">
                    <label></label>
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                    <a href="<?= base_url('adminpanti/batal/') ?>" type="reset" class="btn btn-sm btn-warning">Batal</a>
                </div>

             <?php echo form_close() ?>
       </div>
    </div>
</div>