<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelSupplier extends Model
{
    public function getSupplier()
    {
        $builder=$this->db->table('Supplier');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('Supplier')->insert($data);
    }
    public function deleteSupplier($id)
    {
        $query = $this->db->table('Supplier')->delete(array('idsupplier' => $id));
        return $query;
    }
    public function updateSupplier($data,$id)
    {
        $query = $this->db->table('Supplier')->update($data,array('idSupplier' => $id));
        return $query;
    }
    public function getLaporanSupplier()
    {
        $builder = $this->db->query('SELECT *from supplier');
        return $builder;
    }
}