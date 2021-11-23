<?php


$pdf = new FPDF("P", "cm", "A4");


$pdf->SetMargins(5, 1.7, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
// $pdf->SetX(1);
// $pdf->Cell(70, 0.5, '', 0, 'L');
$pdf->SetX(3);
// $pdf->Image(base_url('assets/') . 'img/favicon.gif', 2, ukuran dari atas, lebar gambar, 2.5);
$pdf->Image(base_url('assets/') . 'img/favicon.gif', 2, 1.3, 2.3, 2.5);
$pdf->SetX(7);
$pdf->SetFont('Times', 'B', 16);
$pdf->MultiCell(70, 0.5, 'PEMERINTAH KOTA PALEMBANG', 0, 'L');
$pdf->SetX(8.2);
$pdf->SetFont('Times', 'B', 12);
$pdf->MultiCell(20, 0.5, 'KECAMATAN ' . $profile['kecamatan'], 0, 'L');
$pdf->SetFont('Times', 'B', 9);
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
$pdf->SetFont('Times', 'BU', 14);
$pdf->Cell(15, 0.7, $surat_keluar['keterangan'], 0, 10, 'C');
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(15, 0.7, 'Nomor : ' . $surat_keluar['no_surat'], 0, 10, 'C');
// $pdf->Cell($pdf->GetStringWidth("Observations"), 0, "Observations", 0, "L");
$pdf->ln(1);

// $pdf->SetFont('Times', '', 12);
// $pdf->Cell(5, 0.7, "Palembang : " . date("d/m/Y"), 0, 0, 'C');
// Begin with regular font
// $pdf->SetFont('Arial', '', 14);
// $pdf->Write(5, 'Visit ');
// Then put a blue underlined link
// $pdf->SetTextColor(0, 0, 255);
// $pdf->SetFont('', 'U');
// $pdf->Write(5,  $surat_keluar['isi_surat'], 'http://www.fpdf.org');$pdf->SetX(5);

// $pdf->MultiCell(17, 0.5,, 0, 10, 'L');
// $pdf->ln(1);
// $pdf->SetFont('Times', '', 12);

// $pdf->Output($surat_keluar['no_surat']);
$pdf->SetFont('Times', '', 12);
if ($surat_keluar['pembuka'] == true) {

    $pdf->SetX(1.7);
    $pdf->MultiCell(18, 0.5, "     " . $surat_keluar['pembuka'], 0, 'L');
    $pdf->MultiCell(19.5, 0.5, '', 0, 'L');
} else {
    $pdf->MultiCell(19.5, 0.5, '', 0, 'L');
}

$pdf->SetX(2);
$pdf->MultiCell(19, 0.5, 'Nama             : ' . $surat_keluar['nama'], 0, 'L');
$pdf->SetX(2);
$pdf->MultiCell(19, 0.5, 'NIK               : ' . $surat_keluar['nik'], 0, 'L');
$pdf->SetX(2);
$pdf->MultiCell(19, 0.5, 'Alamat           : ' . $surat_keluar['alamat'], 0, 'L');
$pdf->SetX(2);
$pdf->MultiCell(19, 0.5, 'Keterangan    : ' . $surat_keluar['keterangan'], 0, 'L');
$pdf->MultiCell(19, 0.5, '', 0, 'L');

$pdf->SetX(1.7);
$pdf->MultiCell(18, 0.5, "     " . $surat_keluar['penutup'], 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->SetFont('Times', 'B', 11);


$pdf->SetX(3);
$pdf->Cell(27, 0.7, "Palembang, " . date("d-m-Y"), 0, 10, 'C');
// $pdf->ln(1);
// $pdf->MultiCell(19.5, 0.5, '', 0, 'L');
// $pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(27, 0.7, "Mengetahui Camat", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, $profile['camat'], 0, 10, 'C');
$pdf->ln(1);


// $pdf->Output("berita-" . $lihat['tanggal'] . ".pdf", "I");
$pdf->Output();
