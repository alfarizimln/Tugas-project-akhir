<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-outline">
        <div class="invoice col-sm-12 p-3 mb-3">
            <!-title row->
                <div id="div1">
                    <div class="row">
                        <div class="col-12">
                            <table>
                                <tr>
                                    <td width=250>
                                        <img src="<?= base_url() ?>/gambar/logo1.jpg" width="200" alt="">
                                    </td>
                                    <td width=580>
                                        <center>
                                            <p>
                                            <h4> MINIMARKET AlPACINO </h4>
                                            </p>
                                            <p>
                                            <h6>Lubuk Buaya, Koto Tangah, Padang
                                            </h6>
                                            </p>
                                        </center>
                                    </td>
                                    <td width=200></td>
                                </tr>
                            </table>
                                <br><br><br>    
                                <b>Tanggal Penjualan : <?= date('d F Y',strtotime($tgla)) ?> S/D 
                                <?= date('d F Y',strtotime($tglb)) ?>
                                </b>
                            
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered table-striped">
                            <thead>
                                <tr role=" row">
                                    <th>No</th> 
                                    <th>Id Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php $no = 0;

                                    $semua = 0;
                                    foreach ($data as $val) {
                                        $s = $val['total'];
                                        $semua = $s + $semua;
                                        $no++; ?>
                                        <tr role="row" class="odd">
                                            <td><?= $no; ?></td>
                                            <td><?= $val['idbarangjual'] ?></td>
                                            <td><?= $val['namabarang'] ?></td>
                                            <td><?= $val['tanggal'] ?></td>
                                            <td><?= $val['jumlahjual'] ?></td>
                                            <td><?= $val['total'] ?></td>
                                        </tr>

                                    <?php } ?>
                                    <tr>
                                        <td colspan="5"><b>Total Penjualan</b></td>
                                        <td colspan="2"><b><?= $semua ?></b></td>
                                    </tr>

                                </tbody>

                            </table>
                            <br><br><br><br>
                            Padang, <?= date('d / M / y') ?>
                            <br><br><br><br><br>
                            Pimpinan <br>
                            Muhammad Alfariz Maulana
                        </div>
                    </div>
                </div><br>
                <div class="row no-print">
                    <div class="col-12">
                        <button onclick="printContent('div1')" class="btn btn-primary"><i class="fa fa-print"></i>
                            Print</button>
                    </div>
                </div>
        </div>
    </div>

</div>

<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
<?= $this->endSection('') ?>


