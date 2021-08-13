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
    <?= form_open('rekap/do_rekap') ?>
    <button name="wilayah_id" type="submit" value="<?= get_user()->wilayah_id ?>" class="btn btn-sm btn-success">Rekap</button>
    <?= form_close(); ?>
    <div class="table-responsive">
        <table class="table table-responsive table-bordered" id="dataTables-example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Rekap</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>20-03-2021</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>