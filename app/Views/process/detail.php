<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="mt-2">Judul Komik</h1>
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $process['problem'] ?></h5>
                            <p class="card-text"><b>Penulis : </b><?= $process['area'] ?></p>
                            <p class="card-text"><b>Penerbit : </b><small class="text-muted"><?= $process['qty']; ?></phpp></small></p>
                            <p class="card-text"><b>Penerbit : </b><small class="text-muted"><?= $process['departemen']; ?></phpp></small></p>

                        </div>
                        <a href="" class="ml-4">Kembali ke daftar komik</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>