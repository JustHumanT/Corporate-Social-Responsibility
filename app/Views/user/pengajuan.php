<?= $this->extend('templates/templateuser') ?>

<?= $this->section('navuser'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">



<body style="background-image: url(assets/img/hero-bg.png);">



  <!-- Section: Design Block -->
  <section class="background-radial-gradient overflow-hidden">
    <style>
      .background-radial-gradient {
        background-image: url(assets/img/hero-bg.png);
      }

      #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        background: radial-gradient(#5766ee, #0018ed);
        overflow: hidden;
      }

      #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(#5766ee, #0018ed);
        overflow: hidden;
      }

      .teks-color {
        /* make a gradient text color */
        background: linear-gradient(180deg, #7a73ee, #2f00ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }

      .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.8) !important;
        backdrop-filter: saturate(200%) blur(25px);
      }
    </style>

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5" data-aos="fade-up">
      <div class="row gx-lg-5 align-items-center mb-5 mt-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight teks-color">
            CSR<br />
            <span>Tambahkan <br />Pengajuan</span>
          </h1>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">

              <?php if (session()->getFlashdata('vall')) : ?>
                <div class="card text-bg-danger mb-3" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Submit Gagal</h5>
                    <div class="text-red-500">
                      <?= session()->getFlashdata('vall'); ?>
                    </div>
                  </div>
                </div>
              <?php endif ?>


              <form action="/pengajuan/save" method="post" enctype="multipart/form-data">
                <?php csrf_field(); ?>
                <!-- 2 column grid layout with text inputs for the first and last names -->

                <div class="form-outline mb-4">
                  <label class="form-label" for="usulan">Usulan</label>
                  <input type="text" id="usulan" name="usulan" class="form-control" value="<?= old('usulan'); ?>">
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="kategori">Kategori</label>
                      <select class="form-select" aria-label="Default select example" id="kategori" name="kategori" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" value="<?= old('kategori'); ?>">

                        <option value="Usulan Kecamatan">Usulan Kecamatan</option>
                        <option value="Usulan SKPD">Usulan SKPD</option>
                        <option value="Usulan Dewan">Usulan Dewan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="volume">Volume</label>
                      <input type="text" id="volume" name="volume" class="form-control <?= ($validation->hasError('volume')) ? 'is-invalid' : ''; ?>" value="<?= old('volume'); ?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="satuan">Satuan</label>
                      <input type="text" id="satuan" name="satuan" class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>" value="<?= old('satuan'); ?>">
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="pagu">Pagu</label>
                      <input type="text" id="pagu" name="pagu" class="form-control <?= ($validation->hasError('pagu')) ? 'is-invalid' : ''; ?>" value="<?= old('pagu'); ?>">
                    </div>
                  </div>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="lokasi">Lokasi</label>
                  <input type="text" id="lokasi" name="lokasi" class="form-control <?= ($validation->hasError('pagu')) ? 'is-invalid' : ''; ?>" value="<?= old('lokasi'); ?>">
                </div>

                <div class="row">
                  <div class="col-md-8 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="filez">Pilih File</label>
                      <div class="input-group mb-3">
                        <input type="file" class="form-control" id="filez" name="filez" value="<?= old('filez'); ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block btn-lg mb-4">
                  Tambahkan
                </button>

                <!-- Register buttons -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->



</body>

</html>




<?= $this->endSection(); ?>