<?php helper('form'); ?>
<div id="myDiv"></div>
<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <?php if (isset($validation)): ?>

                <?= $validation->listErrors() ?>
            <?php endif; ?>
            <h3 class="section-subheading text-muted">You can get a better quote.</h3>
        </div>
        <?= session()->getFlashdata('error') ?>
        <form id="contactForm" method="post" action="/contact-us">
            <?= csrf_field() ?>

            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" id="phone" type="tel" pattern="^\d{3}\d{3}\d{4}$" name="tel" required value="<?= set_value('tel') ?>"
                               placeholder="Your Phone *"
                        />
                        <?php if (isset($validation)): ?>
                            <i style="color:#ffc800"> <?= $validation->getError('tel') ?></i>
                        <?php endif; ?>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="message" name="message" required value="<?= set_value('message') ?>"
                                  placeholder="Your Message *"
                        ></textarea>
                        <?php if (isset($validation)): ?>
                            <i style="color:#ffc800"> <?= $validation->getError('message') ?></i>
                        <?php endif; ?>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                </div>
            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">

            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <!-- Submit Button-->
            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">Send
                    Message
                </button>
            </div>
        </form>
    </div>
</section>