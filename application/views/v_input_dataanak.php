<div class="col-sm-7">
    <div class="panel panel-primary">
        <div class="panel-heading">
                Input Data Anak
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

                 echo form_open('anak/input');
             ?>

                <div class="form-group">
                    <label>Nama Anak</label>
                    <input name="nama_lengkap" placeholder="Nama Lengkap" <?= set_value('nama_lengkap') ?> class="form-control" />
                </div> 
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input name="jenis_kelamin" placeholder="Jenis Kelamin" <?= set_value('jenis_kelamin') ?> class="form-control" />
                </div>
                <div class="form-group">
                    <label>Asal Tempat Lahir</label>
                    <input name="asal_tempat_lahir" placeholder="Asal Tempat Lahir" <?= set_value('asal_tempat_lahir') ?> class="form-control" />
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input name="tanggal_lahir" placeholder="yy-mm-dd" <?= set_value('tanggal_lahir') ?> class="form-control" />
                </div>
                <div class="form-group">
                    <label>Umur</label>
                    <input name="umur" placeholder="Umur" <?= set_value('umur') ?> class="form-control" />
                </div>
                <div class="form-group">
                    <label>Pendidikan</label>
                    <input name="pendidikan" placeholder="Pendidikan" <?= set_value('pendidikan') ?> class="form-control" />
                </div>

                <div class="form-group">
                    <label></label>
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                    <a  href="<?= base_url('anak/batal/') ?>" type="reset" class="btn btn-sm btn-warning">Batal</a>
                </div>

             <?php echo form_close()?>

        </div>
    </div>
</div>