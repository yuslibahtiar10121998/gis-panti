<div class="col-sm-12">
    <?= form_open('rekap/do_rekap') ?>
    <button name="wilayah_id" type="submit" value="<?= get_user()->wilayah_id ?>" class="btn btn-sm btn-success">Rekap</button>
    <?= form_close(); ?>
    <div class="table-responsive">
        <table class="table table-responsive table-bordered" id="dataTables-example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Rekap</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>(contoh) 1</td>
                    <td>(contoh) 4 mei 2021</td>
                    <td><a href="<?= base_url('rekap/detailrekap/') ?>" class="btn btn-sm btn-info">Detail</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>