<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    
    <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('assets/img/bg_instansi.jpg');">
                <div class="hero-inner">
                <h2>Welcome, <?= $data_user['username'] ?>!</h2>
                <p class="lead">You almost arrived, complete the information about your account to complete registration.</p>
                <div class="mt-4">
                    <a href="<?= site_url('user/profil')?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-12 d-flex justify-content-center mt-3">
                <img src="<?= base_url('assets/img/deposit.jpg') ?>" alt="" width="50%">
                <img src="<?= base_url('assets/img/kredit.jpeg') ?>" alt="" width="50%">
            </div>
        </div>
    </div>
    </section>
</div>