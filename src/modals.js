document.addEventListener("DOMContentLoaded", function () {
    const serviceModal = document.getElementById("serviceModal");

    if (serviceModal) {
        serviceModal.addEventListener("show.bs.modal", function (event) {
            // Button that triggered the modal
            const button = event.relatedTarget;

            // Extract info from data-bs-* attributes
            const imageUrl = button.getAttribute("data-bs-image");
            const encodedDescription =
                button.getAttribute("data-bs-description");

            // Decode the base64 description
            const description = atob(encodedDescription);

            // Update the modal's content
            const modalImage = serviceModal.querySelector("#modalImage");
            const modalDescription =
                serviceModal.querySelector("#modalDescription");

            // Check if elements exist before updating
            if (modalImage) {
                modalImage.src = imageUrl;
            }
            if (modalDescription) {
                modalDescription.innerHTML = description;
            }
        });
    }
});
