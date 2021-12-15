<?php

$pdf = new FPDF("P", "cm", "A4");

$pdf->SetMargins(5, 1.7, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
// $pdf->SetX(1);
// $pdf->Cell(70, 1, '', 0, 'L');
$pdf->SetX(3);
// $pdf->Image(base_url('assets/') . 'img/favicon.gif', 2, ukuran dari atas, lebar gambar, 2.5);
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

$pdf->SetX(4);
$pdf->Cell(19.5, 0.5, '', 0, 'L');
$pdf->Line(1.3, 4, 19.8, 4);
$pdf->SetLineWidth(0.1);
$pdf->Line(1.3, 3.9, 19.8, 3.9);
$pdf->SetLineWidth(0);
// $pdf->ln(1);

$pdf->SetX(3.1);
$pdf->Cell(15, 0.7, "", 0, 10, 'C');
$pdf->SetFont('Times', 'BU', 16);
$pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
// $pdf->Cell($pdf->GetStringWidth("Observations"), 0, "Observations", 0, "L");
$pdf->ln(0.5);

// $pdf->SetFont('Times', '', 12);
// $pdf->Cell(5, 0.7, "Palembang : " . date("d/m/Y"), 0, 0, 'C');
// Begin with regular font
// $pdf->SetFont('Arial', '', 14);
// $pdf->Write(5, 'Visit ');
// Then put a blue underlined link
// $pdf->SetTextColor(0, 0, 255);
// $pdf->SetFont('', 'U');
// $pdf->Write(5,  $surat['isi_surat'], 'http://www.fpdf.org');$pdf->SetX(5);

// $pdf->MultiCell(17, 0.5,, 0, 10, 'L');
// $pdf->ln(1);
// $pdf->SetFont('Times', '', 12);

// $pdf->Output($surat['no_surat']);
$pdf->SetFont('Times', '', 12);
$pdf->SetX(1.5);
$pdf->MultiCell(18, 1, "     Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
// if ($surat['pembuka'] == true) {

//     $pdf->SetX(1.7);
//     $pdf->MultiCell(18, 0.5, "     " . $surat['pembuka'], 0, 'L');
//     $pdf->MultiCell(19.5, 0.5, '', 0, 'L');
// } else {
//     $pdf->MultiCell(19.5, 0.5, '', 0, 'L');
// }

$pdf->SetX(3);
$pdf->MultiCell(19, 0.5, '            Nama             : ' . $surat['nama'], 0, 'L');
$pdf->SetX(3);
$pdf->MultiCell(19, 0.5, '            NIK               : ' . $surat['nik'], 0, 'L');
$pdf->SetX(3);
// $pdf->MultiCell(19, 1, '      Alamat           : ' . $surat['alamat'], 0, 'L');
$pdf->MultiCell(19, 0.5, '            Alamat           : ' . $surat['alamat'] . " RT/RW" . $surat['rt'] . "/" . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
$pdf->SetX(3);
$pdf->MultiCell(19, 0.5, '            Keterangan    : ' . $surat['keterangan'], 0, 'L');
$pdf->MultiCell(19, 0.5, '', 0, 'L');

$pdf->SetX(1.7);
$pdf->MultiCell(18, 1, "     Yang bersangkutan adlaah benar warga kami yang beralamat seperti diatas, berdasarkan Surat Keterangan dari Lurah No. " . $surat['no_pengantar'] . " tanggal " . $surat['tgl_pengantar'] . " bahwa keluarga yang bersangkutan keadaaan ekonominya masuk dalam kategori Masyarakat/Keluarga Miskin", 0, 'L');
$pdf->SetX(1.7);
$pdf->MultiCell(18, 1, "     Surat Keterangan ini diperlukan untuk " . $surat['keterangan'], 0, 'L');
$pdf->SetX(1.7);
$pdf->MultiCell(18, 1, "Demikian surat ini dibuat dengan sebenarnya untuk menjadikan periksa dan guna seperlunya.", 0, 'L');
// $pdf->Cell(15, 0.7, "", 0, 10, 'C');

$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->SetFont('Times', 'B', 11);


$pdf->SetX(2.7);
$pdf->Cell(27, 0.7, "Palembang, " . date("d-m-Y"), 0, 10, 'C');
// $pdf->ln(1);
// $pdf->MultiCell(19.5, 1, '', 0, 'L');
// $pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(27, 0.7, "Mengetahui Camat", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, $profile['camat'], 0, 10, 'C');
$pdf->ln(1);


// $pdf->Output("berita-" . $lihat['tanggal'] . ".pdf", "I");
$pdf->Output();
