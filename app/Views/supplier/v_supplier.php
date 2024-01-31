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
                            <h4 class="mt-e header-title">DATA SUPPLIER</h4>
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
                                                <th>ID</th>
                                                <th>Nama Supplier</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($supplier as $val) {
                                                $no++; ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $val['idsupplier'] ?></td>
                                                <td><?= $val['namasupplier'] ?></td>
                                                <td><?= $val['alamat'] ?></td>
                                                <td><?= $val['telepon'] ?></td>
                                                <td>
                                                <button type="button"
                                                        class="btn btn-info btn-sm btn-edit" data-id_pengurus ="<?= $val['idsupplier']; ?>" data-nama="<?= $val['namasupplier']; ?>" 
                                                        data-alamat="<?= $val['alamat']; ?>" data-nohp="<?= $val['telepon']; ?>">
                                                        <i class=" fa fa-tags"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-id_pengurus="<?= $val['idsupplier']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
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
<form action="/Supplier/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Supplier</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button> 
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
<form action="/Supplier/update" method="post">
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button> 
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="form-control id" name="id">
                    </div>
                    <div class="col-md-12">
                        <label><b>Nama Supplier</b></label>
                        <input type="text" class="form-control namapengurus" name="nama">
                    </div>
                    <div class="col-md-12">
                        <label><b>Alamat</b></label>
                        <input type="text" class="form-control alamat" name="al">
                    </div>
                    <div class="col-md-12">
                        <label><b>Telepon</b></label>
                        <input type="text" class="form-control nohp" name="no">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Tambah -->
<form action="/Supplier/save" method="post">
<?php if(!empty(session()->getFlashdata('error'))):?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4>Periksa Entrian Form</h4>
    </hr />
    <?php echo session()->getFlashdata('error');?>
        <button type="button" id="addmodal" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
<?php endif; ?>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button> 
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="form-control" name="kode">
                    </div>
                    <div class="col-md-12">
                        <label><b>Nama Supplier</b></label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="col-md-12">
                        <label><b>Alamat</b></label>
                        <input type="text" class="form-control" name="al">
                    </div>
                    <div class="col-md-12">
                        <label><b>Telepon</b></label>
                        <input type="text" class="form-control" name="no">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
//script delete
$('.btn-delete').on('click', function() {
    const id = $(this).data('id_pengurus');
    $('.id').val(id);
    $('#deleteModal').modal('show');
});
//script datatable
$(document).ready(function() {
    $('#datapengurus').DataTable();
});
$('.btn-edit').on('click', function() {
    const id = $(this).data('id_pengurus');
        const namapengurus = $(this).data('nama');
        const alamat = $(this).data('alamat');
        const nohp = $(this).data('nohp');

        $('.id').val(id);
        $('.namapengurus').val(namapengurus);
        $('.alamat').val(alamat);
        $('.nohp').val(nohp).trigger('change');
        $('#updateModal').modal('show');
});
</script>
<?= $this->endSection('') ?>