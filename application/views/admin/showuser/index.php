<section class="section">
    <div class="section-body">

        <!-- flashdata message -->
        <?php echo $this->session->flashdata('message'); ?>

        <!-- jika data tidak ditemukan -->
        <?php if (empty($user_row->result())) : ?>
            <div class="alert alert-danger" role="alert">
                Data tidak ditemukan
            </div>
        <?php endif ?>

        <div class="card">
            <div class="card-header">
                <h4><?php echo $tittle; ?></h4>

                <!-- search pendaftar -->
                <div class="card-header-action">
                    <form class="" action="<?php echo base_url('showuser/index'); ?>" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="keyword" value="<?php echo set_value('keyword'); ?>" autofocus>
                            <div class="input-group-btn">
                                <input class="btn btn-primary" type="submit" name="submit">
                            </div>
                        </div>
                    </form>
                    <small>Jumlah Data : <?php echo $total_rows . " (" . $keyword . ")" ?></small>
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <!-- <table class="table table-bordered table-md"> -->
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user_row->result() as $key => $data) {
                                if ($data->level == 2) {
                            ?>
                                    <tr <?php if ($data->is_active == 0) { ?> class="table-danger" <?php } else { ?> class="" <?php } ?>>
                                        <td><?php echo ++$start ?></td>
                                        <td><a href="<?php echo base_url('showuser/detail/') . $data->user_id ?>"><?php echo $data->nama ?></a></td>
                                        <td><?php echo $data->username ?></td>
                                        <td>
                                            <?php if ($data->is_active == 0) { ?>
                                                <div class="badge badge-danger">Tidak aktif</div>
                                            <?php } else { ?>
                                                <div class="badge badge-success">Aktif</div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <form action="<?php echo base_url('showuser/deleteuser') ?>" method="post">
                                                <a href="<?php echo base_url('showuser/detail/') . $data->user_id ?>" class="badge badge-info btn-xs">Baca</a>
                                                <input type="hidden" name="user_id" value="<?php echo $data->user_id ?>">
                                                <button class="btn btn-danger btn-sm ml-2 btn-xs" name="hapus" type="hapus" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus Data</button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        <!-- pagiation in here -->
                        <?php echo $this->pagination->create_links(); ?>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
</section>