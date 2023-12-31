<nav class="navbar navbar-expand-lg bg-info-subtle">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('agreement') ?>"><img src="https://api.dicebear.com/7.x/identicon/svg?seed=Angel" alt="avatar" width="30" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('agreement') ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('transaksi') ?>">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger" href="<?= base_url('logout') ?>">Logout</a>
                </li>
            </ul>
            <div class="col d-flex justify-content-end">
                <b><?= $dataUser['nama_user'] ?> | <?= $dataUser['role_name'] ?></b>
            </div>
        </div>
    </div>
</nav>