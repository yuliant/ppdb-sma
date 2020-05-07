<section class="section">
    <div class="section-body">

        <!-- flashdata message -->
        <?php echo $this->session->flashdata('message'); ?>

        <!-- jika data tidak ditemukan -->
        <?php if (empty($pendaftar_row->result())) : ?>
            <div class="alert alert-danger" role="alert">
                Data tidak ditemukan
            </div>
        <?php endif ?>

        <div class="card">
            <div class="card-header">
                <h4><?php echo $tittle; ?></h4>

                <!-- search pendaftar -->
                <div class="card-header-action">
                    <form class="" action="<?php echo base_url('pendaftar/index'); ?>" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="keyword" value="<?php echo set_value('keyword'); ?>" autofocus>
                            <div class="input-group-btn">
                                <input class="btn btn-primary" type="submit" name="submit">
                            </div>
                        </div>
                    </form>
                    <small>Jumlah Data : <?php echo $total_rows . " ,Filter (" . $keyword . ")" ?></small>
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <!-- <table class="table table-bordered table-md"> -->
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pendaftar</th>
                                <th>Tanggal daftar</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pendaftar_row->result() as $key => $data) {
                            ?>
                                <tr <?php if ($data->status == 0) { ?> class="table-warning" <?php } else if ($data->status == 1) { ?> class="" <?php } else { ?> class="table-danger" <?php } ?>>
                                    <td><?php echo ++$start ?></td>
                                    <td><a href="<?php echo base_url('pendaftar/detail/') . $data->id_user ?>"><?php echo $data->nama ?></a></td>
                                    <td><?php echo date("d-m-Y", strtotime($data->daftar_created)) ?></td>
                                    <td>
                                        <?php if ($data->status == 0) { ?>
                                            <div class="badge badge-warning">Belum check</div>
                                        <?php } else if ($data->status == 1) { ?>
                                            <div class="badge badge-success">Dikonfirmasi</div>
                                        <?php } else { ?>
                                            <div class="badge badge-danger">Ditolak</div>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('pendaftar/detail/') . $data->id_user ?>" class="badge badge-info">Baca</a>
                                    </td>
                                </tr>
                            <?php
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