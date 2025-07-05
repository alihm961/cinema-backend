<?php
require_once("User.php");
require_once("Booking.php");

class CinemaNight {
    public static function run($mysqli, $adminId) {
        if (!$adminId) {
            throw new Exception("Admin ID is required", 403);
        }

        $users = User::all($mysqli);
        foreach ($users as $u) {
            if (!$u->is_adult) continue;

            $booking = new Booking([
                "user_id" => $u->id,
                "showtime_id" => 1, // hardcoded or configurable
                "seat_number" => "AUTO-" . rand(1, 100),
                "status" => "auto"
            ]);
            $booking->save($mysqli);
        }

        return true;
    }
}