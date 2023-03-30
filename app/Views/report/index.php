<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid ">
    <div class="row">
        <div class="col text-center">
            <h1 class="text-white">Daftar Laporan</h1>
            <!-- membuat flash data dari router setelah di save -->
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <!-- end flash data -->
            <table class="table table-responsive text-white">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Problem</th>
                        <th scope="col">Area</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Departemen</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($report as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/assets/images/<?= $r['foto']; ?>" alt="" class="img-thumbnail" style="width: 100px;"></td>
                            <td><?= $r['problem']; ?></td>
                            <td><?= $r['area']; ?></td>
                            <td><?= $r['qty']; ?></td>
                            <td><?= $r['departemen']; ?></td>
                            <td>
                                <a href="/report/<?= $r['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
        </div>
    </div>
</div>
<?= $this->endSection() ?>