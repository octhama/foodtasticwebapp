</main> <!-- /container or main-class -->

<footer class="mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="text-white mb-4">Foodtastic</h5>
                <p class="text-muted">Votre marché local responsable et solidaire. Nous sélectionnons les meilleurs
                    produits issus d'une agriculture durable pour votre bien-être.</p>
                <div class="social-links mt-4">
                    <a href="#" class="mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="mr-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="mr-3"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="col-md-2 offset-md-1 mb-4 mb-md-0">
                <h6>Découvrir</h6>
                <ul class="list-unstyled mt-3">
                    <li><a href="<?php echo url('legume.php'); ?>">Légumes</a></li>
                    <li><a href="<?php echo url('fruit.php'); ?>">Fruits</a></li>
                    <li><a href="<?php echo url('vins.php'); ?>">Vins & Spiritueux</a></li>
                    <li><a href="<?php echo url('miels.php'); ?>">Produits de la ruche</a></li>
                </ul>
            </div>

            <div class="col-md-2 mb-4 mb-md-0">
                <h6>Assistance</h6>
                <ul class="list-unstyled mt-3">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Livraison</a></li>
                    <li><a href="#">Conditions générales</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <h6>Contact</h6>
                <ul class="list-unstyled mt-3">
                    <li class="mb-2"><i class="fas fa-map-marker-alt mr-2 text-primary"></i> 535 Avenue Louise,
                        Bruxelles</li>
                    <li class="mb-2"><i class="fas fa-phone-alt mr-2 text-primary"></i> +32 2 123 45 67</li>
                    <li><i class="fas fa-envelope mr-2 text-primary"></i> info@foodtastic.com</li>
                </ul>
            </div>
        </div>

        <div class="row mt-5 pt-4 border-top border-secondary">
            <div class="col-md-6 text-center text-md-left">
                <p class="mb-0">©
                    <?php echo date('Y'); ?> Foodtastic Market. Tous droits réservés.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" height="20" class="mr-3"
                    alt="PayPal">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" height="15"
                    class="mr-3" alt="Visa">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" height="20"
                    alt="MasterCard">
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Premium Reveal Animations -->
<script src="https://unpkg.com/scrollreveal"></script>
<script>
    window.sr = ScrollReveal({ reset: false });
    sr.reveal('.card', { duration: 1000, distance: '20px', origin: 'bottom', interval: 100 });
    sr.reveal('.animate__animated', { duration: 1000 });
</script>
</body>

</html>