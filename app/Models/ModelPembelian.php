<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelPembelian extends Model
{
    public function getPembelian()
    {
        $builder=$this->db->query('SELECT idbeli,idsupplierbeli,namasupplier,idbarangbeli,namabarang,tanggal,jumlah,jumlah*hargabeli AS total FROM beli 
        JOIN supplier ON idsupplierbeli=idsupplier JOIN barang
        ON idbarang=idbarangbeli;');
        return $builder;
    }
    public function getSupplier()
    {
        $builder=$this->db->table('supplier');
        return $builder->get();
    }
    public function getBarang()
    {
        $builder=$this->db->table('barang');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('beli')->insert($data);
    }
    public function deletePembelian($id)
    {
        $query = $this->db->table('beli')->delete(array('idbeli' => $id));
        return $query;
    }
    public function updatepembelian($data,$id)
    {
        $query = $this->db->table('beli')->update($data,array('idbeli' => $id));
        return $query;
    }
    public function getLaporanPembelian()
    {
        $builder = $this->db->query('SELECT idbeli,idsupplierbeli,namasupplier,idbarangbeli,namabarang,tanggal,jumlah,jumlah*hargabeli AS total FROM beli JOIN supplier ON idsupplierbeli=idsupplier JOIN barang ON idbarangbeli=idbarang');
        return $builder;
    }
    public function getLaporanperpiode($tgla,$tglb)
    {
        $b = $this->db->query("SELECT idbeli,idsupplierbeli,namasupplier,idbarangbeli,namabarang,tanggal,jumlah,jumlah*hargabeli AS total FROM beli JOIN supplier ON idsupplierbeli=idsupplier JOIN barang ON idbarangbeli=idbarang where tanggal >= '$tgla' and tanggal <= '$tglb' ");
        return $b;
    }
}