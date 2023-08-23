<?php
require('../../fpdf16/fpdf.php');

class PDF_MC_Table extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,2,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

/**
 * Draws text within a box defined by width = w, height = h, and aligns
 * the text vertically within the box ($valign = M/B/T for middle, bottom, or top)
 * Also, aligns the text horizontally ($align = L/C/R/J for left, centered, right or justified)
 * drawTextBox uses drawRows
 *
 * This function is provided by TUFaT.com
 */
function drawTextBox($strText, $w, $h, $align='L', $valign='T', $border=true)
{
    $xi=$this->GetX();
    $yi=$this->GetY();
    
    $hrow=$this->FontSize;
    $textrows=$this->drawRows($w, $hrow, $strText, 0, $align, 0, 0, 0);
    $maxrows=floor($h/$this->FontSize);
    $rows=min($textrows, $maxrows);

    $dy=0;
    if (strtoupper($valign)=='M')
        $dy=($h-$rows*$this->FontSize)/2;
    if (strtoupper($valign)=='B')
        $dy=$h-$rows*$this->FontSize;

    $this->SetY($yi+$dy);
    $this->SetX($xi);

    $this->drawRows($w, $hrow, $strText, 0, $align, false, $rows, 1);

    if ($border)
        $this->Rect($xi, $yi, $w, $h);
}

function drawRows($w, $h, $txt, $border=0, $align='J', $fill=false, $maxline=0, $prn=0)
{
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r", '', $txt);
    $nb=strlen($s);
    if($nb>0 && $s[$nb-1]=="\n")
        $nb--;
    $b=0;
    if($border)
    {
        if($border==1)
        {
            $border='LTRB';
            $b='LRT';
            $b2='LR';
        }
        else
        {
            $b2='';
            if(is_int(strpos($border, 'L')))
                $b2.='L';
            if(is_int(strpos($border, 'R')))
                $b2.='R';
            $b=is_int(strpos($border, 'T')) ? $b2.'T' : $b2;
        }
    }
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $ns=0;
    $nl=1;
    while($i<$nb)
    {
        //Get next character
        $c=$s[$i];
        if($c=="\n")
        {
            //Explicit line break
            if($this->ws>0)
            {
                $this->ws=0;
                if ($prn==1) $this->_out('0 Tw');
            }
            if ($prn==1) {
                $this->Cell($w, $h, substr($s, $j, $i-$j), $b, 2, $align, $fill);
            }
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border && $nl==2)
                $b=$b2;
            if ( $maxline && $nl > $maxline )
                return substr($s, $i);
            continue;
        }
        if($c==' ')
        {
            $sep=$i;
            $ls=$l;
            $ns++;
        }
        $l+=$cw[$c];
        if($l>$wmax)
        {
            //Automatic line break
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
                if($this->ws>0)
                {
                    $this->ws=0;
                    if ($prn==1) $this->_out('0 Tw');
                }
                if ($prn==1) {
                    $this->Cell($w, $h, substr($s, $j, $i-$j), $b, 2, $align, $fill);
                }
            }
            else
            {
                if($align=='J')
                {
                    $this->ws=($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
                    if ($prn==1) $this->_out(sprintf('%.3F Tw', $this->ws*$this->k));
                }
                if ($prn==1){
                    $this->Cell($w, $h, substr($s, $j, $sep-$j), $b, 2, $align, $fill);
                }
                $i=$sep+1;
            }
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border && $nl==2)
                $b=$b2;
            if ( $maxline && $nl > $maxline )
                return substr($s, $i);
        }
        else
            $i++;
    }
    //Last chunk
    if($this->ws>0)
    {
        $this->ws=0;
        if ($prn==1) $this->_out('0 Tw');
    }
    if($border && is_int(strpos($border, 'B')))
        $b.='B';
    if ($prn==1) {
        $this->Cell($w, $h, substr($s, $j, $i-$j), $b, 2, $align, $fill);
    }
    $this->x=$this->lMargin;
    return $nl;
}
function isine($ket,$nmbrg,$nmsupp,$calc,$qty,$nstn){
  $this->SetFont('Arial','',6);
  $this->Cell(4,4,"","LB",0,'R');
  $this->Cell(34,4,$ket,"LB",0,'L');
  $this->Cell(80,4,$nmbrg,"LB",0,'L');
  $this->Cell(44,4,$nmsupp,"LB",0,'L');
  $this->Cell(9,4,$calc,"LB",0,'R');
  $this->Cell(10,4,$qty,"LB",0,'R');
  $this->Cell(9,4,$nstn,"LRB",0,'C');
  $this->ln();
}

function bawahe($special,$keterangan,$y){
  $this->SetY($y);
  $this->SetFont('Arial', '', 7);
  $this->Cell(95,4,"Special Instruction :","BT",0,'L');
  $this->Cell(95,4,"Keterangan :","LBT",0,'L');
  $this->Ln();
  $this->Cell(95,4,"","R",0,'L');
  $this->Ln();
  $this->SetFont('Arial','',6);
  $this->MultiCell(95,3,$special,"R");
  $y1 = $this->GetY();
  $this->SetXY(105,$y+8);
  $this->MultiCell(95,3,$keterangan,"L");
  $y2 = $this->GetY();
  if($y1>=$y2){
    $ybawah = $y1;
  }elseif($y2>$y1){
    $ybawah = $y2;
  }
  $this->SetY($ybawah);
  $this->Cell(95,4,"","RB",0,'L');
  $this->Cell(95,4,"","LB",0,'L');
  $this->Ln();

}
function prepapp($userby,$approvby){
  $this->SetY(253);
  $this->Cell(190,4,"",0,0,'C');
  $this->Ln();
  $this->Cell(24,4,"Prepared By","LBT",0,'C');
  $this->Cell(24,4,"Approved By","LBT",0,'C');
  $this->Cell(142,4,"","LR",0,'L');
  $this->ln();
  $this->Cell(24,10,"","LR",0,"L");
  $this->Cell(24,10,"","R",0,"L");
  $this->Cell(142,10,"","R",0,"L");
  $this->ln();
  $this->Cell(24,3,$userby,"LB",0,'C');
  $this->Cell(24,3,$approvby,"LB",0,'C');
  $this->Cell(20,3,"","LB",0,'C');
  $this->Cell(122,3,"","RB",0,'C');
  $this->ln();
}
function headnya(){
  $this->SetFont('Arial', '', 8);
  $this->Cell(4,4,"No","LBT",0,'C');
  $this->Cell(34,4,"SHOE PARTS","LBT",0,'C');
  $this->Cell(80,4,"Material Description","LBT",0,'C');
  $this->Cell(44,4,"Supplier","LBT",0,'C');
  $this->Cell(9,4,"Calc","LBT",0,'C');
  $this->Cell(10,4,"Qty","LBT",0,'C');
  $this->Cell(9,4,"Unit","RLBT",0,'C');
  $this->ln();
}
function garisluar(){
  $this->Rect(10,20,190,237,'D');
}
}
?>
