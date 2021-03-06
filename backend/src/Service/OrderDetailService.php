<?php

namespace App\Service;

use App\AutoMapping;
use App\Entity\OrderDetailEntity;
use App\Manager\OrderDetailManager;
use App\Response\OrderCreateDetailResponse;
use App\Response\OrderDetailResponse;
use App\Request\OrderDetailUpdateByClientRequest;

class OrderDetailService
{
    private $autoMapping;
    private $orderDetailManager;

    public function __construct(AutoMapping $autoMapping, OrderDetailManager $orderDetailManager)
    {
        $this->autoMapping = $autoMapping;
        $this->orderDetailManager = $orderDetailManager;
    }

    public function createOrderDetail($orderID, $productID, $countProduct, $orderNumber)
    {
       
        $item['orderID'] = $orderID;
        $item['orderNumber'] = $orderNumber;
        $item['productID'] = $productID;
        $item['countProduct'] = $countProduct;
        
        $result = $this->orderDetailManager->createOrderDetail($item);

        return $this->autoMapping->map(OrderDetailEntity::class, OrderCreateDetailResponse::class, $result);
    }
    
    public function getLastOrderNumber()
    {
       return $this->orderDetailManager->getLastOrderNumber();
    }

    public function getOrderIdByOrderNumber($orderNumber)
    {
        $response = [];
        $items = $this->orderDetailManager->getOrderIdByOrderNumber($orderNumber);
        foreach ($items as $item) {
            $response[] = $this->autoMapping->map('array', OrderDetailResponse::class, $item);
        }
       return $response;
    }

    public function orderDetailDelete($id)
    {
        return $this->orderDetailManager->orderDetailDelete($id);
    }
}
