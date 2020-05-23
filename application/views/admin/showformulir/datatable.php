<script src="<?php echo base_url(); ?>assets/stisla/modules/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/modules/jquery-ui/jquery-ui.min.js"></script>

<section class="section">
    <div class="section-body">

        <!-- flashdata message -->
        <?php echo $this->session->flashdata('message'); ?>

        <div class="card">
            <div class="card-header">
                <h4><?php echo $tittle; ?></h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md" id="table-formulir">
                        <thead>
                            <tr>
                                <th class="bg-success text-dark">#</th>
                                <th class="bg-success text-dark">Nama Formulir</th>
                                <th class="bg-success text-dark">Username</th>
                                <th class="bg-success text-dark">Tanggal dibuat</th>
                                <th class="bg-success text-dark">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- start datatable in here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
<script>
    $(document).ready(function() {
        $("#table-formulir").dataTable({
            "processing": true,
            "stateSave": true,
            "serverSide": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100],
                [5, 10, 25, 50, 100]
            ],
            "order": [
                [3, "desc"]
            ],
            "ajax": {
                "url": '<?php echo base_url('admin/showformulir/get_ajax') ?>',
                "type": 'POST'
            },
            // untuk mengatur kolom
            "columns": [
                // Membuat nomor pada datatable (bukan ID user)
                {
                    data: 'no',
                    name: 'no'
                },
                // nama
                {
                    data: 'nama',
                    name: 'nama'
                },
                //user
                {
                    data: 'username',
                    name: 'username'
                },
                // aktif or not
                {
                    data: 'tgl_daftar',
                    name: 'tgl_daftar'
                },
                //aksinya apa
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            "columnDefs": [{
                    "targets": [0, 1, 2, 3, 4],
                    "className": 'text-center'
                },
                {
                    "targets": [4],
                    "orderable": false
                },
            ]
        });
    })
</script>