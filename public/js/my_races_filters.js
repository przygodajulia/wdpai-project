document.addEventListener("DOMContentLoaded", function() {
    const upcomingButton = document.getElementById("filter-upcoming");
    const finishedButton = document.getElementById("filter-finished");

    upcomingButton.addEventListener("click", function() {
        filterRaces("upcoming");
    });

    finishedButton.addEventListener("click", function() {
        filterRaces("finished");
    });

    function filterRaces(status) {
        const raceContainers = document.querySelectorAll(".my-races-single-container");
        raceContainers.forEach(function(container) {
            const raceStatus = container.dataset.status;
            if (status === "all" || raceStatus === status) {
                container.style.display = "grid";
            } else {
                container.style.display = "none";
            }
        });
    }
});
