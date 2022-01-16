<div class="col-sm-12">
    <?php
    if ($this->session->flashdata('pesan')) {
        echo  '<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }
    ?>
    <style>
.zoom {
  transition: transform .2s; /* Animation */
  width: 150px;
  height: 100px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(4); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
    <div class="table-responsive">
        <?php foreach ($panti as $key => $value) ?>
        <td>
            <a href="<?= base_url('panti/input/' . $value->id_panas) ?>" class="btn btn-sm-40 btn-success">Tambah</a>
        </td>
        <table class="table table-striped table-bordered table-hover" id="datatables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Panti</th>
                    <th>Jumlah Anak</th>
                    <th>Daya Tampung</th>
                    <th>Alamat</th>
                    <th>Kecamatan</th>
                    <th>Nomor Rekening</th>
                    <th>Tahun Berdiri</th>
                    <th>jumlah pengurus</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Gambar Panti</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = $this->uri->segment('3') + 1;
                foreach ($panti as $key => $value) { ?>
                    <tr>
                        <td> <?= $no++; ?></td>
                        <td> <?= $value->nama_panas ?></td>
                        <td> <?= $value->jumlah_anak ?></td>
                        <td> <?= $value->daya_tampung ?></td>
                        <td> <?= $value->alamat ?></td>
                        <td> <?= $value->nama_kecamatan ?></td>
                        <td> <?= $value->nomor_rekening ?></td>
                        <!-- <td> <?= $value->nomor_telepon ?></td> -->
                        <td> <?= $value->tahun_berdiri ?></td>
                        <td> <?= $value->jumlah_pengurus ?></td>
                        <td> <?= $value->latitude ?></td>
                        <td> <?= $value->longitude ?></td>
                        <td> <img src="<?= base_url('gambar/' . $value->gambar) ?>" class="zoom" height="50px" width="70px"></td>
                        <td>
                            <a href="<?= base_url('panti/edit/' . $value->id_panas) ?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="<?= base_url('panti/lihatanak/' . $value->id_panas) ?>" class="btn btn-sm btn-warning">Lihat anak</a>
                            <a href="<?= base_url('panti/hapus/' . $value->id_panas) ?>" class="btn btn-sm btn-danger" onClick="return confirm('Yakin ingin menghapus ?')">Hapus</a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
        <?php
        echo $this->pagination->create_links();
        ?>
    </div>
</div>