<?php
// TripMate — Pekan 6: PHP Object-Oriented Programming (OOP)

class Destination
{
    // Encapsulation: property dibuat private.
    private string $name;
    private string $region;
    private string $description;
    private int $price;
    private string $status;

    // Constructor mengisi nilai awal saat object dibuat.
    public function __construct(
        string $name,
        string $region,
        string $description,
        int $price,
        string $status
    ) {
        $this->name = $name;
        $this->region = $region;
        $this->description = $description;
        $this->price = $price;
        $this->status = $status;
    }

    // Getter untuk membaca property private.
    public function getName(): string
    {
        return $this->name;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    // Method untuk menghasilkan informasi ringkas dari object.
    public function getProfile(): string
    {
        return $this->name . " — " . $this->region;
    }

    public function isAvailable(): bool
    {
        return $this->status === "Tersedia";
    }
}

// Membuat beberapa object dari class Destination.
$destinations = [
    new Destination(
        "Pulau Dewata, Bali",
        "Bali, Indonesia",
        "Pantai, sunset, budaya lokal, dan kuliner khas.",
        1850000,
        "Tersedia"
    ),
    new Destination(
        "Yogyakarta Heritage",
        "D.I. Yogyakarta",
        "Candi, keraton, seni, dan kuliner legendaris.",
        1450000,
        "Hampir Penuh"
    ),
    new Destination(
        "Lombok & Gili Island",
        "Nusa Tenggara Barat",
        "Laut jernih, pasir putih, dan petualangan alam.",
        2150000,
        "Tersedia"
    )
];

// Helper untuk mengamankan teks output HTML.
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

function rupiah(int $price): string
{
    return "Rp" . number_format($price, 0, ",", ".");
}

$siteName = "TripMate";
$year = date("Y");
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($siteName); ?> — Pekan 6 PHP OOP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header><div class="container nav">
    <a class="brand" href="#home">Trip<span>Mate</span></a>
    <nav><a href="#destinasi">Destinasi</a><a href="#konsep">Konsep OOP</a></nav>
</div></header>

<section class="hero" id="home"><div class="container">
    <span class="eyebrow">PEKAN 6 · PHP OBJECT-ORIENTED PROGRAMMING</span>
    <h1>Jelajahi Indonesia<br>bersama TripMate.</h1>
    <p>Informasi destinasi dikelola menggunakan class dan object PHP. Setiap object menyimpan data sendiri dan menyediakan method untuk mengaksesnya.</p>
    <a class="btn" href="#destinasi">Lihat destinasi</a>
</div></section>

<main class="container">
<section class="section" id="destinasi">
    <div class="section-head"><h2>Destinasi dari Object PHP</h2><p class="muted">Setiap kartu dihasilkan dari object Destination, bukan array biasa.</p></div>
    <div class="grid">
        <?php foreach ($destinations as $destination): ?>
            <article class="card">
                <div class="card-top"></div>
                <div class="card-body">
                    <span class="tag"><?= e($destination->getRegion()); ?></span>
                    <h3><?= e($destination->getName()); ?></h3>
                    <p><?= e($destination->getDescription()); ?></p>
                    <p><strong>Status:</strong>
                        <span class="<?= $destination->isAvailable() ? "notice success" : "notice"; ?>">
                            <?= e($destination->getStatus()); ?>
                        </span>
                    </p>
                    <div class="price"><?= rupiah($destination->getPrice()); ?></div>
                    <p class="muted"><small>Profil object: <?= e($destination->getProfile()); ?></small></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section" id="konsep">
    <div class="panel">
        <h2>Konsep OOP yang digunakan</h2>
        <ul class="clean">
            <li><strong>Class:</strong> <code>Destination</code> sebagai cetak biru objek destinasi.</li>
            <li><strong>Object:</strong> tiga instance dibuat menggunakan <code>new Destination(...)</code>.</li>
            <li><strong>Property:</strong> name, region, description, price, dan status.</li>
            <li><strong>Constructor:</strong> <code>__construct()</code> mengisi data saat object dibuat.</li>
            <li><strong>Encapsulation:</strong> semua property bersifat <code>private</code>.</li>
            <li><strong>Method:</strong> getter, <code>getProfile()</code>, dan <code>isAvailable()</code>.</li>
        </ul>
    </div>
</section>
</main>
<footer><div class="container">© <?= e($year); ?> TripMate · Implementasi Pekan 6 — PHP OOP</div></footer>
</body>
</html>
