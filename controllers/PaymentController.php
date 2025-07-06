<?php
require_once("./controllers/BaseController.php");
require_once("./models/Payment.php");
require_once("./services/PaymentService.php");

class PaymentController extends BaseController {
    public function createPayment() {
        try {
            $input = json_decode(file_get_contents("php://input"), true);

            if (!empty($input["payers"]) && is_array($input["payers"])) {
                foreach ($input["payers"] as $userId) {
                    $payment = new Payment([
                        "booking_id" => $input["booking_id"],
                        "user_id" => $userId,
                        "amount" => $input["total_amount"] / count($input["payers"]),
                        "status" => "pending"
                    ]);
                    $payment->save($this->mysqli);
                }
                $this->success(["message" => "Payments created"]);
            } else {
                $this->error("No payers provided.");
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}