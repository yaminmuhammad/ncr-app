<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Daftar Laporan</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Problem</th>
                        <th scope="col">Area</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Departemen</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($report as $r) :  ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><img src="/assets/images/<?= $r['foto']; ?>" alt="Gambar 1" class="foto"></td>
                            <td><?= $r['problem'] ?></td>
                            <td><?= $r['area'] ?></td>
                            <td><?= $r['qty'] ?></td>
                            <td><?= $r['departemen'] ?></td>
                            <td>
                                <a href="" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>