<?php

require_once './models/SnackOrder.php';
require_once './services/SnackOrderService.php';
require_once './controllers/BaseController.php';

class SnackOrderController extends BaseController {
    public function addSnackOrder() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            $order = new SnackOrder([
                "user_id" => $data["user_id"],
                "snack_name" => $data["snack_name"],
                "quantity" => $data["quantity"],
                "price" => $data["price"]
            ]);

            $success = $order->save($this->mysqli);
            $this->success(["saved" => $success]);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function getUserOrders() {
        try {
            $userId = $_GET['user_id'] ?? 0;

            $sql = "SELECT * FROM snack_orders WHERE user_id = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            $orders = [];
            while ($row = $result->fetch_assoc()) {
                $orders[] = new SnackOrder($row);
            }

            $this->success(SnackOrderService::ordersToArray($orders));
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}