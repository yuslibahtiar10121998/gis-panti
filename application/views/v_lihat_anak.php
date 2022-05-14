<div class="col-sm-12">
    <td>
        <a href="<?= base_url('panti') ?>" class="btn btn-sm-40 btn-primary">Kembali</a>
    </td>
    <div class="table-responsive">
        <table class="table table-responsive table-bordered" id="dataTables-example">
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
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($listanak as $key => $value) { ?>
                    <tr>
                        <td> <?= $no++; ?></td>
                        <td> <?= $value['nama_lengkap'] ?></td>
                        <td> <?= get_kelamin($value['kelamin_id']) ?></td>
                        <td> <?= $value['asal_tempat_lahir'] ?></td>
                        <td> <?= $value['tanggal_lahir'] ?></td>
                        <td> <?= $value['umur'] ?></td>
                        <td> <?= $value['nama_lengkap_ibu'] ?></td>
                        <td> <?= $value['nama_lengkap_ayah'] ?></td>
                        <td> <?= get_pendidikan($value['pendidikan_id']) ?></td>
                        <td> <?= get_status($value['status_id']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>