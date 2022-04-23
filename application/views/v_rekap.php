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
                    <th>Tahun</th>
                    <th>Tanggal diperbaharui</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;foreach ($data_rekap as $rekap) : ?>
<<<<<<< HEAD
                
=======
>>>>>>> 6192d9faae175b63e41fa2d94ef267e8feb232e4
                    <tr>
                        <td><?= ++$i?></td>
                        <td><?= $rekap['tahun']?></td>
                        <td>
                            <?= $rekap['updated_at']?>
                        </td>
                        <td>
                            <a href="<?= base_url('rekap/detail_rekap')?>/<?= $rekap['wilayah_id']?>/<?= $rekap['tahun']?>" class="btn btn-primary">Lihat detail</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>