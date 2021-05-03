<div class="col-sm-12">
    <?php
    if ($this->session->flashdata('pesan')) {
        echo  '<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }
    ?>

    <div class="table-responsive">
        <?php foreach ($profildinas as $key => $value) ?>
        <td>
            <a href="<?= base_url('profildinas/edit/' . $value->id_admin) ?>" class="btn btn-sm-40 btn-success">Edit Profil Admin</a>
        </td>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="200px">Nama Admin</th>
                    <th width="30px">:</th>
                    <td><?= $value->nama_admin ?></td>
                </tr>
                <tr>
                    <th width="200px">Email</th>
                    <th width="30px">:</th>
                    <td><?= $value->email ?></td>
                </tr>
                <tr>
                    <th width="200px">Nomor Telepon</th>
                    <th width="30px">:</th>
                    <td><?= $value->nomor_telepon ?></td>
                </tr>
                <tr>
                    <th width="200px">Username</th>
                    <th width="30px">:</th>
                    <td><?= $value->username ?></td>
                </tr>
            </thead>
        </table>
    </div>
</div>