<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container" style="margin-top: 80px;">
    <div class="row justify-content-center text-center">
        <div class="col-sm-6 col-lg-4 mb-4">

            <div class="card" style="width: 18rem; ">
                <img src="<?= base_url() ?>assets/images/gambar1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">NCR Process</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="<?= base_url('/form') ?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4">

            <div class="card" style="width: 18rem;">
                <img src="<?= base_url() ?>assets/images/gambar2.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">NCR Products</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="<?= base_url('/form') ?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>