<?php
require_once './controllers/BaseController.php';
require_once './models/Showtime.php';
require_once './services/ShowtimeService.php';

class ShowtimeController extends BaseController {
    public function addShowtime() {
        try {
            $input = json_decode(file_get_contents("php://input"), true);
            $showtime = new Showtime($input);
            $showtime->save($this->mysqli);

            $this->success(["message" => "Showtime added successfully"]);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function getShowtimes() {
        try {
            $query = "SELECT * FROM showtimes";
            $results = $this->mysqli->query($query);
            $showtimes = [];

            while ($row = $results->fetch_assoc()) {
                $showtime = new Showtime($row);
                $showtimes[] = $showtime();
            }

            $this->success($showtimes);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}