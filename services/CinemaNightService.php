<?php

class CinemaNightService {
    public static function trigger($adminId, $mysqli) {
        $stmt = $mysqli->prepare("INSERT INTO cinema_night_logs (admin_id, triggered_at) VALUES (?, NOW())");
        $stmt->bind_param("i", $adminId);
        return $stmt->execute();
    }
}