<?php
include("../../connection.php");

if(isset($_POST['innomp'])){
  $innomp = strtoupper($_POST['innomp']);
}
if(isset($_POST['innoso'])){
  $innoso = strtoupper($_POST['innoso']);
}
if(isset($_POST['inkdassort'])){
  $inkdassort = strtoupper($_POST['inkdassort']);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Form View</title>
</head>
<body>
    <table style="width: 100%">
    <tr>
      <td>
        <label style="width: 107px;">No. PO</label>
        <input id="innopo" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 120px" onkeydown="" readonly>
        <text style="margin-left:107px;">Tgl. Terima PO</text>
        <input id="intglpo" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 80px" placeholder = "dd/mm/YYYY" readonly ></input>
      </td>
      <td rowspan="6" style="width: 55%" valign="top">
        <table border="0" align="center" style="margin: 5px">
          <tr>
            <td align="center"><span id="33">S.33</span></td>
            <td align="center"><span id="34">S.34</span></td>
            <td align="center"><span id="35">S.35</span></td>
            <td align="center"><span id="36">S.36</span></td>
            <td align="center"><span id="37">S.37</span></td>
            <td align="center"><span id="38">S.38</span></td>
            <td align="center"><span id="39">S.39</span></td>
            <td align="center"><span id="40">S.40</span></td>
            <td align="center"><span id="41">S.41</span></td>
            <td align="center"><span id="42">S.42</span></td>
            <td align="center"><span id="43">S.43</span></td>
            <td align="center"><span id="44">S.44</span></td>
            <td align="center" rowspan="2"><span id="">Total Order</span></td>
          </tr>
          <tr>
            <td>
              <input id="indord33" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord34" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord35" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord36" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord37" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord38" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord39" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord40" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord41" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord42" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord43" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord44" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
          </tr>
          <tr>
            <td align="center"><span id="33s">S.33s</span></td>
            <td align="center"><span id="34s">S.34s</span></td>
            <td align="center"><span id="35s">S.35s</span></td>
            <td align="center"><span id="36s">S.36s</span></td>
            <td align="center"><span id="37s">S.37s</span></td>
            <td align="center"><span id="38s">S.38s</span></td>
            <td align="center"><span id="39s">S.39s</span></td>
            <td align="center"><span id="40s">S.40s</span></td>
            <td align="center"><span id="41s">S.41s</span></td>
            <td align="center"><span id="42s">S.42s</span></td>
            <td align="center"><span id="43s">S.43s</span></td>
            <td align="center"><span id="44s">S.44s</span></td>
          </tr>
          <tr>
            <td>
              <input id="indord33s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord34s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord35s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord36s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord37s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord38s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord39s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord40s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord41s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord42s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord43s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="indord44s" class="textbox" type="text" name="intype_1" value="" maxlength="7" style="width: 40px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="0" readonly>
            </td>
            <td>
              <input id="intotord" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 70px; text-align:center;"  align="center" onkeyup="" Placeholder="0" readonly>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <label style="width: 107px;">Category</label>
        <input id="inkdjenis" class="textbox" type="hidden" name="intype" value="" maxlength="10" style="width: 120px" onkeydown="" >
        <input id="incategory" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 120px" onkeydown=""  readonly>
        <text style="margin-left:90px;">Tgl. Kirim Sepatu</text>
        <input id="intglkirim" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 80px" placeholder = "dd/mm/YYYY" readonly ></input>
      </td>
    </tr>
    <tr>
      <td> 
        <label style="width: 107px;">Nama Barang</label>
        <input id="innmbrg" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 403px" onkeydown="" readonly >
      </td>
    </tr>
  </table>
</body>

</html>
<?php
mysql_close($conn);
?>
