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
            <div class="table-responsive">
                <table class="table table-bordered text-white">
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
                        <?php foreach ($process as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="/img/<?= $p['foto']; ?>" alt="" class="img-thumbnail fs-2" style="width: 200px;"></td>
                                <td><?= $p['problem']; ?></td>
                                <td><?= $p['area']; ?></td>
                                <td><?= $p['qty']; ?></td>
                                <td><?= $p['departemen']; ?></td>
                                <td>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>