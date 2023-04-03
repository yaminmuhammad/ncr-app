<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid ">
    <div class="row" style="margin-bottom: 200px;">
        <div class="col text-center">
            <h1 class="text-white" style="margin-bottom: 50px; margin-top: 50px;">Daftar Laporan NCR Process</h1>
            <div class="d-flex justify-content-between" style="margin-bottom: 50px;">
                <a href="<?= base_url('/home'); ?>" class="btn btn-secondary btn-lg">Home</a>
                <a href="<?= base_url('/detail_product'); ?>" class="btn btn-warning btn-lg">NCR Product</a>
            </div>
            <div class="table-responsive">
                <table class="table text-white">
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