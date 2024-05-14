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

