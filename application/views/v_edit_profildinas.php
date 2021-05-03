<div class="col-sm-5">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Data Admin Dinas
        </div>
        <div class="panel-body">
            <?php
            //code validasi data tidak boleh kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');

            //notifikasi data berhasil disimpan
            if ($this->session->flashdata('pesan')) {
                echo  '<div class="alert alert-success alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }

            echo form_open_multipart('profildinas/edit/' . $profildinas->id_admin);
            ?>

            <div class="form-group">
                <label>Nama Admin</label>
                <input name="nama_admin" placeholder="Nama Admin" value="<?= $profildinas->nama_admin ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Email</label>
                <input name="email" placeholder="Email" value="<?= $profildinas->email ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input name="nomor_telepon" placeholder="Nomor Telepon" value="<?= $profildinas->nomor_telepon ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Username</label>
                <input name="username" placeholder="Username" value="<?= $profildinas->username ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Password</label>
                <input name="password" placeholder="Password" class="form-control" />
            </div>

            <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                <a href="<?= base_url('profildinas/batal/') ?>" type="reset" class="btn btn-sm btn-warning">Batal</a>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
</div>