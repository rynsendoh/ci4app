<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style media="screen">
        .tes {
            width: 71px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">ci4</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <!-- <a class="nav-link active" aria-current="page" href="/">Home</a> -->
                    <a class="nav-link" href="/pages/salesman">Salesman</a>
                    <a class="nav-link" href="/pages/barang">Barang</a>
                    <a class="nav-link" href="/pages/customer">Customer</a>
                    <a class="nav-link" href="/pages/transaksi">Transaksi</a>
                    <!-- <a class="nav-link" href="<?= base_url('/pages/about'); ?>">About</a> -->
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">

                <h1>Customer</h1>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Customer
                </button><br><br>

                <?php if (session()->getFlashdata('create')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('create'); ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('delete')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('delete'); ?>
                    </div>
                <?php endif; ?>

                <table id="example" class="table table-hover table-striped table-bordered custom" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode Customer</th>
                            <th>Nama Customer</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($salesman as $key) : ?>
                            <tr>
                                <td><?= $key['kode_customer']; ?></td>
                                <td><?= $key['nama_customer']; ?></td>
                                <td><?= $key['alamat']; ?></td>
                                <td><?= $key['telepon']; ?></td>
                                <td><?= $key['longitude']; ?></td>
                                <td><?= $key['latitude']; ?></td>

                                <td>
                                    <a href="#" class="btn btn-warning btn-sm tes">Edit</a><br><br>
                                    <!-- <a class="btn btn-danger btn-sm cancel tes" cancel-id="{{$key->id}}">Delete</a> -->
                                    <form action="/pages/customer/<?= $key['id']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="/pages/customerCreate" method="POST">
                                    <?= csrf_field(); ?>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Customer</label>
                                        <input name="nama_customer" type="text" maxlength="30" required class="form-control" placeholder="Masukan Nama Customer">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat</label>
                                        <textarea name="alamat" class="form-control" rows="3" placeholder="Masukan Alamat"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Harga No.Telepon</label>
                                        <input name="telepon" id="telepon" type="text" maxlength="10" required class="form-control" placeholder="Masukan No.Telepon">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="exampleInputPassword1">longitude</label>
                                        <input name="longitude" type="text" maxlength="10" required class="form-control" placeholder="Masukan Longitude">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">latitude</label>
                                        <input name="latitude" type="text" maxlength="10" required class="form-control" placeholder="Masukan Latitude">
                                    </div> -->

                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button> -->
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

    <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollX": true
            });
        });
    </script>

    <script type="text/javascript">
        setInputFilter(document.getElementById("telepon"), function(value) {
            return /^\d*$/.test(value);
        });

        function setInputFilter(textbox, inputFilter) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                textbox.addEventListener(event, function() {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            });
        }
    </script>
</body>

</html>