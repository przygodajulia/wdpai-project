const distanceButton = document.getElementById("filter-distance");
const distanceOptions = document.querySelector(".distance-options");
const locationButton = document.getElementById("filter-location");
const locationOptions = document.querySelector(".location-options");
const dateButton = document.getElementById("filter-dates");
const dateOptions = document.querySelector(".date-options");
const races = document.querySelectorAll(".displayed-races-single-container");

function handleFilter(button, options, dataAttribute) {
    button.addEventListener("click", function() {
        options.classList.toggle("show");
    });

    options.addEventListener("click", function(event) {
        const selectedFilter = event.target.textContent.trim().toLowerCase() || "all";
        races.forEach(race => {
            const raceFilter = race.getAttribute(dataAttribute).toLowerCase();
            race.style.display = (selectedFilter === "all" || raceFilter === selectedFilter) ? "grid" : "none";
        });
        options.classList.remove("show");
    });
}

handleFilter(distanceButton, distanceOptions, "data-distance");
handleFilter(locationButton, locationOptions, "data-location");
handleFilter(dateButton, dateOptions, "data-date");



// document.addEventListener("DOMContentLoaded", function() {
//     const distanceButton = document.getElementById("filter-distance");
//     const distanceOptions = document.querySelector(".distance-options");
//     const races = document.querySelectorAll(".displayed-races-single-container");
//
//     distanceButton.addEventListener("click", function() {
//         distanceOptions.classList.toggle("show");
//     });
//
//     distanceOptions.addEventListener("click", function(event) {
//         const selectedDistance = event.target.textContent.trim().toLowerCase() || "all";
//         races.forEach(race => {
//             const raceDistance = race.getAttribute("data-distance");
//             if (selectedDistance === "all" || raceDistance === selectedDistance) {
//                 race.style.display = "grid";
//             } else {
//                 race.style.display = "none";
//             }
//         });
//         distanceOptions.classList.remove("show");
//     });
// });
//
// document.addEventListener("DOMContentLoaded", function() {
//     const locationButton = document.getElementById("filter-location");
//     const locationOptions = document.querySelector(".location-options");
//     const races = document.querySelectorAll(".displayed-races-single-container");
//
//     locationButton.addEventListener("click", function() {
//         locationOptions.classList.toggle("show");
//     });
//
//     locationOptions.addEventListener("click", function(event) {
//         const selectedLocation = event.target.textContent.trim() || "all";
//         races.forEach(race => {
//             const raceLocation = race.getAttribute("data-location");
//             if (selectedLocation === "all" || raceLocation === selectedLocation) {
//                 race.style.display = "grid";
//             } else {
//                 race.style.display = "none";
//             }
//         });
//         locationOptions.classList.remove("show");
//     });
// });
//
// document.addEventListener("DOMContentLoaded", function() {
//     const dateButton = document.getElementById("filter-dates");
//     const dateOptions = document.querySelector(".date-options");
//     const races = document.querySelectorAll(".displayed-races-single-container");
//
//     dateButton.addEventListener("click", function() {
//         dateOptions.classList.toggle("show");
//     });
//
//     dateOptions.addEventListener("click", function(event) {
//         const selectedMonth = event.target.textContent.trim() || "all";
//         races.forEach(race => {
//             const raceMonth = race.getAttribute("data-date");
//             if (selectedMonth === "all" || raceMonth === selectedMonth) {
//                 race.style.display = "grid";
//             } else {
//                 race.style.display = "none";
//             }
//         });
//         dateOptions.classList.remove("show");
//     });
// });
//
//
//
//
//
//
