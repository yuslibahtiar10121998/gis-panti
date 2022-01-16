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
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-body">
        <td>
            <a href="<?= base_url('profildinas/edit/' . $value->id_admin) ?>" class="btn btn-sm-40 btn-success">Edit Profil Admin</a>
        </td>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Admin</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $value->nama_admin ?>" class="form-control" readonly />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $value->email ?>" class="form-control" readonly />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $value->nomor_telepon ?>" class="form-control" readonly />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $value->username ?>" class="form-control" readonly />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>