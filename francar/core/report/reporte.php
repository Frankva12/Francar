<?php
    require_once('../../core/libraries/fpdf/fpdf.php');

    class PDF extends FPDF

    {
        private $title;

        function head($title){
            $this->title = $title;
            $this->AddPage();
            $this->AliasNbPages();
        }

        function Header()
        {
            session_start();
            $this->Image('../../resources/img/libreriafrancarLogo.jpg', 15, 10, 60);
            $this->Cell(65, 13);
            $this->SetFont('Courier', 'B', 15);
            $this->SetTextColor(255, 2555, 255);
            $this->SetFillColor(29, 185, 84);
            $this->Cell(125,13, utf8_decode($this->title),0,0,'C', true);
            $this->Cell(125,13, utf8_decode($this->title),0,0,'C', true);
            $this->Ln(15);
        }

        function date()
        {
            $this->Ln(5);
            $this->SetFont('Courier', '', 10);
            $this->SetTextColor(0, 0, 0);
            $this->SetFillColor(255,255,255);
            $this->Cell(190,10, utf8_decode(date('G:i:s j/n/Y') ),0,0,'R', true);
            $this->Ln(15);
        }

        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Courier', 'B', 10);
            $this->Cell(0,10, utf8_decode('Pagina ').$this->PageNo(),0,0,'C' );
        }
    }