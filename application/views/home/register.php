<div class="container" id="IMGregist">
    <div class="row justify-content-center">
        <div class="col-sm-9 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title mb-5" id="regisRow">Register Account</h1>
            <?= $this->session->flashdata('message'); ?>
            <div class="account-wall">
                <form class="form-signin" method="POST" autocomplete="off" action="<?= base_url() ?>home/register">
                    <input type="text" class="form-control mb-2" placeholder="Username" value="<?= set_value('username') ?>" name="username" autocomplete="off" required autofocus>
                    <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input type="password" class="form-control mb-2" placeholder="Password" name="password1" autocomplete="off" required>
                    <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input type="password" class="form-control mb-2" placeholder="Re-Password" name="password2" autocomplete="off" required>
                    <?= form_error('password2', '<small class="text-danger pl-2">', '</small>'); ?>
                    <button class="btn btn-lg btn-primary btn-block mb-2" type="submit">
                        Create an account</button>
                    <a href="<?= base_url() ?>home/contact" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="<?= base_url() ?>home/sign_in" class="text-center new-account">Sign in </a>
        </div>
        <div class="col-5">
            <img src="<?= base_url() ?>assets/img/axioo_terbaru.png" alt="">
        </div>
    </div>
</div>