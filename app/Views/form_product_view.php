<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<section class="h-100%" style="background-image: url('assets/images/Tyler.jpeg');">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                    <img src="assets/images/gambar2.jpeg" class="w-90" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="text-center mb-4">Form Report NCR Product</h2>

                        <form action="/product/save" method="post" enctype="multipart/form-data" class="px-md-2">
                            <?= csrf_field() ?>
                            <div class="form-outline mb-4">
                                <label for="problem" class="form-label fs-5">Problem</label>
                                <textarea class="form-control border border-2 p-2 mb-2 border-opacity-75" id="problem" name="problem" style="height: 100px; resize: none;" required></textarea>
                            </div>
                            <div class="form-outline mb-4">
                                <label for="area" class="form-label fs-5">Area</label>
                                <input type="text" class="form-control border border-2 p-2 mb-2 border-opacity-75" id="area" name="area" required />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="qty" class="form-label fs-5">QTY</label>
                                <input type="number" class="form-control border border-2 p-2 mb-2 border-opacity-75" id="qty" name="qty" required />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="departemen" class="form-label fs-5">Departemen</label>
                                <input type="text" class="form-control border border-2 p-2 mb-2 border-opacity-75" id="departemen" name="departemen" required />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="foto" class="form-label fs-5">Upload Foto</label>
                                <input type="file" class="form-control border border-2 p-2 mb-2 border-opacity-75" id="foto" name="foto" />
                                <!-- <div class="invalid-feedback">
                                </div> -->
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>