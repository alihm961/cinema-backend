<?php

class DiscountService {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function applyDiscount($bookingId, $discountPercent): bool {
        return Discount::apply($this->mysqli, $bookingId, $discountPercent);
    }
}