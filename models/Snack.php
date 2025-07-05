<?php

require_once 'Model.php';

class Snack extends Model {
    protected static string $table = "snacks";

    private int $id;
    private string $name;
    private float $price;
    private string $image;

    public function __construct(array $data) {
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->price = $data["price"];
        $this->image = $data["image"];
    }

    public function toArray(): array {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "price" => $this->price,
            "image" => $this->image
        ];
    }
}