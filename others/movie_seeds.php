<?php
require_once (__DIR__ . '/../connection/connection.php');

$movies = [
    ['Fast X', 'Action', 'fast-x.avif', 'Dom and his crew face a new enemy in a high-octane adventure.'],
    ['Mission: Impossible 7', 'Action', 'mission-impossible-7.avif', 'Ethan Hunt returns for another impossible mission.'],
    ['The Batman', 'Crime', 'batman.avif', 'The dark knight faces a twisted new villain in Gotham.'],
    ['Avatar: The Way of Water', 'Sci-Fi', 'avatar.avif', 'Return to Pandora in a breathtaking aquatic adventure.'],
    ['Top Gun: Maverick', 'Action', 'top-gun.avif', 'Maverick trains a new generation of fighter pilots.'],
    ['The Lion King', 'Animation', 'lion-king.avif', 'A young lion prince flees his kingdom to discover himself.'],
    ['Oppenheimer', 'Drama', 'oppenheimer.avif', 'The story of the man behind the atomic bomb.'],
    ['Elemental', 'Animation', 'elemental.avif', 'A world where fire, water, land and air live together.']
];

$stmt = $mysqli->prepare("INSERT INTO movies (title, genre, poster_url, description) VALUES (?, ?, ?, ?)");

foreach ($movies as $movie) {
    $stmt->bind_param("ssss", $movie[0], $movie[1], $movie[2], $movie[3]);
    $stmt->execute();
}

echo "Movies seeded successfully.";