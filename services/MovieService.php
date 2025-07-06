<?php
class MovieService {
    public static function moviesToArray($movies_db) {
        $results = [];
        foreach ($movies_db as $m) {
            // If $m is already a Movie object, skip this step
            if ($m instanceof Movie) {
                $results[] = $m->toArray();
            } else {
                $results[] = (new Movie($m))->toArray();
            }
        }
        return $results;
    }
}