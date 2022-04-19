<?php

$pdf = new FPDF("P", "cm", "legal");

$pdf->SetMargins(5, 2, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetX(3);
$pdf->Image(base_url('assets/') . 'img/favicon.gif', 2, 1.3, 2.3, 2.5);
$pdf->SetX(7);
$pdf->SetFont('Times', 'B', 16);
$pdf->MultiCell(70, 0.5, 'PEMERINTAH KOTA PALEMBANG', 0, 'L');
$pdf->SetX(7.4);
$pdf->SetFont('Times', 'B', 14);
$pdf->MultiCell(20, 0.5, 'KECAMATAN SEMATANG BORANG', 0, 'L');
$pdf->SetFont('Times', '', 10);
$pdf->SetX(5);
$pdf->MultiCell(19.3, 0.5, $profile['lokasi'], 0, 'L');
$pdf->SetX(10.6);
$pdf->MultiCell(19.5, 0.5, 'PALEMBANG', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');

$pdf->SetX(4);
$pdf->Cell(19.5, 0.5, '', 0, 'L');
$pdf->Line(1.3, 4, 19.8, 4);
$pdf->SetLineWidth(0.1);
$pdf->Line(1.3, 3.9, 19.8, 3.9);
$pdf->SetLineWidth(0);
// $pdf->ln(1);
if ($surat['id_surat'] == 'SKM') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "     Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Nama             : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            NIK               : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    // $pdf->MultiCell(19, 1, '      Alamat           : ' . $surat['alamat'], 0, 'L');
    $pdf->MultiCell(19, 1, '            Alamat           : ' . $surat['alamat'] . " RT/RW" . $surat['rt'] . "/" . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Keterangan    : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bersangkutan adlaah benar warga kami yang beralamat seperti diatas, berdasarkan Surat Keterangan dari Lurah No. " . $surat['no_pengantar'] . " tanggal " . $surat['tgl_pengantar'] . " bahwa keluarga yang bersangkutan keadaaan ekonominya masuk dalam kategori Masyarakat/Keluarga Miskin", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "     Surat Keterangan ini diperlukan untuk " . $surat['keterangan'], 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
} else if ($surat['id_surat'] == 'SKTM') {

    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Nama             : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            NIK               : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    // $pdf->MultiCell(19, 1, '      Alamat           : ' . $surat['alamat'], 0, 'L');
    $pdf->MultiCell(19, 1, '            Alamat           : ' . $surat['alamat'] . " RT/RW" . $surat['rt'] . "/" . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Keterangan    : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bersangkutan adlaah benar warga kami yang beralamat seperti diatas, berdasarkan Surat Keterangan dari Lurah No. " . $surat['no_pengantar'] . " tanggal " . $surat['tgl_pengantar'] . " bahwa keluarga yang bersangkutan keadaaan ekonominya masuk dalam kategori Masyarakat/Keluarga Tidak Mampu", 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat Keterangan ini diperlukan untuk " . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
} else if ($surat['id_surat'] == 'SKBPR') {

    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Nama             : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            NIK               : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    // $pdf->MultiCell(19, 1, '      Alamat           : ' . $surat['alamat'], 0, 'L');
    $pdf->MultiCell(19, 1, '            Alamat           : ' . $surat['alamat'] . " RT/RW" . $surat['rt'] . "/" . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Keterangan    : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bersangkutan adlaah benar warga kami yang beralamat seperti diatas, berdasarkan Surat Keterangan dari Lurah No. " . $surat['no_pengantar'] . " tanggal " . $surat['tgl_pengantar'] . " bahwa benar yang bersangkutan belum punya rumah sendiri", 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat Keterangan ini diperlukan untuk " . $surat['keterangan'], 0, 'L');


    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat Keterangan dinyatakan tidak berlaku apabila terjadi pelanggaran peraturan Perundang-undangan serta apabila terdapat kekeliruan/kesalahan dalam pembuatannya, pemohon/pemegang bersedia mempertanggung jawabkan secara hukum tanpa melibatkan pihak manapun", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}


if ($surat['id_surat'] == 'SPSKCK') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Nama             : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            NIK               : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Alamat           : ' . $surat['alamat'] . " RT/RW" . $surat['rt'] . "/" . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Keterangan    : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bersangkutan adlaah benar warga kami yang beralamat seperti diatas, berdasarkan Surat Keterangan dari Lurah No. " . $surat['no_pengantar'] . " tanggal " . $surat['tgl_pengantar'] . " dan pengakuannya, bahwa dengan ini yang bersangkutan :", 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            1. Berkehidupan baik dalam kehidupan bermasyarakat ', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            2. Tidak tersangkut perkara kriminal dengan instansi kepolisian', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            3. Tidak dalam status tahanan berwajib', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            4. Tidak terlibat pengunaan obat-obat terlarang', 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, '       Surat Keterangan ini diperlukan untuk ' . $surat['keterangan'] . '.', 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat Keterangan dinyatakan tidak berlaku apabila terjadi pelanggaran peraturan Perundang-undangan serta apabila terdapat kekeliruan/kesalahan dalam pembuatannya, pemohon/pemegang bersedia mempertanggung jawabkan secara hukum tanpa melibatkan pihak manapun.", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}

if ($surat['id_surat'] == 'SKN') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          1.  Nama                     : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          2.  NIK                       : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          3.  Tempat Tinggal    : ' . $surat['alamat'] . " RT/RW" . $surat['rt'] . "/" . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          4.  Keterangan            : ' . $surat['keterangan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          5.  Status Perkawinan        : Belum Menikah', 0, 'L');

    $pdf->SetX(3);


    $pdf->SetX(2);
    $pdf->MultiCell(19, 1, "Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}

if ($surat['id_surat'] == 'SKDP') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "Kecamatan Sematang Borang bersama ini menerangkan bahwa :", 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Nama                     : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          NIK                       : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Tempat Tinggal    : ' . $surat['alamat'] . " RT/RW" . $surat['rt'] . "/" . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Keterangan            : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, 'Benar mempunyai perusahaan yang berdomisili dalam wilayah kelurahan ' . $surat['nm_kelurahan'] . ' Kecamatan Sematang Borang Kota Palembang dengan keterangan sebagai berikut :', 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Nama Perusahaan                     : ' . $surat['nm_perusahaan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Alamat                        : ' . $surat['almt_perusahaan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Akte Pendiri    : ', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Bergerak dibidang    : ', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Jumlah Pegawai    : ', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Jam Kerja    : ', 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat keterangan ini dikeluarkan kepada yang bersangkutan untuk 1 (satu) kali keperluan pengurusan izin tempat usaha. Wajib diperbaharui apabila sudah terdapat hal yang tidak sesuai dengan surat ini.", 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat keterangan ini tidak berlaku apablia terjadi pelanggaran pepraturan perundang-undangan/peraturan daerah kota palembang dan atau kekeliruan/kesalahan dalam pembuatananya.", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}



$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->SetFont('Times', 'B', 11);


$pdf->SetX(2.7);
$pdf->Cell(27, 0.7, "Palembang, " . date("d-m-Y"), 0, 10, 'C');
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(27, 0.7, "Mengetahui Camat", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, $profile['camat'], 0, 10, 'C');
$pdf->ln(1);

$pdf->Output();
