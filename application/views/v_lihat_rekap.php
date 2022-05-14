<div class="col-sm-12">
    <h1>Statistik pendidikan</h1>
    <div class="table-responsive">
        <table class="table table-responsive table-bordered" id="datatables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Wilayah</th>
                    <th>SD</th>
                    <th>SMP</th>
                    <th>SMA</th>
                    <th>Tidak sekolah</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0;foreach ($all_rekap as $rekap) : ?>
                    <tr>
                        <td><?= ++$i?></td>
                        <td><?=  $this->db->get_where('tbl_kecamatan', ['id_kecamatan' => $rekap['kecamatan_id'] ])->row_array()['nama_kecamatan'];?></td>
                        <td>
                            <?= $rekap['sd']?>
                        </td>
                        <td>
                            <?= $rekap['smp']?>
                        </td>
                        <td>
                            <?= $rekap['sma']?>
                        </td>
                        <td>
                            <?= $rekap['tidak_sekolah']?>
                        </td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <h1>Statistik jenis kelamin</h1>
    <div class="table-responsive">
        <table class="table table-responsive table-bordered" id="datatables2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Wilayah</th>
                    <th>Laki - Laki</th>
                    <th>Perempuan</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0;foreach ($all_rekap as $rekap) : ?>
                    <tr>
                        <td><?= ++$i?></td>
                        <td><?=  $this->db->get_where('tbl_kecamatan', ['id_kecamatan' => $rekap['kecamatan_id'] ])->row_array()['nama_kecamatan'];?></td>
                        <td>
                            <?= $rekap['laki_laki']?>
                        </td>
                        <td>
                            <?= $rekap['perempuan']?>
                        </td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <h1>Statistik status</h1>
    <div class="table-responsive">
        <table class="table table-responsive table-bordered" id="datatables3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Wilayah</th>
                    <th>Yatim</th>
                    <th>Piatu</th>
                    <th>Yatim Piatu</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0;foreach ($all_rekap as $rekap) : ?>
                    <tr>
                        <td><?= ++$i?></td>
                        <td><?=  $this->db->get_where('tbl_kecamatan', ['id_kecamatan' => $rekap['kecamatan_id'] ])->row_array()['nama_kecamatan'];?></td>
                        <td>
                            <?= $rekap['yatim']?>
                        </td>
                        <td>
                            <?= $rekap['piatu']?>
                        </td>
                        <td>
                            <?= $rekap['yatim_piatu']?>
                        </td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>