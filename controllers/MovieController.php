<?php

require_once './models/Movie.php';
require_once './services/MovieService.php';
require_once './controllers/BaseController.php';

class MovieController extends BaseController {
    public function getAllMovies() {
        try {
            $movies = Movie::all($this->mysqli);
            $this->success(MovieService::moviesToArray($movies));
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function addMovie() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            $movie = new Movie([
                "id" => null,
                "title" => $data["title"],
                "genre" => $data["genre"],
                "poster_url" => $data["poster_url"],
                "trailer_url" => $data["trailer_url"]
            ]);

            $success = $movie->save($this->mysqli);
            $this->success(["saved" => $success]);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}