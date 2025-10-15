document.addEventListener("DOMContentLoaded", function () {
    const serviceModal = document.getElementById("serviceModal");

    if (serviceModal) {
        serviceModal.addEventListener("show.bs.modal", function (event) {
            // Button that triggered the modal
            const button = event.relatedTarget;

            // Extract info from data-bs-* attributes
            const imageUrl = button.getAttribute("data-bs-image");
            const description = button.getAttribute("data-bs-description");

            // Update the modal's content
            const modalImage = serviceModal.querySelector("#modalImage");
            const modalDescription =
                serviceModal.querySelector("#modalDescription");

            modalImage.src = imageUrl;
            modalDescription.innerHTML = description;
        });
    }
});
