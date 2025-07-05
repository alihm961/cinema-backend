<?php
require_once("Model.php");

class Discount extends Model {
    protected static string $table = "bookings";

    public static function apply($mysqli, $bookingId, $discountPercent): bool {
        $status = "discount_" . $discountPercent;
        $stmt = $mysqli->prepare("UPDATE bookings SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $bookingId);
        return $stmt->execute();
    }
}