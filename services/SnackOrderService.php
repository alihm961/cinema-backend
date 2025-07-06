<?php

class SnackOrderService {
    public static function ordersToArray($orders_db) {
        $results = [];

        foreach ($orders_db as $order) {
            $results[] = $order->toArray();
        }

        return $results;
    }
}