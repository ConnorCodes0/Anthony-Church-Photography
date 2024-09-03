<section class="contact-section">
        <div class="contact-wrapper">
            <div class="form-wrapper">
                <div class="form-info-wrapper">
                    <h2>
                        <?php

                            $text = 'Contact me.';

                            if (isset($_POST['submit'])) {

                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $message = $_POST['message'];

                                require_once 'includes/send-message.inc.php';

                                if ($sent) {
                                    $text = 'Message has been sent!';
                                }
                            }

                            echo $text;
                        ?>
                    </h2>
                    <p>Please feel free to contact me for any inquires and i will try to get back to you as soon as possible</p>
                </div>

                <form action="" method="post" autocomplete="off">

                    <label for="name" class="form-labels">Full name:</label>
                    <input type="text" name="name" class="contact-name contact-input" id="name" placeholder="Full name..." required>  

                    <label for="email" class="form-labels">Email:</label>
                    <input type="email" name="email" class="contact-email contact-input" id="email" placeholder="Email..." required>

                    <label for="message" class="form-labels">Message:</label>
                    <textarea name="message" class="contact-message contact-input" id="message" placeholder="Your message..." cols="15" rows="6" required></textarea>

                    <button type="submit" name="submit" class="contact-submit">Send</button>

                </form>
            </div>

            <div class="contact-section-img"></div>
        </div>
    </section>