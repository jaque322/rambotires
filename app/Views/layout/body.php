<a href="tel:8132159157" class="callme-icon floating-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
    </svg></a>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
            <?php
            $session = session();
            if ($session->getFlashData('mailSucess')):?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill"/>
                    </svg>
                    <div>
                        <?= $session->getFlashData('mailSucess') ?>
                    </div>
                </div>

            <?php endif; ?>

            <?php
            $session = session();
            if ($session->getFlashData('mailError')):?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill"/>
                    </svg>
                    <div>
                        <?= $session->getFlashData('mailError') ?>
                    </div>
                </div>

            <?php endif; ?>
        </svg>

        <div class="text-center">
            <h2 class="section-heading text-uppercase">Services</h2>
            <h3 class="section-subheading text-muted">Rambotires best services.</h3>
        </div>

        <div class="row text-center">

            <div class="col-md-4">

                <img class="services" src="<?=base_url()?>/assets/img/services/brakes.png"/>

                <h4 class="my-3">Change Brakes</h4>
                <p class="text-muted">Brief Description.</p>
            </div>

            <div class="col-md-4">

                <img class="services" src="<?=base_url()?>/assets/img/services/tire.png"/>
                <h4 class="my-3">Change tires</h4>
                <p class="text-muted">description of service.</p>
            </div>
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">Another Service</h4>
                <p class="text-muted">another service descripcion.</p>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Grid-->
<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Gallery</h2>
            <h3 class="section-subheading text-muted">The Best Services.</h3>
        </div>

        <div class="row" style="padding: 4px">
            <div class="col-lg-12">
                <div class=portfolio-item">

                    <img class="img-fluid" src="<?=base_url()?>/assets/img/gallery/img7.jpeg" alt="..."/>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <img class="img-fluid" src="<?=base_url()?>/assets/img/gallery/img1.png" alt="..."/>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 2-->
                <div class="portfolio-item">
                    <img class="img-fluid" src="<?=base_url()?>/assets/img/gallery/2.png" alt="..."/>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 3-->
                <div class="portfolio-item">
                    <video width="360" height="450" controls>
                        <source src="<?=base_url()?>/assets/img/gallery/video1.mp4" type="video/mp4">
                    </video>

                </div>
            </div>


        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class=portfolio-item">

                    <img class="img-fluid" src="<?=base_url()?>/assets/img/gallery/img6.jpeg" alt="..."/>

                </div>
            </div>

        </div>

    </div>
</section>
<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Location</h2>
            <h3 class="section-subheading text-muted">1040 S 50th St, Tampa, FL 33619</h3>
            <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3524.8340232217724!2d-82.40351588478586!3d27.937733082697026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c2c50f9168ae8b%3A0x79c7b69d6c1ea27e!2srambotires!5e0!3m2!1sen!2sus!4v1647201717884!5m2!1sen!2sus"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </div>
        </div>
    </div>
</section>
<!-- Team-->
<section class="page-section bg-light" id="team">


    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Hours of Business</h2>
        </div>
        <div class="row">
            <table class="table table-hover" style="width:350px;" align="center">
                <thead class="thead">
                <th>Day</th>
                <th>Hours</th>
                </thead>
                <tbody class="table table-striped">
                <tr>
                    <td>Monday</td>
                    <td>8:00 AM - 5:30 PM</td>
                </tr>
                <tr>
                    <td>Tuesday</td>
                    <td>8:00 AM - 5:30 PM</td>
                </tr>
                <tr>
                    <td>Wednesday</td>
                    <td>8:00 AM - 5:30 PM</td>
                </tr>
                <tr>
                    <td>Thursday</td>
                    <td>8:00 AM - 5:30 PM</td>
                </tr>
                <tr>
                    <td>Friday
                    </td<>
                    <td>8:00 AM - 5:30 PM</td>
                </tr>
                <tr>
                    <td>Saturday</td>
                    <td>8:00 AM - 5:30 PM</td>
                </tr>
                <tr>
                    <td>Sunday</td>
                    <td>Closed</td>
                </tr>
                </tbody>
            </table>


        </div>
    </div>

    </div>
</section>
<!-- Clients-->
<div class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="<?=base_url()?>/assets/img/logos/michellin.svg"
                                  alt="..."/></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="<?=base_url()?>/assets/img/logos/pirelli.svg"
                                  alt="..."/></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="<?=base_url()?>/assets/img/logos/continental.svg"
                                  alt="..."/></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="<?=base_url()?>/assets/img/logos/dunlop.svg"
                                  alt="..."/></a>
            </div>
        </div>
    </div>
</div>

<?php helper('form'); ?>
<div id="myDiv"></div>
<!-- Contact-->


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>


</body>

</html>