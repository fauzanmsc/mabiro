<!DOCTYPE html>
<html lang="en">

<?php include 'component/head.html'; ?>

<body>
    <?php include 'component/preloader.html'; ?>
    <?php include 'component/navbar-header.html'; ?>

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area text-center shadow theme-hard bg-fixed text-light" style="background-image: url(assets/img/banner/asrama.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Pengelola Asrama</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Team Us 
    ============================================= -->
    <div class="team-area default-padding relative">
  <div class="container"> <!-- Atau container-fluid -->
    <div class="team-items text-center">
      <div class="owl-carousel team-carousel owl-theme">
        <!-- Item 1 -->
        <div class="item">
          <div class="thumb">
            <img src="assets/img/team/photo-grey.png" alt="Thumb">
          </div>
          <div class="info-box">
            <div class="info">
              <h5>Dewi Hardiani</h5>
              <span>Kepala Biro Asrama</span>
            </div>
          </div>
        </div>

        <!-- Item 2 -->
        <div class="item">
          <div class="thumb">
            <img src="assets/img/team/photo-grey.png" alt="Thumb">
          </div>
          <div class="info-box">
            <div class="info">
              <h5>Miftahul Jannah</h5>
              <span>Unit Inventaris</span>
            </div>
          </div>
        </div>

        <!-- Item 3 -->
        <div class="item">
          <div class="thumb">
            <img src="assets/img/team/photo-grey.png" alt="Thumb">
          </div>
          <div class="info-box">
            <div class="info">
              <h5>Ermi</h5>
              <span>Unit Keuangan</span>
            </div>
          </div>
        </div>
        <!-- Tambah item sesuai kebutuhan -->
      </div>
    </div>
  </div>
</div>

    <!-- End Team Area -->
    <?php include 'component/navbar-bottom.html'; ?>
    <?php include 'component/script.html'; ?>

</body>
</html>