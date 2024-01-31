<?php

namespace App\Controllers;

use App\Models\ModelSupplier;

class Supplier extends BaseController
{
    public function index()
    {
        $model = new ModelSupplier();
        $data['supplier'] = $model->getSupplier()->getResultArray();
        echo view('supplier/v_supplier', $data);
    }

    public function save()
    {
        $model = new ModelSupplier();
        $data = array(
            'idsupplier' => $this->request->getpost('kode'),
            'namasupplier' => $this->request->getpost('nama'),
            'alamat' => $this->request->getpost('al'),
            'telepon' => $this->request->getpost('no'),
        );
        if(!$this->validate([
            'kode' => [
                'rules' => 'required|is_unique[supplier.idsupplier]',
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
        return redirect()->to('/supplier');
    }
    public function delete()
    {
        $model = new ModelSupplier();
        $id = $this->request->getPost('id');
        $model->deleteSupplier($id);
        return redirect()->to('/Supplier/index');
    }
    public function update()
    {
        $model = new ModelSupplier();
        $id=$this->request->getPost('id');
        $data = array(
            'namasupplier' => $this->request->getpost('nama'),
            'alamat' => $this->request->getpost('al'),
            'telepon' => $this->request->getpost('no'),
        );
        $model->updateSupplier($data,$id);
        return redirect()->to('/Supplier/index');
    }
    public function laporanSupplier()
    {
        $model = new ModelSupplier();
        $data['data'] = $model->getLaporanSupplier()->getResultArray();
        echo view('supplier/cetak_laporan', $data);
    }
}