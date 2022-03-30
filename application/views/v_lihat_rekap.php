<div class="col-sm-12">
<?php
    //notifikasi pesan data berhasil di simpan
    if ($this->session->flashdata('pesan')) {
        echo  '<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }
    ?>
    <div class="table-responsive">
        <table class="table table-responsive table-bordered" id="datatables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Wilayah</th>
                    <th>Pendidikan</th>
                    <th>jenis Kelamin</th>
                    <th>Status Anak Asuh</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0;foreach ($all_rekap as $rekap) : ?>
                    <tr>
                        <td><?= ++$i?></td>
                        <td><?=  $this->db->get_where('tbl_kecamatan', ['id_kecamatan' => $rekap['kecamatan_id'] ])->row_array()['nama_kecamatan'];?></td>
                        <td><?=  $this->db->get_where('tbl_pendidikan', ['id_pendidikan' => $rekap[''] ])->row_array()['nama_kecamatan'];?></td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>