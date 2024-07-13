<section class="container-fluid general-wrapper donate m-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4" id="donate-all">
                <h2>Donate</h2>
                <a href="https://www.paypal.com/" class="btn-filled" target="_blank">
                    <img src="/images/PayPal-logo-white.png" alt="logotype PayPal">
                </a>
                <a href="https://www.paypal.com/" class="btn-filled" target="_blank">
                    <img src="/images/Card-logo-white.svg" alt="logo card">Debit or Credit card
                </a>
                <figure>
                    <img src="/images/arcadia_logo.svg" alt="Arcadia logo" />
                </figure>
                <div class="col-12">
                    <ul class="social">
                        <li>
                            <a href="" class="soc-icon">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="soc-icon">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="soc-icon">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="soc-icon">
                                <i class="bi bi-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="soc-icon">
                                <i class="bi bi-pinterest"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-8" id="contact-all">
                <h2>Contact</h2>
                <script>
                    const sendMessageUrl = "{{ route('homepage.sendmessage') }}";
                </script>
                <form class="contact" id="contactForm">
                    @csrf
                    <div>
                        <div>
                            <input class="form-control w-chbl" id="name-contact" type="text" placeholder="First name" required>
                        </div>
                        <div>
                            <input class="form-control w-chbl" id="nameL-contact" type="text" placeholder="Last name" required>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input class="form-control w-chbl" id="tel-contact" type="tel" placeholder="Telephone" required>
                        </div>
                        <div>
                            <input class="form-control w-chbl" id="mail-contact" type="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div>
                        <textarea class="form-control" id="mess-contact" type="text" rows="6" placeholder="Your message" required></textarea>
                    </div>
                    <div>
                        <button type="button" id="submit-contact" class="btn btn-filled w-chbl">S U B M I T</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>