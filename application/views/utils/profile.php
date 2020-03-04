<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?php echo base_url('profil') ?>">Utilities</a></div>
            <div class="breadcrumb-item">Profil</div>
        </div>
    </div>


    <div class="section-body">
        <!-- flashdata message -->

        <div class="col-12 col-sm-12 col-lg-7">
            <?php echo $this->session->flashdata('message'); ?>
        </div>

        <div class="col-12 col-sm-12 col-lg-7">
            <div class="card author-box card-primary">
                <div class="card-body">
                    <div class="author-box-left">
                        <img alt="image" src="<?php
                                                echo base_url('assets/sources/img/') .
                                                    $this->fungsi->user_login()->image; ?>" class="author-box-picture">
                    </div>
                    <div class="author-box-details">
                        <div class="author-box-name">
                            <h5 class="text-primary"><?php echo $this->fungsi->user_login()->nama; ?></h5>
                        </div>
                        <div class="author-box-job"><?php echo $this->fungsi->user_login()->username; ?></div>
                        <div class="author-box-description">
                            <p>Mamber since <?php echo date('d F Y', $this->fungsi->user_login()->date_created); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>