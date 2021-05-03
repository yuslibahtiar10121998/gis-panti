<div class="col-sm-12">
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
                    <th>Pendidikan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($lihatanak as $key => $value) { ?>
                    <tr>
                        <td> <?= $no++; ?></td>
                        <td> <?= $value->nama_lengkap ?></td>
                        <td> <?= $value->jenis_kelamin ?></td>
                        <td> <?= $value->asal_tempat_lahir ?></td>
                        <td> <?= $value->tanggal_lahir ?></td>
                        <td> <?= $value->umur ?></td>
                        <td> <?= $value->pendidikan ?></td>
                        <td> <?= $value->status ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>