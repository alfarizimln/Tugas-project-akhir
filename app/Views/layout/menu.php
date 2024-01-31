<?= $this->extend('layout/main') ?>
<?= $this->section('menu') ?>

<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            
            <a href="<?= site_url('layout') ?>" class="logo"><img src="<?= base_url() ?>/assets/images/logo.jpg" height="200" alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-inner slimscrollleft">
       
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title"><h4>Hello <?= $u = (session()->get('username')); ?></h4></li>
                <?php if (session()->get('level') == 1  ) { ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-address-book-o"></i> <span>
                                Data Master </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="<?= site_url('user') ?>">User</a></li>
                            <li><a href="<?= site_url('supplier') ?>">Supplier</a></li>
                            <li><a href="<?= site_url('barang') ?>">Barang</a></li>
                        </ul>
                    </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-handshake-o "></i> <span>Data Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                <li><a href="<?= site_url('pembelian') ?>">Pembelian</a></li>    
                                <li><a href="<?= site_url('penjualan') ?>">Penjualan</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-open-variant"></i> <span>Laporan</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                <li><a href="<?= site_url('barang/laporanBarang') ?>">Laporan Barang</a></li>
                                <li><a href="<?= site_url('supplier/laporanSupplier') ?>">Laporan Supplier</a></li>
                                <li><a href="<?= site_url('pembelian/laporanPembelian') ?>">Laporan Pembelian</a></li>
                                <li><a href="<?= site_url('pembelian/laporanperperiode') ?>">Laporan Pembelian Perperiode</a></li>
                                    <li><a href="<?= site_url('penjualan/laporanpenjualan') ?>">Laporan Penjualan</a></li>
                                    <li><a href="<?= site_url('penjualan/laporanperperiode') ?>">Laporan Penjualan Perperiode</a></li>
                                </ul>
                            </li>
                <?php } ?>

                <?php if (session()->get('level') == 2) { ?>
                    <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-open "></i> <span>Data Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                <li><a href="<?= site_url('penjualan') ?>">Penjualan</a></li>
                                </ul>
                    </li>
                <?php } ?>

                <?php if (session()->get('level') == 3) { ?>
                    <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-open "></i> <span>Data Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                <li><a href="<?= site_url('pembelian') ?>">Pembelian</a></li>    
                                </ul>
                            </li>
                <?php } ?>
                <?php if (session()->get('level') == 4) { ?>
                    <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-open-variant"></i> <span>Laporan</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                <li><a href="<?= site_url('barang/laporanBarang') ?>">Laporan Barang</a></li>
                                <li><a href="<?= site_url('supplier/laporanSupplier') ?>">Laporan Supplier</a></li>
                                <li><a href="<?= site_url('pembelian/laporanPembelian') ?>">Laporan Pembelian</a></li>
                                <li><a href="<?= site_url('pembelian/laporanperperiode') ?>">Laporan Pembelian Perperiode</a></li>
                                    <li><a href="<?= site_url('penjualan/laporanpenjualan') ?>">Laporan Penjualan</a></li>
                                    <li><a href="<?= site_url('penjualan/laporanperperiode') ?>">Laporan Penjualan Perperiode</a></li>
                                </ul>
                            </li>
                <?php } ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->


<?= $this->endSection('') ?>