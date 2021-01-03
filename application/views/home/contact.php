<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <?= $this->session->flashdata('message'); ?>
            <h1>Contact Us</h1>
            <form class="user" method="POST" action="<?= base_url('home/contact') ?>">
                <div class=" form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="name" class="form-control" name="name" id="name" placeholder="Name">
                        <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="website" class="col-sm-2 col-form-label">Website</label>
                    <div class="col-sm-10">
                        <input type="website" class="form-control" name="website" id="website" placeholder="URL">
                        <?= form_error('website', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Message" class="col-sm-2 col-form-label">Message</label>
                    <div class="col-sm-10">
                        <textarea type="Message" class="form-control" name="Message" id="Message"></textarea>
                        <?= form_error('Message', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="sending">Send</button>
            </form>
        </div>
        <div class="col-3 axioCol">
            <img src="<?= base_url() ?>assets/img/axioo_terbaru.png" alt="">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>© 2019 axioo class program</p>
        </div>
        <div class="col">
            <a href="#" id="backOn">back to top</a>
        </div>
    </div>
</div>