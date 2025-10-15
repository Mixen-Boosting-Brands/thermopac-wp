        <section id="contact" class="pt-60 pb-30">
            <div class="container">
                <div class="row">
                    <div
                        class="col container-inner rounded"
                        style="padding-top: 60px; padding-bottom: 60px"
                    >
                        <div class="row mb-4">
                            <div class="col text-center">
                                <h1
                                    data-aos="fade-up"
                                    data-aos-duration="1500"
                                    data-aos-delay="0"
                                >
                                    How can we help you?
                                </h1>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div id="form-messages"></div>

                                <form
                                    action="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/mailer.php"
                                    method="POST"
                                    class="row g-3 needs-validation contact-form mb-4 mb-lg-0"
                                    id="ajax-contact"
                                    novalidate
                                    data-aos="fade-up"
                                    data-aos-duration="1500"
                                    data-aos-delay="100"
                                >
                                    <div class="col-md-6 form-floating">
                                        <input
                                            type="text"
                                            class="form-control shadow-none"
                                            id="name"
                                            name="name"
                                            placeholder="Name*"
                                            pattern=".{5,50}"
                                            required
                                        />
                                        <label for="name" class="form-label"
                                            >Name*</label
                                        >
                                        <div class="valid-feedback">
                                            It looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter your name.
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input
                                            type="email"
                                            class="form-control shadow-none"
                                            id="email"
                                            name="email"
                                            placeholder="Email*"
                                            required
                                        />
                                        <label for="email" class="form-label"
                                            >Email*</label
                                        >
                                        <div class="valid-feedback">
                                            It looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter a valid email address.
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input
                                            type="tel"
                                            class="form-control shadow-none"
                                            id="phone"
                                            name="phone"
                                            placeholder="Phone*"
                                            required
                                        />
                                        <label for="phone" class="form-label"
                                            >Phone*</label
                                        >
                                        <div class="valid-feedback">
                                            It looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter a valid phone number.
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input
                                            type="text"
                                            class="form-control shadow-none"
                                            id="subject"
                                            name="subject"
                                            placeholder="Subject*"
                                            pattern=".{5,50}"
                                            required
                                        />
                                        <label for="subject" class="form-label"
                                            >Subject*</label
                                        >
                                        <div class="valid-feedback">
                                            It looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter your subject.
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-floating mb-4">
                                        <textarea
                                            class="form-control shadow-none"
                                            id="message"
                                            name="message"
                                            placeholder="Message*"
                                            required
                                        ></textarea>
                                        <label for="mensaje">Message*</label>
                                        <div class="valid-feedback">
                                            It looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter your message.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            We are commited to protect your
                                            privacy.
                                            <br />
                                            We will never collect
                                            informationabout you without your
                                            consent.
                                        </p>
                                    </div>
                                    <div class="col-md-6 mb-5 text-end">
                                        <button
                                            type="submit"
                                            class="btn btn-lg btn-light rounded-pill"
                                        >
                                            <i
                                                class="fa-solid fa-paper-plane"
                                            ></i>
                                            Submit
                                        </button>
                                        <div id="hold-on-a-sec">
                                            <i
                                                id="contact-spinner"
                                                class="fas fa-spinner fa-spin"
                                            ></i>
                                            Enviando tu información, por favor
                                            espera un momento....
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-30">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <hr />
                    </div>
                </div>
            </div>
        </section>

        <footer class="pt-30 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 my-auto">
                        <a class="anchor" id="btn-logo" href="<?php echo esc_url(
                            home_url(),
                        ); ?>">
                            <img
                                class="logo img-fluid mb-4 mb-lg-0"
                                alt="Thermopac"
                                src="<?php echo esc_url(
                                    get_template_directory_uri(),
                                ); ?>/assets/images/logo-light@2x.png"
                                data-theme-light="<?php echo esc_url(
                                    get_template_directory_uri(),
                                ); ?>/assets/images/logo-light@2x.png"
                                data-theme-dark="<?php echo esc_url(
                                    get_template_directory_uri(),
                                ); ?>/assets/images/logo-dark@2x.png"
                            />
                        </a>
                    </div>
                    <div class="col-lg-7 my-auto text-center">
                        <nav class="my-4 my-lg-0">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url(
                                        home_url(),
                                    ); ?>" <?php if (
    is_front_page()
): ?>class="active"<?php endif; ?>>Home</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url(
                                        get_permalink(33),
                                    ); ?>" <?php if (
    is_page(33)
): ?>class="active"<?php endif; ?>>About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url(
                                        get_permalink(35),
                                    ); ?>" <?php if (
    is_page(35)
): ?>class="active"<?php endif; ?>>Services</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url(
                                        get_permalink(39),
                                    ); ?>" <?php if (
    is_page(39)
): ?>class="active"<?php endif; ?>>Markets</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?php if (!is_home()):
                                        echo esc_url(home_url());
                                    endif; ?>#news-and-events">News and Events</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#contact">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 my-auto text-center text-lg-end">
                        <ul
                            class="certificaciones list-unstyled mt-4 mt-lg-0 mb-0"
                        >
                            <li class="list-inline-item">
                                <img
                                    class="img-fluid"
                                    src="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/assets/images/certificaciones/1.png"
                                    alt=""
                                />
                            </li>
                            <li class="list-inline-item">
                                <img
                                    class="img-fluid"
                                    src="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/assets/images/certificaciones/2.png"
                                    alt=""
                                />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Search Overlay -->
        <div id="search-overlay" class="search-overlay">
            <div class="search-overlay-content">
                <button id="search-close" class="search-close-btn">
                    <i class="fas fa-times"></i>
                </button>
                <div class="search-container">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(
                        home_url("/"),
                    ); ?>">
                        <input
                            type="search"
                            id="search-input"
                            class="search-input"
                            placeholder="Search..."
                            value="<?php echo get_search_query(); ?>"
                            name="s"
                            autocomplete="off"
                        />
                        <button type="submit" class="search-submit">
                            <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Service Modal -->
        <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="serviceModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="" id="modalImage" class="img-fluid mb-4" alt="Service Image">
                        <div id="modalDescription"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php wp_footer(); ?>

        <script src="<?php echo esc_url(
            get_template_directory_uri(),
        ); ?>/assets/js/app.bundle.js" defer></script>
    </body>
</html>
