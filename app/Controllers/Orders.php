<?php namespace App\Controllers;
use App\Models\OrdersModel;
use CodeIgniter\Controller;

class Orders extends Controller
{
    public function index()
    {
        $model = new OrdersModel();
        $orders = $model->getOrders();
        echo view('orders/index', ['orders'=> $orders]);
    }

    public function store()
    {
        $model = new OrdersModel();
        $last_id = $model->addOrder([
            'date_ordered' => '2020-04-'.mt_rand(1,30)
        ]);
        $order = $model->find($last_id);
        echo json_encode($order);
    }
}
