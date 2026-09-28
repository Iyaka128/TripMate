// ================================
// TASK 01 - SELECT & CHANGE
// ================================

const title = document.querySelector("h1");

title.textContent = "Temukan Destinasi Impianmu Bersama TripMate";


// ================================
// TASK 02 - HANDLE USER EVENT
// ================================

const detailButtons = document.querySelectorAll(".detail-btn");

detailButtons.forEach(function(button) {

    button.addEventListener("click", function() {

        const destination = button.dataset.destination;
        const description = button.dataset.description;

        const detailInfo = button.nextElementSibling;

        detailInfo.textContent =
            destination + ": " + description;

    });

});
