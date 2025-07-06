<?php
require_once("Model.php");

class Snack extends Model {
    protected static  $table = "snacks";
    protected static $columns = [
        "name",
        "price",
        "image"
];

    public string $name;
    public float $price;
    public string $image;

    public function __construct($data = []) {
        $this->name = $data["name"] ?? "";
        $this->price = $data["price"] ?? 0.0;
        $this->image = $data["image"] ?? "";
    }

    public function toArray(): array {
        return [
            "name" => $this->name,
            "price" => $this->price,
            "image" => $this->image
        ];
    }
}