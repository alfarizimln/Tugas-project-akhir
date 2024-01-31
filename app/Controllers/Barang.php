<?php

namespace App\Controllers;

use App\Models\ModelBarang;

class Barang extends BaseController
{
    public function index()
    {
        $model = new ModelBarang();
        $data['barang'] = $model->getBarang()->getResultArray();
        echo view('barang/v_barang', $data);
    }

    public function save()
    {
        $model = new ModelBarang();
        $data = array(
            'idbarang' => $this->request->getpost('id'),
            'namabarang' => $this->request->getpost('nama'),
            'satuan' => $this->request->getpost('satuan'),
            'stok' => $this->request->getpost('stok'),
            'hargabeli' => $this->request->getpost('beli'),
            'hargajual' => $this->request->getpost('jual'),
            
        );
        if(!$this->validate([
            'id' => [
                'rules' => 'required|is_unique[barang.idbarang]',
                'errors' => [
                    'required'=> '{field} Harus diisi',
                    'is_unique'=> '{field} Sudah Ada'
                ]
            ]
        ])) {
            session()->setFlashdata('error',$this->validator->listErrors());
            return redirect()->back()->withInput();
        }else{
            print_r($this->request->getVar());
        }
        $model->insertData($data);
        return redirect()->to('/barang');
    }
    public function delete()
    {
        $model = new ModelBarang();
        $id = $this->request->getPost('id');
        $model->deleteBarang($id);
        return redirect()->to('/barang/index');
    }
    public function update()
    {
        $model = new ModelBarang();
        $id=$this->request->getPost('id');
        $data = array(
            'namabarang' => $this->request->getpost('nama'),
            'satuan' => $this->request->getpost('satuan'),
            'stok' => $this->request->getpost('stok'),
            'hargabeli' => $this->request->getpost('beli'),
            'hargajual' => $this->request->getpost('jual'),
        );
        $model->updateBarang($data,$id);
        return redirect()->to('/barang/index');
    }
    public function laporanBarang()
    {
        $model = new ModelBarang();
        $data['data'] = $model->getLaporanBarang()->getResultArray();
        echo view('barang/cetak_laporan', $data);
    }
}