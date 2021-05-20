<?php
class Cetak extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    function index($id)
    {
        $data['surat_keluar'] = $this->db->get_where('surat_keluar', ['id' => $id]);


        $pdf = new FPDF("P", "cm", "A4");


        $pdf->SetMargins(2, 1, 1);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetX(3);
        $pdf->Image(base_url('assets/') . 'img/favicon.gif', 1, 1, 2, 2);
        $pdf->SetX(7);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->MultiCell(40, 0.5, 'PEMERINTAH KOTA PALEMBANG', 0, 'L');
        $pdf->SetX(7);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->MultiCell(19.5, 0.5, 'KECAMATAN SEMATANG BORANG', 0, 'L');
        $pdf->SetFont('Times', 'B', 10);
        $pdf->SetX(4);
        $pdf->MultiCell(19.5, 0.5, 'Jl.DARMA BAKTI NO.01 RT.14, KELURAHAN SRIMULYA TELPON : 8361005', 0, 'L');
        $pdf->SetX(4);
        $pdf->MultiCell(19.5, 0.5, 'PALEMBANG', 0, 'L');
        $pdf->SetX(4);
        $pdf->MultiCell(19.5, 0.5, '', 0, 'L');
        $pdf->Line(1, 3.1, 28.5, 3.1);
        $pdf->SetLineWidth(0.1);
        $pdf->Line(1, 3.2, 28.5, 3.2);
        $pdf->SetLineWidth(0);
        $pdf->ln(1);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(25.5, 0.7, "Laporan Berita", 0, 10, 'C');
        $pdf->ln(1);
        $pdf->SetFont('Times', 'B', 10);
        $pdf->Cell(5, 0.7, "Palembang : " . date("d/m/Y"), 0, 0, 'C');
        $pdf->ln(1);
        $pdf->SetFont('Times', 'B', 10);

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
        $pdf->Cell(40, 0.7, "Palembang," . date("d-m-Y"), 0, 10, 'C');
        $pdf->ln(1);
        $pdf->MultiCell(19.5, 0.5, '', 0, 'L');
        $pdf->MultiCell(19.5, 0.5, '', 0, 'L');
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell(40, 0.7, "Produser", 0, 10, 'C');
        $pdf->ln(1);


        // $pdf->Output("berita-" . $lihat['tanggal'] . ".pdf", "I");
        $pdf->Output();
    }
}
