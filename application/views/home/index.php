<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a href="#"><img src="<?= base_url() ?>assets/img/axiooLogo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" href="<?= base_url() ?>">Home </a>
                <a class="nav-link" href="<?= base_url(); ?>Home/about">About</a>
                <a class="nav-link" href="<?= base_url(); ?>Home/contact">Contact</a>
                <a href="<?= base_url(); ?>Home/sign_in" class="btn btn-primary" id="center">Log-In</a>
            </div>
        </div>
    </div>
</nav>
<!-- akhirNavbar -->

<!-- jumbotron -->
<div class=" jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h2>Lorem ipsum.</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quis quaerat alias harum itaque quas nisi ipsam at ea, impedit explicabo Placeat soluta vero </p>
        <a href="<?= base_url() ?>home/register" class="btn btn-light">Register</a>
    </div>
</div>