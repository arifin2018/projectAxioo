<nav class="navbar navbar-dark bg-dark">
    <a href="#"><img src="<?= base_url() ?>assets/img/axiooLogo.png"></a>
    <form class="form-inline" method="POST" action="student">
        <input class="form-control mr-sm-2" type="search" placeholder="Search..." name="keyword">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <a href="<?= base_url() ?>home/logout" class="btn btn-outline-primary ml-3 my-sm-0">sign-out</a>
    </form>
</nav>

<div class="sidebar" id="myDIV">
    <a href="<?= base_url() ?>dashboard" class="btn mt-2 ">Dashboard</a>
    <a href="<?= base_url() ?>dashboard/student" class="btn mt-2 active">Student</a>
</div>

<div class="content">
    <div class="row">
        <div class="col">
            <h2 class="mt-3">Student</h2>
        </div>
        <div class="col">
            <div class="btn-group" role="group">
                <a href="<?= base_url() ?>dashboard/excel" class="btn btn-secondary text-center" id="exportExcel">exportExcel</a>
            </div>
        </div>
    </div>
    <hr>
    <?= $this->session->flashdata('message'); ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">School</th>
                <th scope="col">Grade</th>
                <th scope="col">Department</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($studentData as $stdnt) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $stdnt['name']; ?></td>
                    <td><?= $stdnt['school']; ?></td>
                    <td><?= $stdnt['grade']; ?></td>
                    <td><?= $stdnt['department']; ?></td>
                    <td>
                        <a href="<?= base_url() ?>dashboard/detail/<?= $stdnt['id'] ?>" class="btn btn-success">Detail</a>
                        <a href="<?= base_url() ?>dashboard/edit/<?= $stdnt['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url() ?>dashboard/deleteStudent/<?= $stdnt['id'] ?>" class="btn btn-danger tombol-hapus">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>