<div class="col-sm-12">
<?php
//notifikasi pesan data berhasil di simpan
if ($this->session->flashdata('pesan')){
echo  '<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
echo $this->session->flashdata('pesan');
echo '</div>';
}
?>
<div class="table-responsive">
<table  class="table table-responsive table-bordered" id="dataTables-example">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Admin</th>
                <th>Nomor Telepon</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($adminpanti as $key => $value) { ?>
            <tr>
                <td> <?= $no++; ?></td>
                <td> <?= $value->nama_admin ?></td>
                <td> <?= $value->nomor_telepon ?></td>
                <td> <?= $value->username ?></td>
                <td>
                    <a href="<?= base_url('adminpanti/edit/'.$value->id_admin) ?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="<?= base_url('adminpanti/hapus/'.$value->id_admin) ?>" class="btn btn-sm btn-danger" onClick="return confirm('Yakin ingin menghapus ?')">Hapus</a>
            </tr>
            <?php } ?> 
        </tbody>

    </table>
    </div>
</div>