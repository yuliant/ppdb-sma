<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?php echo base_url('profil') ?>">Utilities</a></div>
            <div class="breadcrumb-item">Edit Profil</div>
        </div>
    </div>

    <div class="section-body">
        <div class="col-12 col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <?php echo form_open_multipart('editprofil'); ?>

                    <label>Username</label>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $user->username; ?>" readonly>
                    </div>

                    <label>Nama Lengkap*</label>
                    <div class="form-group">
                        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $user->nama; ?>">
                        <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <label>Picture</label>
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="
                            <?php echo base_url('assets/data/') .
                                $user->image; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                                <small>Maximal <?php echo substr($this->config->item('max_pp'), 0, -3) ?> Mb</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Save</button>
                        <a href="<?php echo base_url('profil') ?>" class="btn btn-light">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>