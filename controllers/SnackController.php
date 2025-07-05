<?php

require_once './models/Snack.php';
require_once './services/SnackService.php';
require_once './controllers/BaseController.php';

class SnackController extends BaseController {
    public function getAllSnacks() {
        try {
            $snacks = Snack::all($this->mysqli);
            $this->success(SnackService::snacksToArray($snacks));
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function addSnack() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            $snack = new Snack([
                "id" => null,
                "name" => $data["name"],
                "price" => $data["price"],
                "image" => $data["image"]
            ]);

            $success = $snack->save($this->mysqli);
            $this->success(["saved" => $success]);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}