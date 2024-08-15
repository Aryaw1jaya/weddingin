<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class LaporanOrder extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A3');
        // membuat halaman baru
        $pdf->AddPage();  
        $pdf->Image('images/logo/weddingin.png',10,10,50);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'',0,1,'C');
        $pdf->Cell(280,7,'',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,7,'Laporan Order',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(7,6,'Id',1,0,'C');
        $pdf->Cell(35,6,'Invoice',1,0,'C');
        $pdf->Cell(25,6,'Date',1,0,'C');
        $pdf->Cell(40,6,'Name',1,0,'C');
        $pdf->Cell(165,6,'Address',1,0,'C');
        $pdf->Cell(30,6,'Phone',1,0,'C');
        $pdf->Cell(28,6,'Wedding date',1,0,'C');
        $pdf->Cell(15,6,'Status',1,0,'C');
        $pdf->Cell(25,6,'Total',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $orders = $this->db->get('orders')->result();
        foreach ($orders as $row){
            $pdf->Cell(7,6,$row->id,1,0);
            $pdf->Cell(35,6,$row->invoice,1,0);
            $pdf->Cell(25,6,$row->date,1,0);
            $pdf->Cell(40,6,$row->name,1,0); 
            $pdf->Cell(165,6,$row->address,1,0); 
            $pdf->Cell(30,6,$row->phone,1,0);
            $pdf->Cell(28,6,$row->wedding_date,1,0); 
            $pdf->Cell(15,6,$row->status,1,0); 
            $pdf->Cell(25,6,$row->total,1,1); 
        }
        $pdf->Output();
    }
}

?>