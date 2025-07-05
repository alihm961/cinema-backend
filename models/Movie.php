<?php

require_once 'Model.php';

class Movie extends Model {
    protected static string $table = "movies";

    private int $id;
    private string $title;
    private string $genre;
    private string $poster_url;
    private string $trailer_url;

    public function __construct(array $data) {
        $this->id = $data["id"];
        $this->title = $data["title"];
        $this->genre = $data["genre"];
        $this->poster_url = $data["poster_url"];
        $this->trailer_url = $data["trailer_url"];
    }

    public function toArray(): array {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "genre" => $this->genre,
            "poster_url" => $this->poster_url,
            "trailer_url" => $this->trailer_url
        ];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }
}