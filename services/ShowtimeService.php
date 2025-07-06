<?php

class ShowtimeService {
    public static function showtimesToArray($showtimes_db): array {
        $results = [];

        foreach ($showtimes_db as $s) {
            $results[] = $s->toArray();
        }

        return $results;
    }
}