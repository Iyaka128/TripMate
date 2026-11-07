const form = document.querySelector("#searchForm");
const cityInput = document.querySelector("#cityInput");
const searchButton = document.querySelector("#searchButton");
const statusBox = document.querySelector("#status");
const resultsBox = document.querySelector("#results");

form.addEventListener("submit", async (event) => {
  event.preventDefault();

  const city = cityInput.value.trim();
  if (!city) {
    statusBox.textContent = "Masukkan nama kota terlebih dahulu.";
    statusBox.className = "notice error";
    return;
  }

  // Loading state saat request sedang berlangsung.
  searchButton.disabled = true;
  searchButton.textContent = "Mengambil data...";
  statusBox.textContent = `Sedang mencari lokasi "${city}"...`;
  statusBox.className = "notice";
  resultsBox.replaceChildren();

  try {
    const params = new URLSearchParams({
      name: city,
      count: "5",
      language: "id",
      format: "json",
      countryCode: "ID"
    });

    // Fetch API mengirim HTTP GET request ke endpoint Geocoding.
    const response = await fetch(
      `https://geocoding-api.open-meteo.com/v1/search?${params.toString()}`
    );

    // Fetch tidak otomatis gagal untuk status HTTP 4xx/5xx.
    if (!response.ok) {
      throw new Error(`Server merespons dengan status ${response.status}.`);
    }

    // Mengubah response JSON menjadi object JavaScript.
    const data = await response.json();
    const locations = data.results || [];

    if (locations.length === 0) {
      statusBox.textContent = `Tidak ada hasil untuk "${city}". Coba nama kota lain.`;
      statusBox.className = "notice error";
      resultsBox.innerHTML = '<div class="empty">Lokasi tidak ditemukan.</div>';
      return;
    }

    statusBox.textContent = `Berhasil menerima ${locations.length} hasil lokasi.`;
    statusBox.className = "notice success";

    // Render data JSON ke DOM. textContent dipakai agar teks data tidak dianggap HTML.
    locations.forEach((location) => {
      const card = document.createElement("article");
      card.className = "card";

      const top = document.createElement("div");
      top.className = "card-top";

      const body = document.createElement("div");
      body.className = "card-body";

      const tag = document.createElement("span");
      tag.className = "tag";
      tag.textContent = location.country || "Lokasi";

      const title = document.createElement("h3");
      title.textContent = location.name;

      const region = document.createElement("p");
      region.textContent = [location.admin1, location.country].filter(Boolean).join(", ");

      const coordinates = document.createElement("p");
      coordinates.textContent =
        `Koordinat: ${Number(location.latitude).toFixed(4)}, ${Number(location.longitude).toFixed(4)}`;

      body.append(tag, title, region, coordinates);
      card.append(top, body);
      resultsBox.append(card);
    });
  } catch (error) {
    statusBox.textContent = `Gagal mengambil data: ${error.message}`;
    statusBox.className = "notice error";
    resultsBox.innerHTML = '<div class="empty">Periksa koneksi internet, lalu coba lagi.</div>';
    console.error("TripMate API error:", error);
  } finally {
    // Mengembalikan tombol setelah request selesai, berhasil maupun gagal.
    searchButton.disabled = false;
    searchButton.textContent = "Cari lokasi";
  }
});