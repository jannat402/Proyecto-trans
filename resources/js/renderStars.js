function renderStars(rating) {
    let html = "";
    const full = Math.floor(rating);
    const half = rating - full >= 0.5;

    for (let i = 0; i < full; i++) html += "★";
    if (half) html += "☆";
    while (html.length < 5) html += "✩";

    return html;
}
