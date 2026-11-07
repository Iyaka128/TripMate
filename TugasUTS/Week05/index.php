<?php
// TripMate — Pekan 5: PHP Procedural & Server-Side Rendering
$siteName = "TripMate";
$tagline = "Jelajahi Indonesia dengan lebih mudah.";
$year = date("Y");

// Array berisi data destinasi wisata.
$destinations = [
    [
        "name" => "Pulau Dewata, Bali",
        "region" => "Bali, Indonesia",
        "description" => "Pantai, sunset, budaya lokal, dan kuliner khas.",
        "price" => 1850000,
        "status" => "Tersedia"
    ],
    [
        "name" => "Yogyakarta Heritage",
        "region" => "D.I. Yogyakarta",
        "description" => "Candi, keraton, seni, dan kuliner legendaris.",
        "price" => 1450000,
        "status" => "Hampir Penuh"
    ],
    [
        "name" => "Lombok & Gili Island",
        "region" => "Nusa Tenggara Barat",
        "description" => "Laut jernih, pasir putih, dan petualangan alam.",
        "price" => 2150000,
        "status" => "Tersedia"
    ]
];

// Function untuk mengamankan teks sebelum dimasukkan ke HTML.
function escapeHtml(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

// Function untuk memformat harga dalam Rupiah.
function formatRupiah(int $price): string
{
    return "Rp" . number_format($price, 0, ",", ".");
}

// Conditional: memproses form reservasi ketika request menggunakan POST.
$message = "";
$messageType = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $destination = trim($_POST["destination"] ?? "");

    if ($name !== "" && filter_var($email, FILTER_VALIDATE_EMAIL) && $destination !== "") {
        $message = "Terima kasih, " . $name . ". Permintaan konsultasi untuk " . $destination . " berhasil diterima.";
        $messageType = "success";
    } else {
        $message = "Form belum lengkap. Isi nama, email yang valid, dan pilih destinasi.";
        $messageType = "error";
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= escapeHtml($siteName); ?> — Pekan 5 PHP Procedural</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header><div class="container nav">
    <a class="brand" href="#home">Trip<span>Mate</span></a>
    <nav><a href="#destinasi">Destinasi</a><a href="#reservasi">Konsultasi</a></nav>
</div></header>

<section class="hero" id="home"><div class="container">
    <span class="eyebrow">PEKAN 5 · PHP PROCEDURAL</span>
    <h1><?= escapeHtml($siteName); ?>.<br>Perjalanan dimulai di sini.</h1>
    <p><?= escapeHtml($tagline); ?> Halaman ini dibuat dengan variable, array, function, conditional, loop, dan PHP server-side rendering.</p>
    <a class="btn" href="#destinasi">Lihat destinasi</a>
</div></section>

<main class="container">
<section class="section" id="destinasi">
    <div class="section-head"><h2>Destinasi Pilihan</h2><p class="muted">Kartu di bawah dibuat otomatis menggunakan PHP foreach.</p></div>
    <div class="grid">
        <?php foreach ($destinations as $destination): ?>
            <?php
            // Conditional untuk menentukan label status.
            $statusClass = $destination["status"] === "Tersedia" ? "success" : "notice";
            ?>
            <article class="card">
                <div class="card-top"></div>
                <div class="card-body">
                    <span class="tag"><?= escapeHtml($destination["region"]); ?></span>
                    <h3><?= escapeHtml($destination["name"]); ?></h3>
                    <p><?= escapeHtml($destination["description"]); ?></p>
                    <p><strong>Status:</strong> <span class="<?= $statusClass ?>"><?= escapeHtml($destination["status"]); ?></span></p>
                    <div class="price"><?= formatRupiah($destination["price"]); ?></div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section" id="reservasi">
    <div class="section-head"><h2>Konsultasi Perjalanan</h2><p class="muted">Form dikirim ke server menggunakan method POST dan diproses oleh PHP.</p></div>
    <div class="panel">
        <?php if ($message !== ""): ?>
            <div class="notice <?= $messageType; ?>" role="status"><?= escapeHtml($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="#reservasi">
            <label for="name">Nama</label>
            <input id="name" name="name" required value="<?= escapeHtml($_POST["name"] ?? ""); ?>">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required value="<?= escapeHtml($_POST["email"] ?? ""); ?>">
            <label for="destination">Destinasi yang diminati</label>
            <select id="destination" name="destination" required>
                <option value="">Pilih destinasi</option>
                <?php foreach ($destinations as $destination): ?>
                    <option value="<?= escapeHtml($destination["name"]); ?>" <?= (($_POST["destination"] ?? "") === $destination["name"]) ? "selected" : ""; ?>>
                        <?= escapeHtml($destination["name"]); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button class="btn" type="submit" style="margin-top:16px">Kirim konsultasi</button>
        </form>
    </div>
</section>
</main>
<footer><div class="container">© <?= escapeHtml($year); ?> TripMate · Implementasi Pekan 5 — PHP Procedural</div></footer>
</body>
</html>
