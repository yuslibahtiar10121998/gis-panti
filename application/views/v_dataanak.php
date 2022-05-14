<div class="col-sm-12">
    <?php
    //notifikasi pesan data berhasil di simpan
    if ($this->session->flashdata('pesan')) {
        echo  '<div class="alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }
    ?>
    <div class="table-responsive">
        <?php foreach ($anak as $key => $value) ?>
        <td>
            <a href="<?= base_url('anak/input/' . $value->id_anak) ?>" class="btn btn-sm-40 btn-success">Tambah</a>
        </td>
        <table class="table table-responsive table-bordered" id="datatables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>Nama Lengkap Ibu</th>
                    <th>Nama Lengkap Ayah</th>
                    <th>Pendidikan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($anak as $key => $value) { ?>
                    <tr>
                        <td> <?= $no++; ?></td>
                        <td> <?= $value->nama_lengkap ?></td>
                        <td> <?= $value->nama_kelamin ?></td>
                        <td> <?= $value->asal_tempat_lahir ?></td>
                        <td> <?= $value->tanggal_lahir ?></td>
                        <td> <?= $value->umur ?></td>
                        <td> <?= $value->nama_lengkap_ibu ?></td>
                        <td> <?= $value->nama_lengkap_ayah ?></td>
                        <td> <?= $value->pendidikan ?></td>
                        <td> <?= $value->status ?></td>
                        <td>
                            <a href="<?= base_url('anak/edit/' . $value->id_anak) ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?= base_url('anak/hapus/' . $value->id_anak) ?>" class="btn btn-sm btn-danger" onClick="return confirm('Yakin ingin menghapus ?')">Hapus</a>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>