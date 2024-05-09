const upcomingButton = document.getElementById("filter-upcoming");
const finishedButton = document.getElementById("filter-finished");
const raceContainers = document.querySelectorAll(".my-races-single-container");

upcomingButton.addEventListener("click", function() {
    filterRaces("upcoming");
});

finishedButton.addEventListener("click", function() {
    filterRaces("finished");
});

function filterRaces(status) {
    raceContainers.forEach(container => {
        const raceStatus = container.dataset.status;
        container.style.display = (status === "all" || raceStatus === status) ? "grid" : "none";
    });
}
