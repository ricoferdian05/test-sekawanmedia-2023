<?= $this->extend('templates/templates') ?>

<?= $this->section('content') ?>

<div class="container mt-3 mb-3 p-5">
    <div class="row rounded-5 shadow p-3">
        <div class="row mt-3 mb-3">
            <div class="col">
                <h2 class="text-center">Login</h2>
            </div>
        </div>
        <div class="row ps-5 pe-5 mb-3">
            <div class="col">
                <?php
                if (session()->getFlashdata('error')) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php }
                ?>
                <form action="<?= base_url('login/auth') ?>" method="post">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="email@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="password" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>