<div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Panti</th>
                    <th>Jumlah Anak</th>
                    <th>Aksi</th>
                    <!-- <?php if ($this->session->userdata('username') <> "") { ?>
                        
                    <?php } ?> -->
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($listanak as $key => $value) { ?>
                    <tr>
                        <td> <?= $no++; ?></td>
                        <td> <?= $value->nama_panas ?></td>
                        <td> <?= $value->jumlah_anak ?></td>
                        <td>
                            <a href="<?= base_url('lihatanak') ?>" class="btn btn-sm btn-info">Lihat</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>