<?php

class BookingService {
    public static function bookingToArray($bookings_db) {
        $results = [];

        foreach ($bookings_db as $b) {
            $results[] = $b->toArray();
        }

        return $results;
    }
}