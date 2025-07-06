<?php

require_once './models/Booking.php';
require_once './services/BookingService.php';
require_once './controllers/BaseController.php';

class BookingController extends BaseController {
    public function createBooking() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);
            $data['showtime_id'] = $data['showtime_id'] ?? 0;
            $data['seat_number'] = $data['seat_number'] ?? "";

            $booking = new Booking([
                "user_id" => $data["user_id"],
                "showtime_id" => $data["showtime_id"],
                "seat_number" => $data["seat_number"],
                "status" => $data["status"] ?? "confirmed"
            ]);

            $success = $booking->save($this->mysqli);
            $this->success(["saved" => $success]);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function getUserBookings() {
        try {
            $userId = $_GET['user_id'] ?? 0;

            $sql = "SELECT * FROM bookings WHERE user_id = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            $bookings = [];
            while ($row = $result->fetch_assoc()) {
                $bookings[] = new Booking($row);
            }

            $this->success(BookingService::bookingsToArray($bookings));
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}