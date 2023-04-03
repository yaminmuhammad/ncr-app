<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<section>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                    <!-- <img src="assets/images/gambar2.jpeg" class="w-90" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo"> -->
                    <div class="card-body p-4 p-md-5">
                        <h2 class="text-center mb-4">Form Report NCR Product</h2>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> -->
                            </div>
                        <?php endif; ?>
                        <form action="/product/save" method="post" enctype="multipart/form-data" class="px-md-2">
                            <?= csrf_field() ?>
                            <div class="form-outline mb-4">
                                <label for="problem" class="form-label fs-5">Problem</label>
                                <textarea class="form-control border border-2 p-2 mb-2 <?= (validation_show_error('problem')) ? 'is-invalid' : ''; ?>" id="problem" autofocus value="<?= old('problem') ?>" name="problem" style="height: 100px; resize: none;"></textarea>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('problem'); ?>
                                </div>
                            </div>
                            <div class="form-outline mb-4">
                                <label for="area" class="form-label fs-5">Area</label>
                                <input type="text" class="form-control border border-2 p-2 mb-2 " id="area" name="area" />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="qty" class="form-label fs-5">QTY</label>
                                <input type="number" class="form-control border border-2 p-2 mb-2 " id="qty" name="qty" />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="departemen" class="form-label fs-5">Departemen</label>
                                <input type="text" class="form-control border border-2 p-2 mb-2 " id="departemen" name="departemen" />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="foto" class="form-label fs-5 custom-file-label">Upload Foto</label>
                                <div class="col-sm-8 w-200 h-150">
                                    <img src="/assets/images/default.jpg" class="img-thumbnail img-preview">
                                </div>
                                <input type="file" class="form-control border border-2 p-2 mb-2 foto" id="foto" name="foto" onchange="previewImg()" />
                                <!-- <div class="invalid-feedback">
                                </div> -->
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('/home'); ?>" class="btn btn-secondary btn-lg">Back</a>
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>