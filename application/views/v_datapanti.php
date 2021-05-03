<div class="col-sm-12">
<?php
if ($this->session->flashdata('pesan')){
echo  '<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
echo $this->session->flashdata('pesan');
echo '</div>';
}
?>
<div class="table-responsive">
    <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Panti</th>
                <th>Jenis Panti</th>
                <th>Pimpinan Panti</th>
                <th>Jumlah Anak</th>
                <th>Daya Tampung</th>
                <th>Alamat</th>
                <th>Nomor Rekening</th>
                <th>NPWP</th>
                <th>Nomor Telepon</th>
                <th>Jumlah Pengurus</th>
                <th>Gambar Panti</th>
            <?php if ($this->session->userdata('username')<>"") { ?>
                <th>Aksi</th>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($panti as $key => $value) { ?>
            <tr>
                <td> <?= $no++; ?></td>
                <td> <?= $value->nama_panas ?></td>
                <td> <?= $value->jenis_panas ?></td>
                <td> <?= $value->pimpinan_panas ?></td>
                <td> <?= $value->jumlah_anak ?></td>
                <td> <?= $value->daya_tampung ?></td>
                <td> <?= $value->alamat ?></td>
                <td> <?= $value->nomor_rekening ?></td>
                <td> <?= $value->npwp ?></td>
  
                <td> <?= $value->nomor_telepon ?></td>
                <td> <?= $value->jumlah_pengurus ?></td>
                <td> <img src="<?= base_url('gambar/' . $value->gambar) ?>" height="50px" width="70px"></td>
                <td>
                    <a href="<?= base_url('panti/edit/'.$value->id_panas) ?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="<?= base_url('panti/hapus/'.$value->id_panas) ?>" class="btn btn-sm btn-danger" onClick="return confirm('Yakin ingin menghapus ?')">Hapus</a>
                </td>
        </tr>
    <?php } ?> 
    </tbody>

    </table>
    </div>
        </div>