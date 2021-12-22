  <section class="breadcrumbs">
      <div class="container">

          <div class="d-flex justify-content-between align-items-center">
              <h2>Daftar Pelayanan yang dapat diajukan</h2>
              <ol>
                  <li><a href="<?= base_url('home') ?>">Home</a></li>
                  <li>Pengajuan Pembuatan Surat</li>
              </ol>
          </div>

      </div>
  </section><!-- End Breadcrumbs -->
  <section class="section-bg">
      <div class="contact" id="contact">
          <div class="container">
              <?php if ($this->session->flashdata('success') == TRUE) : ?>
                  <?= $this->session->flashdata('success'); ?>
              <?php endif; ?>
              <?php if ($this->session->flashdata('warning') == TRUE) : ?>
                  <?= $this->session->flashdata('warning'); ?>
              <?php endif; ?>
              <div class="row">
                  <div class="col-lg-4" data-aos="fade-right">
                      <div class="section-title">
                          <h2>Surat Yang Dapat diajukan Warga</h2>
                      </div>
                  </div>
                  <!-- data surat yang dapat diajukan -->
                  <div class="col-lg-8 mb-3" data-aos="fade-up" data-aos-delay="100">

                      <!-- daftar surat yang dapat diajukan -->
                      <div class="info">
                          <a href="" data-toggle="modal" data-target="#ketMiskin">
                              <i class="icofont-file-alt"></i>

                              <h4>Surat Keterangan miskin</h4>
                              <!-- persyaratan -->
                              <p class="font-weight-bold">Persyaratan : </p>
                              <p class="font-weight">Scan KTP</p>
                              <p class="font-weight">Scan KK</p>
                              <p class="font-weight">Surat pengantar Lurah</p>
                              <p class="font-weight">Surat Pernyataan</p>
                          </a>
                      </div>
                      <div class="info">
                          <i class="icofont-file-alt"></i>
                          <a href="" data-toggle="modal" data-target="#skTidakMampu">
                              <h4>Surat Keterangan Tidak Mampu</h4>
                          </a>
                          <p class="font-weight-bold">Persyaratan : </p>
                          <p class="font-weight">Scan KTP</p>
                          <p class="font-weight">Scan KK</p>
                          <p class="font-weight">Surat Pengantar Lurah</p>
                          <p class="font-weight">Surat Pernyataan</p>
                      </div>
                      <div class="info">
                          <a href="" data-toggle="modal" data-target="#skBelumPunyaRumah">
                              <i class="icofont-file-alt"></i>

                              <h4>Surat Keterangan Belum Punya Rumah</h4>
                              <!-- persyaratan -->
                              <p class="font-weight-bold">Persyaratan : </p>
                              <p class="font-weight">Scan KTP</p>
                              <p class="font-weight">Scan KK</p>
                              <p class="font-weight">Surat pengantar Lurah</p>
                          </a>
                      </div>
                      <div class="info">
                          <a href="" data-toggle="modal" data-target="#skUsaha">
                              <i class="icofont-file-alt"></i>
                              <h4>Surat Keterangan Usaha</h4>
                              <p class="font-weight-bold">Persyaratan : </p>
                              <!-- persyaratan -->
                              <p class="font-weight">Scan KTP</p>
                              <p class="font-weight">Scan KK</p>
                              <p class="font-weight">Surat pengantar Lurah</p>
                              <p class="font-weight">Surat permohonan</p>

                          </a>
                      </div>
                      <div class="info">
                          <i class="icofont-file-alt"></i>
                          <a href="" data-toggle="modal" data-target="#skDomisiliPerusahaan">
                              <h4>Surat Keterangan Domisili Perusahaan</h4>
                          </a>
                          <p class="font-weight-bold">Persyaratan : </p>
                          <!-- persyaratan -->
                          <p class="font-weight">Surat Kepemilikan Tanah</p>
                          <p class="font-weight">Surat Rekomendasi Lembaga</p>
                          <p class="font-weight">Surat Domisili</p>
                          <p class="font-weight">Surat Pengantar Lurah</p>
                          <p class="font-weight">PBB Lunas</p>
                          <p class="font-weight">Akte Notaris</p>
                          <p class="font-weight">Scan KTP</p>
                          <p class="font-weight">Scan KK</p>
                      </div>
                      <div class="info">
                          <a href="" data-toggle="modal" data-target="#rekomenNikah">
                              <i class="icofont-file-alt"></i>

                              <h4>Surat Rekomendasi Nikah</h4>
                              <p class="font-weight-bold">Persyaratan : </p>
                              <!-- persyaratan -->
                              <p class="font-weight">Scan KTP</p>
                              <p class="font-weight">Scan KK</p>
                              <p class="font-weight">Surat pengantar Lurah</p>
                              <p class="font-weight">Surat Pengantar Nikah (N1 - N4)</p>
                              <p class="font-weight">Surat Keterangan Belum Menikah</p>
                          </a>
                      </div>
                      <div class="info">
                          <i class="icofont-file-alt"></i>
                          <a href="" data-toggle="modal" data-target="#skDomisili">
                              <h4>Surat Keterangan Domisili</h4>
                          </a>
                          <p class="font-weight-bold">Persyaratan : </p>
                          <p class="font-weight">Scan KTP</p>
                          <p class="font-weight">Scan KK</p>
                          <p class="font-weight">Surat Pengantar Lurah</p>
                      </div>
                      <div class="info">
                          <i class="icofont-file-alt"></i>
                          <a href="" data-toggle="modal" data-target="#skPenghasilan">
                              <h4>Surat Keterangan Penghasilan</h4>
                          </a>
                          <p class="font-weight-bold">Persyaratan : </p>
                          <p class="font-weight">Scan KTP</p>
                          <p class="font-weight">Scan KK</p>
                          <p class="font-weight">Surat Pengantar Lurah</p>
                      </div>
                      <div class="info">
                          <i class="icofont-file-alt"></i>
                          <a href="" data-toggle="modal" data-target="#skOrgSama">
                              <h4>Surat Keterangan Orang yang Sama</h4>
                          </a>
                          <p class="font-weight-bold">Persyaratan : </p>
                          <p class="font-weight">Scan KTP</p>
                          <p class="font-weight">Scan KK</p>
                          <p class="font-weight">Scan Akte Kelahiran</p>
                          <p class="font-weight">Surat Pengantar Lurah</p>
                      </div>
                      <div class="info">
                          <i class="icofont-file-alt"></i>
                          <a href="" data-toggle="modal" data-target="#spCerai">
                              <h4>Surat Pengantar Cerai</h4>
                          </a>
                          <p class="font-weight-bold">Persyaratan : </p>
                          <p class="font-weight">Scan KTP</p>
                          <p class="font-weight">Scan KK</p>
                          <p class="font-weight">Surat Pernyataan</p>
                          <p class="font-weight">Surat Pengantar Lurah</p>
                      </div>
                      <div class="info">
                          <i class="icofont-file-alt"></i>
                          <a href="" data-toggle="modal" data-target="#spSKCK">
                              <h4>Surat Pengantar SKCK</h4>
                          </a>
                          <p class="font-weight-bold">Persyaratan : </p>
                          <p class="font-weight">Scan KTP</p>
                          <p class="font-weight">Scan KK</p>
                          <p class="font-weight">Surat Pernyataan</p>
                          <p class="font-weight">Surat Pengantar Lurah</p>
                      </div>
                      <div class="info">
                          <i class="icofont-file-alt"></i>
                          <a href="" data-toggle="modal" data-target="#spIzinKeramaian">
                              <h4>Surat Pengantar Izin Keramaian</h4>
                          </a>
                          <p class="font-weight-bold">Persyaratan : </p>
                          <p class="font-weight">Scan KTP</p>
                          <p class="font-weight">Scan KK</p>
                          <p class="font-weight">Surat Pengantar Lurah</p>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </section>


  <!-- Modal Pengajuan -->

  <!-- surat keterangan miskin -->
  <div class=" modal fade" id="ketMiskin" tabindex="-1" aria-labelledby="ketMiskinLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="ketMiskinLabel">Surat Keterangan Miskin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <!-- <form action="<?php base_url('home/skm') ?>" method="post" enctype="multipart/form-data"> -->

              <?php echo form_open_multipart('home/skm'); ?>

              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Email </label>
                      <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Keperluan</label>
                      <input type="text" class="form-control" id="keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pernyataan</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pernyataan" id="pernyataan" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <?= form_error('pengantar', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('ktp', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('kk', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('pernyataan', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- surat keterangan Tidak Mampu -->
  <div class=" modal fade" id="skTidakMampu" tabindex="-1" aria-labelledby="skTidakMampuLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="skTidakMampuLabel">Surat Keterangan Tidak Mampu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open_multipart('home/sktm'); ?>

              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Email </label>
                      <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Keperluan</label>
                      <input type="text" class="form-control" id="keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pernyataan</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pernyataan" id="pernyataan" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <?= form_error('pengantar', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('ktp', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('kk', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('pernyataan', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- surat belum punya rumah-->
  <div class=" modal fade" id="skBelumPunyaRumah" tabindex="-1" aria-labelledby="skBelumPunyaRumahLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="skBelumPunyaRumahLabel">Surat Keterangan Belum Punya Rumah</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open_multipart('home/skbpr'); ?>

              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Email </label>
                      <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Keperluan</label>
                      <input type="text" class="form-control" id="keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <?= form_error('pengantar', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('ktp', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('kk', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('pernyataan', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- surat Keterangan usaha-->
  <div class=" modal fade" id="skUsaha" tabindex="-1" aria-labelledby="skUsahaLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="skUsahaLabel">Surat Keterangan Usaha</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open_multipart('home/sku'); ?>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Email </label>
                      <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Keperluan</label>
                      <input type="text" class="form-control" id="keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Usaha</label>
                      <input type="text" class="form-control" id="nm_usaha" name="nm_usaha">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat Usaha</label>
                      <input type="text" class="form-control" id="almt_usaha" name="almt_usaha">
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Permohonan</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="permohonan" id="permohonan" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <?= form_error('pengantar', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('permohonan', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('ktp', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('kk', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- surat Keterangan domisili perusahaan-->
  <div class=" modal fade" id="skDomisiliPerusahaan" tabindex="-1" aria-labelledby="skDomisiliPerusahaanLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="skDomisiliPerusahaanLabel">Surat Keterangan Domisili perusahaan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open_multipart('home/skdp'); ?>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Email </label>
                      <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Keperluan</label>
                      <input type="text" class="form-control" id="keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Perusahaan</label>
                      <input type="text" class="form-control" id="nm_perusahaan" name="nm_perusahaan">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat Lengkap Perusahaan</label>
                      <input type="text" class="form-control" id="almt_perusahaan" name="almt_perusahaan">
                  </div>

                  <div class="form-group">
                      <label class="label-control">Surat Kepemilikan Tanah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="spt" id="spt" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Rekomendasi Lembaga</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="srl" id="srl" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Domisili</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="domisili" id="domisili" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">PBB Lunas</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pbb" id="pbb" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Akte Notaris</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="notaris" id="notaris" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <?= form_error('pengantar', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('permohonan', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('ktp', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('kk', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Surat Untuk Menikah -->
  <div class=" modal fade" id="rekomenNikah" tabindex="-1" aria-labelledby="rekomenNikahLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="rekomenNikahLabel">Surat Rekomendasi Menikah</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open_multipart('home/skn'); ?>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Email </label>
                      <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Mempelai Pria</label>
                      <input type="text" class="form-control" id="mpria" name="mpria">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Mempelai Wanita</label>
                      <input type="text" class="form-control" id="mwanita" name="mwanita">
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Nikah (N1 - N4)</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pnikah" id="pnikah" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Keterangan Belum Menikah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="skbn" id="skbn" />
                              </span>
                          </div>
                      </div>
                  </div>

                  <?= form_error('file_surat', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>


  <!-- surat keterangan Domisili -->
  <div class=" modal fade" id="skDomisili" tabindex="-1" aria-labelledby="skDomisiliLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="skDomisiliLabel">Surat Keterangan Domisili</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open_multipart('home/skd'); ?>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Email </label>
                      <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Keperluan</label>
                      <input type="text" class="form-control" id="keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>

                  <?= form_error('pengantar', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('ktp', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('kk', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- surat keterangan Penghasilan -->
  <div class=" modal fade" id="skPenghasilan" tabindex="-1" aria-labelledby="skPenghasilanLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="skPenghasilanLabel">Surat Keterangan Penghasilan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open_multipart('home/skp'); ?>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Email </label>
                      <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Keperluan</label>
                      <input type="text" class="form-control" id="keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pernyataan</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pernyataan" id="pernyataan" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <?= form_error('pengantar', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('pernyataan', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('ktp', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('kk', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>
  <!-- surat keterangan Orang yang sama -->
  <div class=" modal fade" id="skOrgSama" tabindex="-1" aria-labelledby="skOrgSamaLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="skOrgSamaLabel">Surat Keterangan Orang yang Sama</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open_multipart('home/skos'); ?>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Email </label>
                      <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Keperluan</label>
                      <input type="text" class="form-control" id="keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Yang dipakai</label>
                      <input type="text" class="form-control" id="nm_pakai" name="nm_pakai">
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan Akte Kelahiran</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="akte_kelahiran" id="akte_kelahiran" />
                              </span>
                          </div>
                      </div>
                  </div>

                  <?= form_error('pengantar', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('akte_kelahiran', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('ktp', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('kk', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- surat Pengantar Cerai -->
  <div class=" modal fade" id="spCerai" tabindex="-1" aria-labelledby="spCeraiLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="spCeraiLabel">Surat Pengantar Cerai</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open_multipart('home/spc'); ?>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Email </label>
                      <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Keperluan</label>
                      <input type="text" class="form-control" id="keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pernyataan</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pernyataan" id="pernyataan" />
                              </span>
                          </div>
                      </div>
                  </div>

                  <?= form_error('pengantar', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('pernyataan', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('ktp', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('kk', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>
  </div>
  <!-- surat Pengantar SKCK -->
  <div class=" modal fade" id="spSKCK" tabindex="-1" aria-labelledby="spSKCKLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="spSKCKLabel">Surat Pengantar SKCK</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open_multipart('home/spskck'); ?>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Email </label>
                      <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Keperluan</label>
                      <input type="text" class="form-control" id="keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pernyataan</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pernyataan" id="pernyataan" />
                              </span>
                          </div>
                      </div>
                  </div>

                  <?= form_error('pengantar', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('pernyataan', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('ktp', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('kk', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Surat pengantar izin keramaian -->
  <div class=" modal fade" id="spIzinKeramaian" tabindex="-1" aria-labelledby="spIzinKeramaianLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="spIzinKeramaianLabel">Surat Pengantar Izin Keramaian</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open_multipart('home/spik'); ?>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="bmd-label-floating">Nik</label>
                      <input type="text" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Nama Pengaju</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">

                      <label class="bmd-label-floating">Nomor Hp </label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Email </label>
                      <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat </label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                          <option value="">Pilih Kelurahan</option>
                          <?php foreach ($kelurahan as $k) : ?>
                              <option value="<?= $k['id_kelurahan']; ?>"><?= $k['nm_kelurahan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RT</label>
                      <input type="number" class="form-control" id="rt" name="rt">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">RW</label>
                      <input type="number" class="form-control" id="rw" name="rw">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Keperluan</label>
                      <input type="text" class="form-control" id="keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Alamat Lengkap Keramaian </label>
                      <input type="text" class="form-control" id="almt_keramaian" name="almt_keramaian">
                  </div>

                  <div class="form-group">
                      <label class="label-control">Scan KTP</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="ktp" id="ktp" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Scan KK</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="kk" id="kk" />
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="label-control">Surat Pengantar Lurah</label>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-outline-success btn-file">
                                  <input type="file" name="pengantar" id="pengantar" />
                              </span>
                          </div>
                      </div>
                  </div>

                  <?= form_error('pengantar', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('ktp', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <?= form_error('kk', '<div clasbtn btn-outline-success">', '</div>'); ?>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                      <button type="Submit" class="btn btn-success">Ajukan</button>
                  </div>
              </div>
              </form>
          </div>
      </div>
  </div>


  <section class="page-section">

  </section>
  </main><!-- End #main -->