document.addEventListener("DOMContentLoaded", function() {
    const distanceButton = document.getElementById("filter-distance");
    const distanceOptions = document.querySelector(".distance-options");
    const races = document.querySelectorAll(".displayed-races-single-container");

    distanceButton.addEventListener("click", function() {
        distanceOptions.classList.toggle("show");
    });

    distanceOptions.addEventListener("click", function(event) {
        const selectedDistance = event.target.textContent.trim().toLowerCase() || "all";
        races.forEach(race => {
            const raceDistance = race.getAttribute("data-distance");
            if (selectedDistance === "all" || raceDistance === selectedDistance) {
                race.style.display = "grid";
            } else {
                race.style.display = "none";
            }
        });
        distanceOptions.classList.remove("show");
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const locationButton = document.getElementById("filter-location");
    console.log(locationButton)
    const locationOptions = document.querySelector(".location-options");
    console.log(locationOptions)
    const races = document.querySelectorAll(".displayed-races-single-container");

    locationButton.addEventListener("click", function() {
        locationOptions.classList.toggle("show");
    });

    locationOptions.addEventListener("click", function(event) {
        const selectedLocation = event.target.textContent.trim() || "all";
        races.forEach(race => {
            const raceLocation = race.getAttribute("data-location");
            if (selectedLocation === "all" || raceLocation === selectedLocation) {
                race.style.display = "grid";
            } else {
                race.style.display = "none";
            }
        });
        locationOptions.classList.remove("show");
    });
});






