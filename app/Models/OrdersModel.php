<?php namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $allowedFields = ['date_ordered'];

    public function getOrders()
    {
        return $this->findAll();
    }

    public function addOrder($data)
    {
        $this->db->table('orders')->insert($data);
        $insert_id = $this->db->mysqli->insert_id;
        return  $insert_id;
    }
}
