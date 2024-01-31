<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>

<?= $this->section('isi') ?>

<head>
    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>
<div class="col-sm-12">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <ul class="list-inline float-left mb-0">
                            <h4 class="mt-e header-title">DATA PEMBELIAN</h4>
                        </ul>
                        <ul class="list-inline float-right mb-0">
                            <!-- Jam -->
                            <h6>
                                <?php
                                date_default_timezone_set("Asia/Bangkok");
                                ?>

                                <script type="text/javascript">
                                    function date_time(id) {
                                        date = new Date;
                                        year = date.getFullYear();
                                        month = date.getMonth();
                                        months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                        d = date.getDate();
                                        day = date.getDay();
                                        days = new Array('Minggu', 'Senen', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
                                        h = date.getHours();
                                        if (h < 10) {
                                            h = "0" + h;
                                        }
                                        m = date.getMinutes();
                                        if (m < 10) {
                                            m = "0" + m;
                                        }
                                        s = date.getSeconds();
                                        if (s < 10) {
                                            s = "0" + s;
                                        }
                                        result = '' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + ' ' + h + ':' + m + ':' + s;
                                        document.getElementById(id).innerHTML = result;
                                        setTimeout('date_time("' + id + '");', '1000');
                                        return true;
                                    }
                                </script>

                                <span id="date_time"></span>
                                <script type="text/javascript">
                                    window.onload = date_time('date_time');
                                </script>
                                <!-- Batas jam -->
                            </h6>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-success" data-target="#addModal"
                                data-toggle="modal"><i class="ti-save"> Tambah</i></button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-striped " id="datapengurus">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Nama Supplier</th>
                                                <th>Nama Barang</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah Beli</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total = 0; ?>
                                            <?php $no = 0;
                                            foreach ($pembelian as $val) {
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td>
                                                        <?= $no; ?>
                                                    </td>
                                                    <td>
                                                        <?= $val['namasupplier'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $val['namabarang'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $val['tanggal'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $val['jumlah'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $val['total'] ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm btn-edit"
                                                            data-id_beli="<?= $val['idbeli']; ?>"
                                                            data-id_supplier="<?= $val['idsupplierbeli']; ?>"
                                                            data-id_barang="<?= $val['idbarangbeli']; ?>"
                                                            data-tanggal="<?= $val['tanggal']; ?>"
                                                            data-jumlah="<?= $val['jumlah']; ?>"
                                                            data-total="<?= $val['total']; ?>">
                                                            <i class=" fa fa-tags"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                            data-id_kas="<?= $val['idbeli']; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                    <input type="hidden" <?= $total += $val['total']; ?>></input>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tr>
                                            <th colspan="6z"><b>Total Pembelian</b></th>
                                            <th colspan="4"><b>
                                                    <?= $total ?>
                                                </b></th>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<form action="/Pembelian/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pembelian</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <h5>Apakah Yakin Menghapus Data Ini? </h5>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Edit -->
<form action="/Pembelian/update" method="post">
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID Pembelian</label>
                        <input type="text" class="form-control id" name="id">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 mr-3">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_donatur2"
                                        class="btn btn-xs btn-primary">Supplier</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="iddonatur2" readonly id="iddonatur"
                                        class="form-control idsupplier">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 mr-3">
                                <div class="form-group">
                                    <label>Barang</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_donatur3"
                                        class="btn btn-xs btn-primary">Barang</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="iddonatur3" readonly id="iddonatur"
                                        class="form-control idbrg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label><b>Tanggal</b></label>
                        <input type="date" class="form-control tgl" name="tgl">
                    </div>
                    <div class="col-md-12">
                        <label><b>Jumlah</b></label>
                        <input type="number" class="form-control jml" name="jml">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Supplier -->
    <div class="modal fade" id="modal_donatur2">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_supplier as $d):
                                $no++; ?>
                                <tr>
                                    <td>
                                        <?php echo $no; ?>
                                    </td>
                                    <td>
                                        <?= $d->idsupplier ?>
                                    </td>
                                    <td>
                                        <?= $d->namasupplier ?>
                                    </td>
                                    <td>
                                        <?= $d->alamat ?>
                                    </td>
                                    <td>
                                        <?= $d->telepon ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_donatur2('<?= $d->idsupplier ?>','<?= $d->namasupplier ?>')">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Tambah -->
<form action="/pembelian/save" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 mr-3">
                                <div class="col-md-12">

                                    <input type="hidden" class="form-control" name="id">
                                </div>
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_donatur"
                                        class="btn btn-xs btn-primary">Supplier</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="iddonatur" readonly id="id" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" readonly id="nama" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 mr-3">
                                <div class="form-group">
                                    <label>Barang</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_donatur1"
                                        class="btn btn-xs btn-primary">Barang</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="iddonatur1" readonly id="iddonatur1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" readonly id="nama1" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label><b>Tanggal</b></label>
                        <input type="date" class="form-control" name="tgl">
                    </div>
                    <div class="col-md-12">
                        <label><b>Jumlah</b></label>
                        <input type="number" class="form-control" name="jml">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Supplier -->
    <div class="modal fade" id="modal_donatur">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_supplier as $d):
                                $no++; ?>
                                <tr>
                                    <td>
                                        <?php echo $no; ?>
                                    </td>
                                    <td>
                                        <?= $d->idsupplier ?>
                                    </td>
                                    <td>
                                        <?= $d->namasupplier ?>
                                    </td>
                                    <td>
                                        <?= $d->alamat ?>
                                    </td>
                                    <td>
                                        <?= $d->telepon ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_donatur('<?= $d->idsupplier ?>','<?= $d->namasupplier ?>')">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Barang -->
    <div class="modal fade" id="modal_donatur1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_barang as $d):
                                $no++; ?>
                                <tr>
                                    <td>
                                        <?php echo $no; ?>
                                    </td>
                                    <td>
                                        <?= $d->idbarang ?>
                                    </td>
                                    <td>
                                        <?= $d->namabarang ?>
                                    </td>
                                    <td>
                                        <?= $d->satuan ?>
                                    </td>
                                    <td>
                                        <?= $d->stok ?>
                                    </td>
                                    <td>
                                        <?= $d->hargabeli ?>
                                    </td>
                                    <td>
                                        <?= $d->hargajual ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_donatur1('<?= $d->idbarang ?>','<?= $d->namabarang ?>')">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    //script delete
    $('.btn-delete').on('click', function () {
        const id = $(this).data('id_kas');
        $('.id').val(id);
        $('#deleteModal').modal('show');
    });
    //script datatable
    $(document).ready(function () {
        $('#datapengurus').DataTable();
    });

    $('.btn-edit').on('click', function () {
        const id = $(this).data('id_beli');
        const idsup = $(this).data('id_supplier');
        const idbrg = $(this).data('id_barang');
        const tanggal = $(this).data('tanggal');
        const jumlah = $(this).data('jumlah');
        const total = $(this).data('total');


        $('.id').val(id);
        $('.idsupplier').val(idsup);
        $('.idbrg').val(idbrg);
        $('.tgl').val(tanggal);
        $('.jml').val(jumlah).trigger('change');
        $('.total').val(total);
        $('#updateModal').modal('show');
    });

    //script donatur
    function pilih_donatur(id, nama) {

        $('#id').val(id);
        $('#nama').val(nama);
        $('#modal_donatur').modal().hide();
    }
    function pilih_donatur1(id, nama) {

        $('#iddonatur1').val(id);
        $('#nama1').val(nama);
        $('#modal_donatur1').modal().hide();
    }
    function pilih_donatur2(id, nama) {

        $('#iddonatur2').val(id);
        $('#nama2').val(nama);
        $('#modal_donatur2').modal().hide();
    }
    function pilih_donatur3(id, nama) {

        $('#iddonatur3').val(id);
        $('#nama3').val(nama);
        $('#modal_donatur3').modal().hide();
    }
</script>
<?= $this->endSection('') ?>