<div id="hero">
    <section class="page-section">
        <div class="container">
            <div class="card">
                <div class="text-center">
                    <h3 class="section-heading text-uppercase">Tracking Surat Online</h3>
                    <p class="section-subheading text-muted">Surat <b>Ditemukan</b>, Detail Dibawah:</p>
                </div>
                <div class="text-justify pl-5 pr-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-10">
                            <div class="row">
                                <div class="col-lg">
                                    <h3>Keterangan:</h3>
                                    <table class="table">

                                        <div class="table-responsive">
                                            <tr>
                                                <td>ID Pengajuan</td>
                                                <td>:</td>
                                                <td><?= $row['id_pengaju'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Pengaju</td>
                                                <td>:</td>
                                                <td><?= $row['nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIK</td>
                                                <td>:</td>
                                                <td><?= $row['nik'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>No Hp</td>
                                                <td>:</td>
                                                <td><?= $row['no_hp'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Surat</td>
                                                <td>:</td>
                                                <td><?= $kode[$row['id_surat']] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <td>
                                                    <b>
                                                        <?= $status[$row['status']] ?>
                                                    </b>
                                                </td>
                                            </tr>
                                            <?php if ($row['status'] == 2) { ?>
                                                <tr>
                                                    <td>Catatan</td>
                                                    <td>:</td>
                                                    <td><?= $row['catatan'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </div>
                                    </table>
                                    <div>
                                        <div class="checkout-wrap">
                                            <ul class="checkout-bar">

                                                <div class="card-header card-header-secondary">
                                                    <?php if ($row['status'] == '1') : ?>
                                                        <li class="active first">Pengajuan Surat<br>Pending</li>
                                                        <li class="">Dokumen<br>Diterima</li>
                                                        <li class="">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
                                                        <li class="">Sudah Diketik dan<br>Diparaf</li>
                                                        <li class="">Sudah Ditandatangani<br>Camat</li>
                                                        <li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
                                                    <?php elseif ($row['status'] == '2') : ?>
                                                        <li class="active first">Pengajuan Surat<br>Pending</li>
                                                        <li class="">Dokumen<br>Ditolak</li>
                                                        <h1 class="text-danger">MAAF PENGAJUAN ANDA DITOLAK KARENA SYARAT TIDAK TERPENUHI</h1>
                                                        <li>
                                                            <td>Catatan : <?= $row['catatan'] ?></td>
                                                        </li>
                                                    <?php elseif ($row['status'] == 3) : ?>
                                                        <li class="active first">Pengajuan Surat<br>Pending</li>
                                                        <li class="active">Dokumen<br>Diterima</li>
                                                        <li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
                                                        <li class="">Sudah Diketik dan<br>Diparaf</li>
                                                        <li class="">Sudah Ditandatangani<br>Camat</li>
                                                        <li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
                                                    <?php elseif ($row['status'] == '4') : ?>
                                                        <li class="active first">Pengajuan Surat<br>Pending</li>
                                                        <li class="active">Dokumen<br>Diterima</li>
                                                        <li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
                                                        <li class="active">Sudah Diketik dan<br>Diparaf</li>
                                                        <li class="">Sudah Ditandatangani<br>Camat</li>
                                                        <li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
                                                    <?php elseif ($row['status'] == '5') : ?>
                                                        <li class="active first">Pengajuan Surat<br>Pending</li>
                                                        <li class="active">Dokumen<br>Diterima</li>
                                                        <li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
                                                        <li class="active">Sudah Diketik dan<br>Diparaf</li>
                                                        <li class="active">Sudah Ditandatangani<br>Camat</li>
                                                        <li class="active">Selesai / Dapat Diambil<br>&nbsp;</li>
                                                    <?php endif; ?>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section><!-- End Hero -->
</main><!-- End #main -->