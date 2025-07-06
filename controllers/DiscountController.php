<?php
require_once("./controllers/BaseController.php");
require_once("./services/DiscountService.php");
require_once("./models/Discount.php");

class DiscountController extends BaseController {
    public function applyDiscount() {
        try {
            $input = json_decode(file_get_contents("php://input"), true);
            $discount = $input["discount_percent"];
            $bookingId = $input["booking_id"];

            $service = new DiscountService($this->mysqli);
            $success = $service->applyDiscount($bookingId, $discount);

            if ($success) {
                $this->success(["message" => "Discount applied"]);
            } else {
                $this->error("Failed to apply discount");
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}