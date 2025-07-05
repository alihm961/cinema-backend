<?php

require_once './models/User.php';
require_once './services/UserService.php';
require_once './controllers/BaseController.php';

class UserController extends BaseController {
    public function registerUser() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            $user = new User([
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => $data["password"],
                "phone" => $data["phone"],
                "is_adult" => $data["is_adult"],
                "is_admin" => 0
            ]);

            $success = $user->save($this->mysqli);
            $this->success(["registered" => $success]);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function loginUser() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);
            $email = $data["email"];
            $password = $data["password"];

            $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user) {
                $this->success([
                    "user_id" => $user["id"],
                    "is_admin" => $user["is_admin"]
                ]);
            } else {
                $this->error("Invalid credentials");
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}