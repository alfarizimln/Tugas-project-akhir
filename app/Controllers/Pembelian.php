<?php

namespace App\Controllers;

use App\Models\ModelPembelian;

class Pembelian extends BaseController
{
    public function index()
    {
        $model = new ModelPembelian();
        $data['pembelian'] = $model->getPembelian()->getResultArray();
        $data['data_supplier'] = $model->getSupplier()->getResult();
        $data['data_barang'] = $model->getBarang()->getResult();
        echo view('pembelian/v_pembelian', $data);
    }

    public function save()
    {
        $model = new ModelPembelian();
        $data = array(
            'idsupplierbeli' => $this->request->getpost('iddonatur'),
            'idbarangbeli' => $this->request->getpost('iddonatur1'),
            'tanggal' =>$this->request->getpost('tgl'),
            'jumlah' => $this->request->getpost('jml'),
        );
        $model->insertData($data);
        return redirect()->to('/pembelian');
    }
    public function delete()
    {
        $model = new ModelPembelian();
        $id = $this->request->getPost('id');
        $model->deletePembelian($id);
        return redirect()->to('/pembelian/index');
    }
    public function update()
    {
        $model = new ModelPembelian();
        $id = $this->request->getPost('id');
        $data = array(
            'idsupplierbeli' => $this->request->getpost('iddonatur2'),
            'idbarangbeli' => $this->request->getpost('iddonatur3'),
            'tanggal' =>$this->request->getpost('tgl'),
            'jumlah' => $this->request->getpost('jml'),
        );
        $model->updatepembelian($data, $id);
        return redirect()->to('/pembelian/index');
    }
    public function laporanPembelian()
    {
        $model = new ModelPembelian();
        $data['data'] = $model->getLaporanPembelian()->getResultArray();
        echo view('pembelian/cetak_laporan', $data);
    }
    public function laporanperperiode()
    {
        echo view('pembelian/vlaporanpembelian');
    }
    public function cetaklaporanperperiode()
    {
        $model = new ModelPembelian();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query =$model->getLaporanperpiode($tgla,$tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('pembelian/vcetaklaporanperperiode',$data);
    }
    public function laporanperperiodeperjeniskas()
    {
        echo view('pembelian/vlaporanperjeniskas');
    }
    public function cetaklaporanperperiodeperjenis()
    {
        $model = new ModelPembelian();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $jenis= $this->request->getPost('jeniskas');
        $query =$model->getLaporanperpiodeperjenis($tgla,$tglb,$jenis)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'jenis' => $jenis,
            'data' => $query
        ];
        echo view('Pembelian/vlaporanperperiodeperjeniskas',$data);
    }
}