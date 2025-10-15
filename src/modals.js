document.addEventListener("DOMContentLoaded", function () {
    const serviceModal = document.getElementById("serviceModal");

    if (serviceModal) {
        serviceModal.addEventListener("show.bs.modal", function (event) {
            // Button that triggered the modal
            const button = event.relatedTarget;
            if (!button) {
                console.error("Modal triggered without a relatedTarget button.");
                return;
            }

            // Extract info from data-bs-* attributes
            const name = button.getAttribute("data-bs-name");
            const imageUrl = button.getAttribute("data-bs-image");
            const encodedDescription =
                button.getAttribute("data-bs-description");

            // Update the modal's content
            const modalTitle = serviceModal.querySelector("#serviceModalLabel");
            const modalImage = serviceModal.querySelector("#modalImage");
            const modalDescription =
                serviceModal.querySelector("#modalDescription");

            // Update title
            if (modalTitle) {
                modalTitle.textContent = name || "";
            }

            // Update image
            if (modalImage) {
                modalImage.src = imageUrl || ""; // Use the URL or fallback to empty
            }

            // Update description (with safety check)
            if (modalDescription) {
                let description = "";
                // Only decode if the description string is not empty
                if (encodedDescription) {
                    try {
                        description = atob(encodedDescription);
                    } catch (e) {
                        console.error(
                            "Failed to decode base64 description:",
                            e,
                        );
                        description =
                            "There was an error displaying this content.";
                    }
                }
                modalDescription.innerHTML = description;
            }
        });
    }
});
