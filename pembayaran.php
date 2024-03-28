<?php
require 'resource/data/dataList.php';
$id = $_GET['id'];
$date = date('Y-m-d');
session_start();

// Periksa apakah pengguna telah login, jika tidak, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil data pengguna dari session
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siqhtyl - Transaction</title>
    <link rel="stylesheet" href="resource/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg border-bottom sticky-top" style="background-color: #F0F0F0;">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="resource/img/logo.png" alt="Logo" width="75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#">Home</a>
                    <a class="nav-link active" href="#">Transaction</a>
                    <a class="nav-link" href="index.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Booking -->
    <section class="booking" id="booking">
        <div class="container">
            <h3 class="mb-5" style="color: #550f11">Transaction Infromation</h3>
            <div class="row gx-5">
                <div class="col-md-6">
                    <div class="information">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h5>Treatment : <span class="fw-bold fs-5" style="color: #f5cc4f;"><?= $data[$id]['nama'] ?></span> </h5>

                            </div>
                        </div>
                    </div>
                    <!-- <form action="invoice.php?id=<?= $data[$id]['id'] ?>" method="POST"> -->
                    <!-- <input type="hidden" name="id" value="<?= $data[$id]['id'] ?>">
                        <input type="hidden" name="harga" value="<?= $data[$id]['harga'] ?>"> -->
                    <div class="mb-3">
                        <label for="no-pembayaran" class="form-label">No. Transaction</label>
                        <input type="text" class="form-control" id="no-pembayaran" value="" name="no-pembayaran">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Transaction Date</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $date ?>">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $username ?>">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="warna" class="form-label">Treatment</label>
                            <input type="text" class="form-control" name="treatment" id="treatment" value="<?= $data[$id]['nama'] ?>">
                        </div>
                        <div class="mb-3 col-md-2">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" min="1" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="jumlah" class="form-label">Treatment Price</label>
                            <input type="text" name="price" id="price" class="form-control text-end" required readonly value="Rp.<?= number_format($data[$id]['harga'], 0)  ?>">
                            <input type="hidden" value="<?= $data[$id]['harga'] ?>" id="hiddenPrice">
                        </div>
                        <div class="mb-3 col-md-12">
                            <button class="btn btn-primary-custom" type="button" id="check-out" onclick="checkOut()">Check Out Now!</button>
                        </div>
                    </div>

                    <div class="info-price mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Total Price</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <h5 id="total-price">Rp. 0</h5>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="info-price">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Payment</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <input type="number" min="1" class="form-control mb-3" id="pembayaran" value="">
                            </div>
                            <div class="col-md-6">
                                <button type="button" id="btn-change" onclick="btnChange()" class="btn btn-primary-custom-sm mb-3">Change!</button>
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <h5>Change</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <h5 id="change">Rp. 0</h5>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <!-- <a href="invoice.php?id=<?= $data[$id]['id'] ?>" class="btn btn-primary custom mt-3">Order Now</a> -->
                            <button type="button" disabled id="btn-save" class="btn btn-primary-custom mt-3" data-bs-toggle="modal" data-bs-target="#transactionModal">Save Transaction</button>
                        </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <!-- <img src="resource/img/<?= $data[$id]['gambar'] ?>" alt="double-bad" class="img-fluid mb-2"> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Booking -->

    <!-- Modal -->
    <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Transaction Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">No. Transaction</label>
                            <input type="text" class="form-control" id="noTransactionModal" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Transaction Date</label>
                            <input type="text" class="form-control" value="<?= $date ?>" readonly>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="" class="form-label">Treatment</label>
                            <input type="text" class="form-control" value="<?= $data[$id]['nama'] ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Treatment Price</label>
                            <input type="text" class="form-control" value="Rp.<?= number_format($data[$id]['harga'], 0)  ?>" readonly>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" id="jumlahModal" value="" readonly>
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="" class="form-label">Total Price</label>
                            <input type="text" class="form-control" id="totalPriceModal" value="" readonly>
                        </div>
                        <hr>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Payment</label>
                            <input type="text" class="form-control" id="pembayaranModal" value="" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Change</label>
                            <input type="text" class="form-control" id="changeModal" value="" readonly>
                        </div>
                    </div>
                    <span class="text-success text-center fw-bold">Your transaction confirmed Success</span>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <a href="index.php" class="btn btn-success">Save Transaction</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
    include 'components/partials/footer.php';
    ?>
    <!-- End Footer -->

    <script src="resource/js/bootstrap.bundle.min.js"></script>

    <script>
        let price = <?= $data[$id]['harga'] ?>;
        let hiddenPrice = document.getElementById('hiddenPrice');
        let jumlah = document.getElementById('jumlah');
        let totalPrice = document.getElementById('total-price');

        let noTransaction = document.getElementById('no-pembayaran');
        let noTransactionModal = document.getElementById('noTransactionModal');
        let jumlahModal = document.getElementById('jumlahModal');
        let totalPriceModal = document.getElementById('totalPriceModal');
        let pembayaranModal = document.getElementById('pembayaranModal');
        let changeModal = document.getElementById('changeModal');

        // Fungsi untuk menampilkan total harga berdasarkan jumlah yang diinputkan dan ketika tombol check out ditekan
        function checkOut() {
            if (jumlah.value == null || jumlah.value == 0) {
                alert('Jumlah tidak boleh kurang dari 1');
                return;
            } else if (noTransaction.value == '') {
                alert('No. Transaction tidak boleh kosong');
                return;
            }

            let total = price * jumlah.value;
            totalPrice.innerHTML = `Rp. ` + total.toLocaleString('id-ID');
            console.log(hiddenPrice.value);
        }

        // Fungsi untuk menghitung kembalian
        let pembayaran = document.getElementById('pembayaran');
        let change = document.getElementById('change');

        // let totalPriceAngka = parseInt(totalPrice.innerHTML.replace('Rp. ', ''));
        // console.log(totalPriceAngka);

        function btnChange() {
            let total = price * jumlah.value;
            hiddenPrice.value = total;

            console.log('Pembayaran : ' + pembayaran.value + ' Total : ' + hiddenPrice.value);

            if (totalPrice.innerHTML == 'Rp. 0') {
                alert('Silahkan check out terlebih dahulu');
                return;
            } else if (pembayaran.value == '') {
                alert('Silahkan masukkan jumlah pembayaran');
                return;
            } else if (pembayaran.value < hiddenPrice.value) {
                alert('Pembayaran kurang');
                return;
            }

            let bayar = pembayaran.value;
            let kembalian = bayar - total;

            change.innerHTML = `Rp. ` + kembalian.toLocaleString('id-ID');
            document.getElementById('btn-save').disabled = false;

            noTransactionModal.value = noTransaction.value;
            jumlahModal.value = jumlah.value;
            totalPriceModal.value = totalPrice.innerHTML;
            pembayaranModal.value = pembayaran.value;
            changeModal.value = change.innerHTML;
        }
    </script>
</body>

</html>