<?php

require_once 'Model.php';

class Movie extends Model {
    protected static $table = "movies";
    protected static $columns = [
        "title",
        "genre",
        "poster_url",
        "trailer_url"
    ];

    public int $id;
    public string $title;
    public string $genre;
    public string $poster_url;
    public string $trailer_url;

    public function __construct(array $data) {
    $this->id = $data["id"] ?? 0;
    $this->title = $data["title"] ?? "";
    $this->genre = $data["genre"] ?? "";
    $this->poster_url = $data["poster_url"] ?? "";
    $this->trailer_url = $data["trailer_url"] ?? "";
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