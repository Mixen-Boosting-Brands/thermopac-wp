document.addEventListener("DOMContentLoaded", function () {
    const searchBtn = document.getElementById("search-btn");
    const searchOverlay = document.getElementById("search-overlay");
    const searchInput = document.getElementById("search-input");
    const searchClose = document.getElementById("search-close");

    // Open search overlay
    searchBtn.addEventListener("click", function (e) {
        e.preventDefault();
        searchOverlay.classList.add("active");
        // Focus on input after a short delay to ensure overlay is visible
        setTimeout(() => {
            searchInput.focus();
        }, 100);
    });

    // Close search overlay
    function closeSearch() {
        searchOverlay.classList.remove("active");
        searchInput.value = "";
    }

    searchClose.addEventListener("click", closeSearch);

    // Close on overlay click (but not on content click)
    searchOverlay.addEventListener("click", function (e) {
        if (e.target === searchOverlay) {
            closeSearch();
        }
    });

    // Close on Escape key
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape" && searchOverlay.classList.contains("active")) {
            closeSearch();
        }
    });

    // Handle search input
    searchInput.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
            // Add your search functionality here
            console.log("Searching for:", searchInput.value);
            // closeSearch(); // Uncomment if you want to close after search
        }
    });
});
