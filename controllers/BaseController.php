<?php

require_once './services/ResponseService.php';

class BaseController {
    protected $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    protected function success($data) {
        ResponseService::success($data);
    }

    protected function error($message) {
        ResponseService::error($message);
    }
}