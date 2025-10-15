// Formulario + Validación
"use strict";
window.addEventListener(
    "load",
    function () {
        // Get the messages div.
        const formMessages = $("#form-messages");
        const loadingSpinner = $("#hold-on-a-sec");

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.getElementsByClassName("needs-validation");
        // Loop over them and prevent submission
        Array.prototype.filter.call(forms, function (form) {
            form.addEventListener(
                "submit",
                function (event) {
                    event.preventDefault();
                    event.stopPropagation();

                    if (form.checkValidity() === false) {
                        form.classList.add("was-validated");
                        return;
                    }

                    // If form is valid, proceed with AJAX
                    form.classList.remove("was-validated");

                    // Get form data
                    const formData = new FormData(form);

                    // Submit the form using AJAX
                    $.ajax({
                        type: $(form).attr("method"),
                        url: $(form).attr("action"),
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            loadingSpinner.addClass("is-loading");
                        },
                        success: function (response) {
                            formMessages.removeClass("error").addClass("success");
                            formMessages.text(response);

                            // Clear the form fields with correct IDs
                            form.reset();
                        },
                        error: function (response) {
                            formMessages.removeClass("success").addClass("error");
                            // Set the message text.
                            if (response.responseText !== "") {
                                formMessages.text(response.responseText);
                            } else {
                                formMessages.text(
                                    "We're so sorry, something went wrong.",
                                );
                            }
                        },
                        complete: function () {
                            loadingSpinner.removeClass("is-loading");
                        },
                    });
                },
                false,
            );
        });
    },
    false,
);
