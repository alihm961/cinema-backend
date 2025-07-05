<?php
require_once("./controllers/BaseController.php");
require_once("./services/CinemaNightService.php");
require_once("./models/CinemaNight.php");

class CinemaNightController extends BaseController {
    public function triggerCinemaNight() {
        try {
            $input = json_decode(file_get_contents("php://input"), true);
            $adminId = $input["admin_id"] ?? "";

            $service = new CinemaNightService($this->mysqli);
            $service->trigger($adminId);

            $this->success(["message" => "Cinema night booked"]);
        } catch (Exception $e) {
            $this->error($e->getMessage(), $e->getCode());
        }
    }
}