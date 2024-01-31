<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelPenjualan extends Model
{ 
    public function getPenjualan()
    {
        $builder=$this->db->query('SELECT idjual,idbarangjual,namabarang,tanggal,jumlahjual,jumlahjual*hargajual AS total FROM jual JOIN barang ON idbarangjual=idbarang');
        return $builder;
    }
    public function getBarang()
    {
        $builder=$this->db->table('barang');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('jual')->insert($data);
    }
    public function deletePenjualan($id)
    {
        $query = $this->db->table('jual')->delete(array('idjual' => $id));
        return $query;
    }
    public function updatePenjualan($data,$id)
    {
        $query = $this->db->table('jual')->update($data,array('idjual' => $id));
        return $query;
    }
    public function getLaporanPenjualan()
    {
        $builder = $this->db->query('SELECT idjual,idbarangjual,namabarang,tanggal,jumlahjual,jumlahjual*hargajual AS total FROM jual JOIN barang ON idbarangjual=idbarang');
        return $builder;
    }
    public function getLaporanperpiode($tgla,$tglb)
    {
        $b = $this->db->query("SELECT idjual,idbarangjual,namabarang,tanggal,jumlahjual,jumlahjual*hargajual AS total FROM jual JOIN barang ON idbarangjual=idbarang where tanggal >= '$tgla' and tanggal <= '$tglb'");
        return $b;
    }
}