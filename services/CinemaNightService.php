<?php
require_once("./models/CinemaNight.php");

class CinemaNightService {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function trigger($adminId) {
        return CinemaNight::run($this->mysqli, $adminId);
    }
}