<div class="col-sm-7">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Input Data Anak
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

            echo form_open('anak/input');
            ?>

            <div class="form-group">
                <label>Nama Anak</label>
                <input name="nama_lengkap" placeholder="Nama Lengkap" <?= set_value('nama_lengkap') ?> class="form-control" />
            </div>
            <div class="form-group">
                <label>Pilih Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option> Laki-laki </option>
                    <option> Perempuan </option>
                </select>
            </div>
            <div class="form-group">
                <label>Asal Tempat Lahir</label>
                <input name="asal_tempat_lahir" placeholder="Asal Tempat Lahir" <?= set_value('asal_tempat_lahir') ?> class="form-control" />
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input name="tanggal_lahir" <?= set_value('tanggal_lahir') ?> type="date" class="form-control" />
            </div>
            <div class="form-group">
                <label>Umur</label>
                <input name="umur" placeholder="Umur" <?= set_value('umur') ?> class="form-control" />
            </div>

            <div class="form-group">
                <label>Pendidikan </label>
                <select name="id_panas" class="form-control">
                    <option value="">--Pilih Pendidikan--</option>
                    <?php foreach ($list_pendidikan as $anak) : ?>
                        <option value="<?= $anak->id_pendidikan ?>"><?= $anak->pendidikan ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="id_panas" class="form-control">
                    <option value="">--Pilih Status--</option>
                    <?php foreach ($list_status as $anak) : ?>
                        <option value="<?= $anak->id_status ?>"><?= $anak->status ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                <a href="<?= base_url('anak/batal/') ?>" type="reset" class="btn btn-sm btn-warning">Batal</a>
            </div>

            <?php echo form_close() ?>

        </div>
    </div>
</div>