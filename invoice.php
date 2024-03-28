<?php
include 'resource/data/dataList.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $no_pembayaran = $_POST['no-pembayaran'];
    $nama_customer = $_POST['name'];
    $email = $_POST['email'];
    $nama_motor = $_POST['motor'];
    $harga_motor = $_POST['harga'];
    $warna = $_POST['selected-warna'];
    $harga_warna = $_POST['harga-warna'];

    $totalHarga = $harga_motor + $harga_warna;
    $ppn = $totalHarga * 0.1;
    $hargaAkhir = $totalHarga + $ppn;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honda - Motorcycle</title>
    <link rel="stylesheet" href="resource/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/style.css">
</head>

<body>

    <!-- Body Content -->
    <div class="content" id="content">
        <div class="container">
            <h1>INVOICE</h1>

            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="no-pembayaran" class="form-label">No. Pembayaran</label>
                        <input type="text" class="form-control" id="no-pembayaran" name="no-pembayaran" value="<?= $no_pembayaran ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Customer</label>
                        <input type="text" class="form-control" id="name" name="nama-customer" value="<?= $nama_customer ?>" readonly disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" readonly disabled>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Motor</th>
                        <th>Harga</th>
                        <th>Warna</th>
                        <th>Harga Warna</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><?= $nama_motor ?></td>
                        <td>Rp. <?= number_format($harga_motor, 0)  ?></td>
                        <td><?= $warna ?></td>
                        <td>Rp. <?= number_format($harga_warna, 0) ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="col-md-6">
                <table>
                    <tr>
                        <td width="20%">Total Harga</td>
                        <td width="20%">Rp. <?= number_format($totalHarga, 0)  ?></td>
                    </tr>
                    <tr>
                        <td width="20%">PPN 10%</td>
                        <td width="20%">Rp. <?= number_format($ppn, 0) ?></td>
                    </tr>
                </table>
                <hr class="col-md-7">
            </div>
            <div class="col"></div>
            <table>
                <tr>
                    <td width="20%">Total Bayar</td>
                    <td width="20%">Rp. <?= number_format($hargaAkhir, 0) ?></td>
                </tr>
            </table>

            <div class="row mx-auto">
                <button class="mt-4 col-lg-3 btn btn-sm btn-primary-custom">Simpan Transaksi</button>
                <a href="pembayaran.php?id=<?= $id ?>" class="ml-1">Kembali</a>
            </div>


        </div>
    </div>

    <!-- End Content -->


    <script src="resource/js/bootstrap.bundle.min.js"></script>
</body>

</html>