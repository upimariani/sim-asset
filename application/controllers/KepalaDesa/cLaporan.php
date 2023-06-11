<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLaporan');
        $this->load->model('mKelolaData');
    }


    public function index()
    {
        $data = array(
            'asset' => $this->mLaporan->asset(),
            'pengajuan' => $this->mLaporan->pengajuan(),
            'kategori' => $this->mKelolaData->select_kategori()
        );
        $this->load->view('KepalaDesa/Layout/head');
        $this->load->view('KepalaDesa/Layout/aside');
        $this->load->view('KepalaDesa/vLaporan', $data);
        $this->load->view('KepalaDesa/Layout/footer');
    }
    public function cetak_laporan()
    {
        require('asset/fpdf/fpdf.php');

        // intance object dan memberikan pengaturan halaman PDF
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();


        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(200, 10, 'Lampiran', 0, 1, 'L');

        $pdf->SetFont('Times', 'B', 12);

        $pdf->Cell(200, 10, 'Berita Acara Inventarisasi Asset Desa', 0, 1, 'L');
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(200, 10, 'Nomor : ', 0, 1, 'L');
        $pdf->Cell(200, 10, 'Tanggal :' . date('d/m/Y'), 0, 1, 'L');

        $pdf->SetFont('Times', 'B', 13);
        $pdf->Cell(200, 10, 'LAPORAN HASIL INVENTARISASI (LHI) ASSET DESA', 0, 1, 'C');




        $pdf->Cell(10, 15, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(10, 7, 'NO', 1, 0, 'C');
        $pdf->Cell(35, 7, 'Jenis Barang', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Kode Barang', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Merk/Type', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Tahun Perolehan', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Nilai Perolehan (Rp)', 1, 1, 'C');

        $pdf->SetFont('Times', '', 9);
        $no = 1;
        $tot = 0;
        $kategori = $this->input->post('kategori');
        $asset = $this->mLaporan->asset_kategori($kategori);
        foreach ($asset as $key => $value) {
            $tot += $value->harga_asset;
            $pdf->Cell(10, 7, $no++, 1, 0, 'C');
            $pdf->Cell(35, 7, $value->nama_barang, 1, 0, 'C');
            $pdf->Cell(40, 7, $value->kode_asset, 1, 0, 'C');
            $pdf->Cell(30, 7, $value->merk, 1, 0, 'C');
            $pdf->Cell(30, 7, $value->tgl_peroleh, 1, 0, 'C');
            $pdf->Cell(40, 7, 'Rp.' . number_format($value->harga_asset), 1, 1, 'R');
        }


        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(185, 7, 'Jumlah: Rp.' . number_format($tot), 1, 1, 'R');

        $pdf->SetFont('Times', 'I', 9);
        $pdf->Cell(40, 7, '', 0, 1, 'C');
        $pdf->Cell(40, 7, '', 0, 1, 'C');
        $pdf->Cell(150, 7, 'Tim Inventarisasi', 0, 1, 'R');

        $pdf->Cell(150, 7, '1. Muniah', 0, 0, 'R');
        $pdf->Cell(30, 7, '............................', 0, 1, 'R');

        $pdf->Cell(150, 7, '2. Kiki Ahmad Nurijki', 0, 0, 'R');
        $pdf->Cell(30, 7, '............................', 0, 1, 'R');
        $pdf->Cell(150, 7, '3. Ira Mira', 0, 0, 'R');
        $pdf->Cell(30, 7, '............................', 0, 1, 'R');
        $pdf->Cell(150, 7, '4. Rahmat', 0, 0, 'R');
        $pdf->Cell(30, 7, '............................', 0, 1, 'R');
        $pdf->Cell(150, 7, '5. Dede D Sukandar', 0, 0, 'R');
        $pdf->Cell(30, 7, '............................', 0, 1, 'R');








        $pdf->Output();
    }
}

/* End of file cLaporan.php */
