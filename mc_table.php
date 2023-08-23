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

function Row($arr_gambar,$data,$align,$arr_header,$column)
{
	//Calculate the height of the row
//        print_r ($arr_gambar);
	$nb=0;
	for($i=0;$i<count($data);$i++){
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        }
        if($arr_gambar[0]!=''){
            $h=65;
        }else{
            $h=5*$nb;
        }
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<$column;$i++)
	{
		$w=$this->widths[$i];
                    $a=isset($this->aligns[$i]) ? $this->aligns[$i] : $align[$i];
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
                
                $x2=$this->GetX();
                $x3=$this->GetX();
                $y3=$this->GetY();
                
		//Print the text
//                $this->SetFillColor($xR[$i],$xG[$i],$xB[$i]);
                $this->Rect($x,$y,$w,$h);
                if($i==1){
        		//Draw the border
//        		$this->Rect($x,$y,$w,$h);
                for ($j=0 ; $j < count($arr_gambar); $j++){
                    if($arr_gambar!=''){
                        $filename = $arr_gambar[$j];
                        getimagesize($filename);
                        //// Get new sizes
                        list($width, $height) = getimagesize($filename);
                        
                        if($width>$height){
                            $persen = (25*100)/($width*0.264583333);
                            $new_width = round(($persen/100)*($width*0.264583333));
                            $new_height = round(($persen/100)*($height*0.264583333));
                            
                            $center_x = 1;
                            $center_y = (40-$new_height)/2;
                        }elseif($width<$height){
                            $persen = (25*100)/($height*0.264583333);
                            $new_width = round(($persen/100)*($width*0.264583333));
                            $new_height = round(($persen/100)*($height*0.264583333));
                            
                            $center_x = 1;
                            $center_y = (40-$new_height)/2;
                        }elseif($width==$height){
                            $persen = (25*100)/($height*0.264583333);
                            $new_width = round(($persen/100)*($width*0.264583333));
                            $new_height = round(($persen/100)*($height*0.264583333));
                            
                            $center_x = 1;
                            $center_y = (40-$new_height)/2;
                        }
                        
                            
                        
                        $this->MultiCell($w,$new_height,$this->Image($arr_gambar[$j], $x2+$center_x, $y+$center_y, $new_width,$new_height),'','C');
                        
                    }
                    else{
//                        $this->Rect($x,$y,$w,$h);
                        $this->SetFont('arial','B',6);
                        $this->MultiCell($w,5,"",0,$a,0);
                        $this->SetFont('arial','',6);
                    }
                    $x2 = $x2 + (1.4*$x);
//                    print $x2;
//                    print $y+$center_y;
                }
                }
                else if($i == 0){
                   $this->MultiCell($w,5,$data[$i],0,$a,0);
                }
                else {
                  for ($b=2;$b<count($arr_header);$b++) {
                      $this->SetXY($x3, $y3);
                      $this->MultiCell(60, 5, $arr_header[$b], 0);

                      $this->SetXY($x3+18, $y3);
                      $this->MultiCell(60, 5, ":", 0);

                      $this->SetXY($x3+20, $y3);
                      $this->MultiCell(60, 5, $data[$b], 0);

                      $y3 = $y3+5;
                  }
            		//Draw the border
//            		$this->Rect($x,$y,$w,$h);
//                    $this->MultiCell($w,5,$data[$i],0,$a,0);
                }
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
}
?>