<?php

require_once './controllers/BaseController.php';

class AdminController extends BaseController {
    public function loginAdmin() {
        try {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM users WHERE email = ? AND password = ? AND is_admin = 1";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            $admin = $result->fetch_assoc();

            if ($admin) {
                $this->success([
                    "admin_id" => $admin["id"]
                ]);
            } else {
                $this->error("Invalid admin credentials");
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}