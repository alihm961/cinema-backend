<?php

return [
    "/registerUser" => ["controller" => "UserController", "method" => "registerUser"],
    "/loginUser" => ["controller" => "UserController", "method" => "loginUser"],
    "/movies" => ["controller" => "MovieController","method" => "getAllMovies"],
    "/add-movie" => ["controller" => "MovieController","method" => "addMovie"],
    "/book" => ["controller" => "BookingController","method" => "createBooking"],
    "/payment" => ["controller" => "PaymentController","method" => "createPayment"],
    "/apply-discount" => ["controller" => "DiscountController","method" => "applyDiscount"],
    "/snack-order" => ["controller" => "SnackOrderController","method" => "createOrder"],
    "/cinema-night" => ["controller" => "CinemaNightController","method" => "bookAuto"],
    "/add-snack" => ["controller" => "SnackController", "method" => "addSnack"]

];

