<?php

namespace App\Controllers;

use App\Models\ModelPenjualan;

class Penjualan extends BaseController
{
    public function index()
    {
        $model = new ModelPenjualan();
        $data['penjualan'] = $model->getPenjualan()->getResultArray();
        $data['data_barang'] = $model->getBarang()->getResult();
        echo view('penjualan/v_penjualan', $data);
    }

    public function save() 
    {
        $model = new ModelPenjualan();
        $data = array(
            'idbarangjual' => $this->request->getpost('iddonatur'),
            'tanggal' =>$this->request->getpost('tgl'),
            'jumlahjual' => $this->request->getpost('jml'),
        );
        $model->insertData($data);
        return redirect()->to('/penjualan');
    }
    public function delete()
    {
        $model = new ModelPenjualan();
        $id = $this->request->getPost('id');
        $model->deletePenjualan($id);
        return redirect()->to('/penjualan/index');
    }
    public function update()
    {
        $model = new ModelPenjualan();
        $id = $this->request->getPost('id');
        $data = array(
            'idbarangjual' => $this->request->getpost('iddonatur1'),
            'tanggal' =>$this->request->getpost('tgl'),
            'jumlahjual' => $this->request->getpost('jml'),
        );
        $model->updatePenjualan($data, $id);
        return redirect()->to('/penjualan/index');
    }
    public function laporanPenjualan()
    {
        $model = new ModelPenjualan();
        $data['data'] = $model->getLaporanPenjualan()->getResultArray();
        echo view('penjualan/cetak_laporan', $data);
    }
    public function laporanperperiode()
    {
        echo view('penjualan/vlaporanpenjualan');
    }
    public function cetaklaporanperperiode()
    {
        $model = new ModelPenjualan();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query =$model->getLaporanperpiode($tgla,$tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('penjualan/vcetaklaporanperperiode',$data);
    }
    public function laporanperperiodeperjeniskas()
    {
        echo view('penjualan/vlaporanperjeniskas');
    }
    public function cetaklaporanperperiodeperjenis()
    {
        $model = new ModelPenjualan();
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
        echo view('penjualan/vlaporanperperiodeperjeniskas',$data);
    }
}