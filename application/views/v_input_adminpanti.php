<div class="col-sm-7">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Input Data Admin Panti Asuhan
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

            echo form_open('adminpanti/input');
            ?>

            <div class="form-group">
                <label>Nama Admin Panti</label>
                <input name="nama_admin" placeholder="Nama Admin Panti" <?= set_value('nama_admin') ?> class="form-control" />
            </div>

            <div class="form-group">
                <label>Panti Asuhan</label>
                <select name="id_panas" class="form-control">
                <option value="">--Pilih Panti asuhan--</option>
                <?php foreach($list_panti as $panti) : ?>
                <option value="<?= $panti->id_panas?>"><?= $panti->nama_panas?></option>
                <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input name="username" placeholder="Username" <?= set_value('username') ?> class="form-control" />
            </div>

            <div class="form-group">
                <label>Email</label>
                <input name="email" placeholder="Email" <?= set_value('email') ?>  class="form-control" />
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input name="nomor_telepon" placeholder="Nomor Telepon" <?= set_value('nomor_telepon') ?> class="form-control" />
            </div>

            <div class="form-group">
                <label>Password</label>
                <input name="password" placeholder="Password" <?= set_value('password') ?> class="form-control" />
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