<?php
$pdf = new FPDF("P", "cm", "A4");


$pdf->SetMargins(2, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetX(3);
$pdf->Image(base_url('assets/') . 'img/favicon.gif', 2, 0.5, 2, 2.5);
$pdf->SetX(7);
$pdf->SetFont('Times', 'B', 16);
$pdf->MultiCell(70, 0.5, 'PEMERINTAH KOTA PALEMBANG', 0, 'L');
$pdf->SetX(7.4);
$pdf->SetFont('Times', '', 12);
$pdf->MultiCell(19.6, 0.5, 'KECAMATAN SEMATANG BORANG', 0, 'L');
$pdf->SetFont('Times', '', 10);
$pdf->SetX(5);
$pdf->MultiCell(19.5, 0.5, 'Jl.DARMA BAKTI NO.01 RT.14, KELURAHAN SRIMULYA TELPON : 8361005', 0, 'L');
$pdf->SetX(9.9);
$pdf->MultiCell(19.5, 0.5, 'PALEMBANG', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->Line(1.3, 3.2, 19.8, 3.2);
$pdf->SetLineWidth(0.1);
$pdf->Line(1.3, 3.1, 19.8, 3.1);
$pdf->SetLineWidth(0);
// $pdf->ln(1);
$pdf->SetFont('Times', 'BU', 13);
$pdf->Cell(17, 0.7, $surat_keluar['keterangan'], 0, 10, 'C');
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(17, 0.7, 'Nomor : ' . $surat_keluar['no_surat'], 0, 10, 'C');
// $pdf->Cell($pdf->GetStringWidth("Observations"), 0, "Observations", 0, "L");
$pdf->ln(1);
$pdf->SetFont('Times', '', 12);
// $pdf->Cell(5, 0.7, "Palembang : " . date("d/m/Y"), 0, 0, 'C');

$pdf->Cell(17, 0.7, $surat_keluar['isi_surat'], 0, 10, 'C');
$pdf->ln(1);
$pdf->SetFont('Times', '', 10);

// $pdf->Output($surat_keluar['no_surat']);
$pdf->SetFont('Times', '', 10);



$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(20, 0.7, "Palembang," . date("d-m-Y"), 0, 10, 'C');
$pdf->ln(1);
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(20, 0.7, "Produser", 0, 10, 'C');
$pdf->ln(1);


// $pdf->Output("berita-" . $lihat['tanggal'] . ".pdf", "I");
$pdf->Output();
