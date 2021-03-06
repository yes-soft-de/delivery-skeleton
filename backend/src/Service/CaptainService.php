<?php

namespace App\Service;

use App\AutoMapping;
use App\Manager\OrderManager;
use App\Response\OrderResponse;
use App\Service\OrderLogService;

class CaptainService
{
    private $autoMapping;
    private $orderManager;
    private $orderlogService;

    public function __construct(AutoMapping $autoMapping, OrderManager $orderManager, OrderLogService $orderlogService)
    {
        $this->autoMapping = $autoMapping;
        $this->orderManager = $orderManager;
        $this->orderlogService = $orderlogService;
    }

    public function countCaptainOrdersDelivered($captainId)
    {
        return $this->orderManager->countCaptainOrdersDelivered($captainId);
    }

    public function countOrdersInMonthForCaptain($fromDate, $toDate, $captainId)
    {
        return $this->orderManager->countOrdersInMonthForCaptain($fromDate, $toDate, $captainId);
    }

    public function getAcceptedOrderByCaptainIdInMonth($fromDate, $toDate, $captainId)
    {
        return $this->orderManager->getAcceptedOrderByCaptainIdInMonth($fromDate, $toDate, $captainId);
    }

    public function countCaptainOrdersInDay($captainID, $fromDate, $toDate)
    {
        return $this->orderManager->countCaptainOrdersInDay($captainID, $fromDate, $toDate);
    }
}
