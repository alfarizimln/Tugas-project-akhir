<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelBarang extends Model
{
    public function getBarang()
    {
        $builder=$this->db->table('barang');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('barang')->insert($data);
    }
    public function deleteBarang($id)
    {
        $query = $this->db->table('barang')->delete(array('idbarang' => $id));
        return $query;
    }
    public function updateBarang($data,$id)
    {
        $query = $this->db->table('barang')->update($data,array('idbarang' => $id));
        return $query;
    }
    public function getLaporanBarang()
    {
        $builder = $this->db->query('SELECT *from barang');
        return $builder;
    }
}