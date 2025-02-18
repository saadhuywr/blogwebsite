document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search-input");
    const blogCards = document.querySelectorAll(".blog-card");
    const loadMoreButton = document.getElementById("load-more-btn");
    let visibleCards = 5;

    function updateLoadMoreButton() {
        const visibleCardCount = Array.from(blogCards).filter(
            (card) => card.style.display === "block"
        ).length;

        // Show the button only if there are more than 6 visible cards
        loadMoreButton.style.display = visibleCardCount >= 6 ? "block" : "none";
    }

    searchInput.addEventListener("input", function () {
        const searchQuery = searchInput.value.toLowerCase();
        let matchedCount = 0;

        blogCards.forEach((card) => {
            const title = card.getAttribute("data-title").toLowerCase();
            const category = card.getAttribute("data-category").toLowerCase();

            if (title.includes(searchQuery) || category.includes(searchQuery)) {
                card.style.display = matchedCount < visibleCards ? "block" : "none";
                matchedCount++;
            } else {
                card.style.display = "none";
            }
        });

        updateLoadMoreButton();
    });

    loadMoreButton.addEventListener("click", function () {
        let newVisibleCount = 0;

        blogCards.forEach((card) => {
            if (card.style.display === "block" && newVisibleCount < visibleCards) {
                newVisibleCount++;
            } else if (newVisibleCount >= visibleCards) {
                card.style.display = "block";
                newVisibleCount++;
            }
        });

        visibleCards += 5;
        updateLoadMoreButton();
    });

    updateLoadMoreButton();
});
