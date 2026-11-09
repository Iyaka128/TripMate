<?php
/**
 * ====================================================================
 * TripMate — Front Controller.
 * Alur MVC: Request -> Controller -> Model -> Controller -> View.
 * ====================================================================
 */

// Canonical URL: request PATH_INFO seperti /index.php/style.css membuat
// server bawaan PHP mengembalikan HTML untuk aset statis. Alihkan GET ke "/".
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
if (
    ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET'
    && str_starts_with($requestPath, '/index.php')
) {
    header('Location: /', true, 302);
    exit;
}

require __DIR__ . '/controllers/DestinationController.php';
