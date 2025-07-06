<?php

class ResponseService {
    public static function success($data) {
        echo json_encode([
            'status' => 'success',
            'response' => $data
        ]);
    }

    public static function error($message) {
        echo json_encode([
            'status' => 'error',
            'message' => $message
        ]);
    }
}