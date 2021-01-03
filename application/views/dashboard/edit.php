<nav class="navbar navbar-dark bg-dark">
    <a href="#"><img src="<?= base_url() ?>assets/img/axiooLogo.png"></a>
    <form class="form-inline" method="POST" action="dashboard/index">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <a href="<?= base_url() ?>home/logout" class="btn btn-outline-primary ml-3 my-sm-0">sign-out</a>
    </form>
</nav>

<div class="sidebar" id="myDIV">
    <a href="<?= base_url() ?>dashboard" class="btn mt-2 active">Dashboard</a>
    <a href="<?= base_url() ?>dashboard/student" class="btn mt-2">Student</a>
</div>
<div class="content">
    <h2 class="mt-3">Edit</h2>
    <hr>
    <?= $this->session->flashdata('message'); ?>
    <div class="card ">
        <div class="card-header">
            <h2>Edit</h2>
        </div>
        <form method="POST" action="<?= base_url() ?>dashboard/edit/<?= $student['id']; ?>">
            <div class="row mt-4">
                <div class="col-5 ml-5">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" value="<?= $student['name']; ?>" placeholder="Name" id="name" name="name" required>
                        <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-5 ">
                    <label for="pnumber">Phone Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+62</div>
                        </div>
                        <input type="text" value="<?= $student['pnumber']; ?>" class="form-control" id="pnumber" name="pnumber" required id="pnumber" placeholder="Phone Number">
                    </div>
                    <?= form_error('pnumber', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-5 ml-5">
                    <div class="form-group">
                        <label for="school">School</label>
                        <input type="text" value="<?= $student['school']; ?>" class="form-control" placeholder="School" required id="school" name="school">
                        <?= form_error('school', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-5">
                    <label for="inputState">Grade</label>
                    <select id="inputState" class="form-control" id="grade" name="grade" required>
                        <option selected>Select</option>
                        <?php foreach ($grade as $gr) : ?>
                            <?php if ($student['grade'] == $gr['grade']) : ?>
                                <option value="<?= $gr['grade']; ?>" selected><?= $gr['grade']; ?></option>
                            <?php else : ?>
                                <option value="<?= $gr['grade']; ?>"><?= $gr['grade']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-5 ml-5">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" value="<?= $student['email']; ?>" required placeholder="E-mail" id="email" name="email" aria-describedby="email">
                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="inputState">Department</label>
                        <select id="inputState" class="form-control" required id="department" name="department">
                            <option selected>Select</option>
                            <?php foreach ($department as $dp) : ?>
                                <?php if ($student['department'] == $dp['department']) : ?>
                                    <option value="<?= $dp['department']; ?>" selected><?= $dp['department']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $dp['department']; ?>"><?= $dp['department']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" name="tambah" class="btn btn-primary">Save</button>
                <a href="<?= base_url() ?>dashboard/student" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>