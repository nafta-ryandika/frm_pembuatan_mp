<?php
  include("../../connection.php");

  if(isset($_POST['inkdcust'])){
    $inkdcust = trim($_POST['inkdcust']);
  }
  if(isset($_POST['inartprod'])){
    $inartprod = trim($_POST['inartprod']);
  }
  if(isset($_POST['inxgambar_1'])){
    $inxgambar_1 = trim($_POST['inxgambar_1']);
  }

  function random($length = 1) {
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }
?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#inkdcustx").val('<?=$inkdcust?>');
    $("#inartprodx").val('<?=$inartprod?>');
    $("#inxgambar").val('<?=$inxgambar_1?>');
  })
</script>

<table id="tabelfrmgambar" width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <fieldset class="info_fieldset"><legend>Form Input Gambar</legend>
        <input type="hidden" id="inxgambar"/>
        <!-- <input type="hidden" id="inid_gambar"/> -->
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="top" width="30%">
              <iframe name="upload-frame" id="upload-frame" style="display:none;"></iframe>
              <form id="formupload" name="formupload" method="POST" enctype="multipart/form-data" action="upload.php" target="upload-frame" onsubmit="startUpload();">
                <label style="padding-left: 0px;"> Picture : </label><input id="picture" name="picture" type="file" value="<?=$inxgambar_1?>" onchange="submitclick()" />
                <br/>
                <br/>
                <INPUT id="cmdSaveImage" class="buttonadd" type="button" name="cmdSaveImage" value="Save" onclick="saveImage()">
                <INPUT id="cmdDeleteImage" class="buttondelete" type="button" name="cmdDeleteImage" value="Delete" onclick="deleteImage()">
              </form>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="70%" align="left">
                <div id="uploaded-picture" style="border:4px black inset;width: 120px;height: 120px;">
                  <?php
                    if ($inxgambar_1 != "") {
                  ?>
                      <img src="<?php echo "$inxgambar_1"."?".random() ?>" style="width: 120px; height: 120px;">  
                  <?php
                    }
                    else{
                  ?>
                      <img src="gambar/No_Image_Available.jpg" style="width: 120px; height: 120px;">
                  <?php
                    }
                  ?>
                </div>
            </td>
          </tr>    
        </table>
      </fieldset>
    </td>
  </tr>
</table>