<nav class="navbar navbar-dark bg-dark">
    <a href="#"><img src="<?= base_url() ?>assets/img/axiooLogo.png"></a>
    <form class="form-inline" method="POST" action="dashboard/index">
        <input type="text" class="form-control" placeholder="Search..." name="keyword">
        <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="submit">Search</button>
        <a href="<?= base_url() ?>home/logout" class="btn btn-outline-primary ml-3 my-sm-0">sign-out</a>
    </form>
</nav>

<div class="sidebar" id="myDIV">
    <a href="<?= base_url() ?>dashboard" class="btn mt-2 active">Dashboard</a>
    <a href="<?= base_url() ?>dashboard/student" class="btn mt-2">Student</a>
</div>
<div class="content">
    <h2 class="mt-3">Dashboard</h2>
    <hr>
    <?= $this->session->flashdata('message'); ?>
    <div class="card ">
        <div class="card-header">
            <h2>Create</h2>
        </div>
        <form method="POST" action="<?= base_url() ?>dashboard">
            <div class="row mt-4">
                <div class="col-5 ml-5">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" placeholder="Name" id="name" name="name" required>
                        <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-5 ">
                    <label for="pnumber">Phone Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+62</div>
                        </div>
                        <input type="text" class="form-control" id="pnumber" name="pnumber" required id="pnumber" placeholder="Phone Number">
                    </div>
                    <?= form_error('pnumber', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-5 ml-5">
                    <div class="form-group">
                        <label for="school">School</label>
                        <input type="text" class="form-control" placeholder="School" required id="school" name="school">
                        <?= form_error('school', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-5">
                    <label for="inputState">Grade</label>
                    <select id="inputState" class="form-control" id="grade" name="grade" required>
                        <option selected>Select</option>
                        <?php foreach ($grade as $gr) : ?>
                            <option><?= $gr['grade']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-5 ml-5">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" required placeholder="E-mail" id="email" name="email" aria-describedby="email">
                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="inputState">Department</label>
                        <select id="inputState" class="form-control" required id="department" name="department">
                            <option selected>Select</option>
                            <?php foreach ($department as $dp) : ?>
                                <option><?= $dp['department']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" name="tambah" class="btn btn-primary">Save</button>
                <a href="dashboard/student" class="btn btn-danger">Cancel</a>
            </div>
        </form>

    </div>
</div>