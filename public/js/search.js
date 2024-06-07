const search = document.querySelector('input[placeholder="Search..."]');
const raceContainer = document.querySelector(".races");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (races) {
            raceContainer.innerHTML = "";
            loadRaces(races)
        });
    }
});

function loadRaces(races) {
    races.forEach(race => {
        console.log(race);
        createRace(race);
    });
}

function createRace(race) {
    const template = document.querySelector("#race-template");

    const clone = template.content.cloneNode(true);

    const raceContainer = clone.querySelector(".displayed-races-single-container");
    // raceContainer.setAttribute("data-distance", race.distance);
    // raceContainer.setAttribute("data-location", race.location);
    // raceContainer.setAttribute("data-date", race.date);

    const image = clone.querySelector("img");
    image.src = race.imageurl;

    const title = clone.querySelector("h2");
    title.textContent = race.title;

    const locationText = clone.querySelector(".icon-text-container-1 .race-details-text");
    locationText.textContent = race.location;

    const dateText = clone.querySelector(".icon-text-container-2 .race-details-text");
    dateText.textContent = race.date;

    const priceText = clone.querySelector(".icon-text-container-3 .race-details-text");
    priceText.textContent = `$${race.price}`;

    const form = clone.querySelector("form");
    const input = form.querySelector("input[name='race_id']");
    input.value = race.raceid;

    // Append the cloned element to the raceContainer in the main document
    document.querySelector(".races").appendChild(clone);
}

