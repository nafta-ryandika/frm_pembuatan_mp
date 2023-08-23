<?php

include("../../configuration.php");
include("resize-class.php");

//file upload.php
   $fileName = $_FILES['picture']['name'];
   $fileSize = $_FILES['picture']['size'];
   $fileError = $_FILES['picture']['error'];
   
   if ($_FILES["picture"]["size"] > 2000000) {
    ?>
      <script type="text/javascript">
        <?php
        echo "alert('Upload gagal, file lebih dari 2 MB');";
        ?>
      </script>
    <?php
      die();
   }
  
    $t=time();
    $thn = date('dmY');
   
    $fileName = $_SESSION[$domainApp."_myxid"]."_".$thn.$t."_".str_replace(" ","_",$fileName);
   
   $success = false;
   if($fileSize > 0 || $fileError == 0){
     $move = move_uploaded_file($_FILES['picture']['tmp_name'], 'temp/'.$fileName); //atau ke directory yang dinginkan
     if($move){
	     $success = true;
     }
     list( $widthx,$heightx ) = getimagesize( 'temp/'.$fileName );
     $lebar = $widthx-($widthx*80/100);
     $tinggi = $heightx-($heightx*80/100);
     
     $resizeObj = new resize('temp/'.$fileName);

     // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
     $resizeObj -> resizeImage(600, 600, 'auto');

     // *** 3) Save image
     $resizeObj -> saveImage('temp/'.$fileName, 1000);
   }
?>
<script type="text/javascript">
<?php
  if($success){
    echo "parent.displayPicture('temp/$fileName','modal');";
  }else{
    echo "alert('Upload gagal');";
  }
?>
</script>
