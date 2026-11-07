document.addEventListener("DOMContentLoaded", () => {
  // Mengambil elemen HTML melalui DOM selector.
  const searchInput = document.querySelector("#searchInput");
  const cards = document.querySelectorAll(".destination-card");
  const resultCount = document.querySelector("#resultCount");
  const emptyState = document.querySelector("#emptyState");

  // Event input: memfilter kartu sesuai kata kunci pengguna.
  searchInput.addEventListener("input", () => {
    const keyword = searchInput.value.toLowerCase().trim();
    let visibleCount = 0;

    cards.forEach((card) => {
      const searchableName = card.dataset.name;
      const isMatch = searchableName.includes(keyword);

      card.hidden = !isMatch;
      if (isMatch) visibleCount++;
    });

    resultCount.textContent = `Menampilkan ${visibleCount} dari ${cards.length} destinasi.`;
    emptyState.hidden = visibleCount !== 0;
  });

  // Event click: menampilkan atau menyembunyikan detail destinasi.
  document.querySelectorAll(".detail-btn").forEach((button) => {
    button.addEventListener("click", () => {
      const cardBody = button.closest(".card-body");
      const detailText = cardBody.querySelector(".detail-text");
      const isHidden = detailText.hidden;

      detailText.textContent = button.dataset.detail;
      detailText.hidden = !isHidden;
      button.textContent = isHidden ? "Tutup detail" : "Lihat detail";
    });
  });
});