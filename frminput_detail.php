<?php
  include("../../configuration.php");
  include("../../connection.php");

  include("connection/connection.php");

  if(isset($_POST['hxid'])){
    $hxid = strtoupper($_POST['hxid']);
  }
  if(isset($_POST['hkdtiket'])){
    $hkdtiket = strtoupper($_POST['hkdtiket']);
  }

  $sql = "select a.hxid, a.hkdtiket, a.hartikel, a.hartikel_kmbs, a.hlast, a.hcolour, a.hgambar, a.hstatus, a.href_material 
          from factory.ratiket_h a 
          where a.hxid = '".$hxid."'";
  $result=mysql_query($sql,$conn_33);
  while ($data = mysql_fetch_array($result, MYSQL_BOTH)){
    $hxid = trim($data["hxid"]);
    $hkdtiket = trim($data["hkdtiket"]);
    $hartikel = trim($data["hartikel"]);
    if (strlen($hartikel) > 15) {
      $hartikel = substr($hartikel, 0, 15);
    }
    $hartikel_kmbs = trim($data["hartikel_kmbs"]);
    if (strlen($hartikel_kmbs) > 10) {
      $hartikel_kmbs = substr($hartikel_kmbs, 0, 10);
    }
    $hlast = trim($data["hlast"]);
    $hcolour = trim($data["hcolour"]);
    $hgambar = $data["hgambar"]; 
    $hstatus = trim($data["hstatus"]);
    $href_material = trim($data["href_material"]);
  }
?>
<link rel="stylesheet" href="css/table.css">

<script type="text/javascript">
</script>

<fieldset class="info_fieldset"><legend>Form input</legend>
  <input id="innompx" class="textbox" type="hidden" name="intype" value="<?=$innompx?>">

  <fieldset class="info_fieldset" style="1px 1px 1px 1px;">
    <legend>Header MP 
      <input id="cmdeditheader" class="buttonedit" type="button" name="nmcmdeditheader" value="Edit Header" onclick="edit('header')" style="margin-left: 5px;">
      <input id="instatusheader" class="textbox" type="hidden" name="intype" value="0">
    </legend>
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">

      <div style="text-align: center;">
          <input id="cmdIssued" class="buttonup" type="button" name="nmcmdIssued" value="Issued" onclick="issued()" style="margin: auto;">
          <br />
      </div>
       <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td style="width: 60%;">
          <label>No. MP</label>
          <input id="innomp" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 120px" onkeydown="" >
          <text style="margin-left:149px;">Tgl. MP</text>
          <input id="intglmp" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 80px;" placeholder = "dd/mm/YYYY" readonly ></input>
        </td>
        <td valign="top" rowspan="8">
          <table id="tabelfrmgambar" width=""  border="0" cellspacing="0" cellpadding="0" style="display: none;">
            <tr>
              <td>
              <fieldset class="info_fieldset"><legend>Gambar</legend>
                <!-- <input type="hidden" id="inxgambar_1" value="../frmTiket/<?=$hgambar?>" /> -->
                <input type="hidden" id="inxgambar_1" value="../../../factory/frm/frmTiket/<?=$hgambar?>" />
                <table width="100%">
                  <tr>
                    <td>
                      <div id="uploaded-picture_1" style="border:4px black inset;width: 120px; height: 120px;" onclick="openDialog('gambar',''); displayPicture('../../../factory/frm/frmTiket/<?=$hgambar?>','');">
                        <!-- <img src="../frmTiket/<?=$hgambar?>" style="width: 120px; height: 120px;"> -->
                        <img src="../../../factory/frm/frmTiket/<?=$hgambar?>" style="width: 120px; height: 120px;">
                      </div>
                    </td>
                  </tr>
                </table>
              </fieldset>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <label>No. MC</label>
          <input id="innomc" class="textbox" type="text" name="intype" value="~auto~" maxlength="20" style="width: 185px; text-align: center;" disabled>
          <text style="margin-left:41px;">Tgl. Issued MP</text>
          <input id="intglissuedmp" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 80px;" placeholder = "dd/mm/YYYY" readonly ></input>
        </td>
      </tr>
      <tr>
        <td>
          <label>Customer</label>
          <input id="inkdcust" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 120px" onkeydown="check(event,'customer')" > 
          <input id="innmcust" class="textbox" type="text" name="intype" value="" maxlength="30" style="width: 274px" readonly>
        </td>
      </tr>
      <tr>
        <td>
          <label>Brand</label>
          <input id="inkdbrand" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 120px" onkeydown="check(event,'brand')" disabled> 
          <input id="innmbrand" class="textbox" type="text" name="intype" value="" maxlength="30" style="width: 274px" readonly disabled>
        </td>
      </tr>
      <tr>
        <td>
          <label>Art. Produksi</label>
          <input id="inartprod" class="textbox" type="text" name="intype" value="<?=$hartikel_kmbs?>" maxlength="10" style="width: 250px">
        </td>
      </tr>
      <tr>
        <td>
          <label>Art. Customer</label>
          <input id="inartcust" class="textbox" type="text" name="intype" value="<?=$hartikel?>" maxlength="15" style="width: 250px">
        </td>
      </tr>
      <tr>
        <td>
          <label>Warna</label>
          <input id="inwarna" class="textbox" type="text" name="intype" value="<?=$hcolour?>" maxlength="30" style="width: 250px">
        </td>
      </tr>
      <tr>
        <td>
          <label>Shoe Heel</label>
          <input id="inshoeheel" class="textbox" type="text" name="intype" value="" maxlength="60" style="width: 250px">
          <!-- <img src="img/search.png" onclick="openDialog('shoeheel','')" style="cursor: pointer; vertical-align: center;" title="Search Shoe Heel"> -->
        </td>
      </tr>
      <tr>
        <td>
          <label>Shoe Last</label>
          <input id="inshoelast" class="textbox" type="text" name="intype" value="<?=$hlast?>" maxlength="30" style="width: 250px">
          <!-- <img src="img/search.png" onclick="openDialog('shoelast','')" style="cursor: pointer; vertical-align: center;" title="Search Shoe Last"> -->
        </td>
      </tr>
      <tr>
        <td>
          <label>SKU</label>
          <input id="insku" class="textbox" type="text" name="intype" value="<?=$href_material?>" maxlength="60" style="width: 250px" readonly="">
          <input id="inskux" class="textbox" type="hidden" name="intype" value="" maxlength="60" style="width: 250px" readonly="">
          <!-- <img src="img/delete_1.png" onclick="clearinput('sku')" style="cursor: pointer; vertical-align: center;" class="deletesku" title="Delete SKU">
          <img src="img/search.png" onclick="openDialog('sku','')" style="cursor: pointer; vertical-align: center;" class="addsku" title="Search SKU"> -->
        </td>
      </tr>
    </table>

    <fieldset class="info_fieldset"><legend>Sales Order</legend>
      <table style="width: 100%;">
        <tr>
          <td>
            <table>
              <tr>
                <td>
                  <label style="width: 107px; padding-left: 33px;">No. SO</label>
                  <input id="innoso" class="textbox" type="text" name="intype" value="" maxlength="" style="width: 120px" onkeydown="check(event,'salesorder')" >
                  <text style="margin-left: 20px;">Assortment</text>
                  <select name="inkdassort" id="inkdassort" onkeypress="" onchange="change();">
                    <option value="" selected> PILIH </option>
                    <?php
                    $sql = "SELECT kdassort, nmassort FROM clsizeassort";
                    $result = mysql_query($sql,$conn);
                    while ($data = mysql_fetch_array($result)) {
                      ?>
                      <option value="<?php echo $data["kdassort"]?>"><?php echo $data["kdassort"]?></option>;
                      <?php
                    }
                    ?>
                  </select>
                  <span id="innmassort" style="color: green;"></span>
                  <text style="margin-left: 20px;">Kode SO</text>
                  <input id="inkdbrg" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 200px" onkeydown="" readonly>
                  <input id="cmdFindKdbrg" class="buttonfind" type="button" name="nmFindKdbrg" value="Search" onclick="openDialog('kdbrg','')" style="margin-left: 20px;">
                  <!-- <input id="cmdAddKdbrg" class="buttongofind" type="button" name="nmAddKdbrg" value="Add" onclick="add('salesorder')" style="margin-left: 20px;"> -->
                  <input id="cmdRemoveSO" class="buttondelete" type="button" name="nmRemoveSO" value="Delete" onclick="remove('salesorder')" style="margin-left: 20px;">
                </td>
              </tr>
              <tr>
                <td>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <fieldset class="info_fieldset">
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
                    <!-- <label style="width: 107px;">Tgl. Kirim Sepatu</label>
                    <input id="insltglmp" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 80px" placeholder = "dd/mm/YYYY" readonly ></input> -->
                    <!-- <label style="width: 107px;">Tgl. Issued MP</label>
                    <input id="insltglmp" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 80px" placeholder = "dd/mm/YYYY" readonly ></input>
                    <text style="margin-left:130px;">Tgl. Kirim Sepatu</text>
                    <input id="insltglmp" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 80px" placeholder = "dd/mm/YYYY" readonly ></input> -->
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
                <!-- <tr>
                  <td>
                    <label style="width: 107px;">Nama Supplier</label>
                    <input id="innomp" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 403px" onkeydown="" >
                  </td>
                </tr> -->
              </table>
            </fieldset>
          </td>
        </tr>
      </table>
    </fieldset>
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
          <div align="center">
            <input id="cmdSaveHeader" class="buttonadd" type="button" name="nmcmdSaveHeader" value="Save" onclick="saveclick('header')">
            <input id="cmdCancelHeader" class="buttondelete" type="button" name="nmcmdCancelHeader" value="Cancel" onclick="lock('header')">
          </div>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</fieldset>

    <br/>
<fieldset class="info_fieldset">
  <legend>Detail MP
    <input id="cmdeditdetail" class="buttonedit" type="button" name="nmcmdeditdetail" value="Edit Detail" onclick="edit('detail')" style="margin-left: 5px;">
    <input id="instatusdetail" class="textbox" type="hidden" name="intype" value="0">
  </legend>
    <table id="myTable_detailMP" class="table">
      <thead>
        <tr>
          <th align="center" width="3%">No.</th>
          <th align="center" width="20%">Component</th>
          <th align="center" width="22%">Material</th>
          <th align="center" width="20%">Supplier</th>
          <!-- <th align="center" width="5%">Calc (Tiket)</th> -->
          <th align="center" width="5%">Calc</th>
          <th align="center" width="5%">Qty</th>
          <th align="center" width="5%">Unit</th>
          <th align="center" width="5%">Ambil</th>
          <th align="center" width="5%">Back Order</th>
          <th align="center" width="5%">...</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT ket FROM kmmstpkj ORDER BY pkj LIMIT 5";
          $result = mysql_query($sql,$conn);
          $no = 0;
          while ($data = mysql_fetch_array($result)) {
            $no++;

            if ($hxid != "") {
              $sql_1 = "select
                        dt1.dpkj, dt1.dbaris, dt3.subpkj, dt1.dcomponent,
                        if (dt2.sttcost = 1,
                          (case 
                            when dt2.fix = 1 then if(dt2.material_1 = '' or dt2.material_1 is null, dt1.dmaterial, dt2.material_1) 
                            when dt2.fix = 2 then if(dt2.material_2 = '' or dt2.material_2 is null, dt1.dmaterial, dt2.material_2)
                            when dt2.fix = 3 then if(dt2.material_3 = '' or dt2.material_3 is null, dt1.dmaterial, dt2.material_3)
                            when dt2.fix = 4 then if(dt2.material_4 = '' or dt2.material_4 is null, dt1.dmaterial, dt2.material_4)
                            when dt2.fix = 5 then if(dt2.material_5 = '' or dt2.material_5 is null, dt1.dmaterial, dt2.material_5)
                          end ),
                          dt1.dmaterial) as material,
                        if (dt2.sttcost = 1,
                          (case 
                            when dt2.fix = 1 then if(dt2.unit_1 = '' or dt2.unit_1 is null, dt1.dunit, dt2.unit_1) 
                            when dt2.fix = 2 then if(dt2.unit_2 = '' or dt2.unit_2 is null, dt1.dunit, dt2.unit_2)
                            when dt2.fix = 3 then if(dt2.unit_3 = '' or dt2.unit_3 is null, dt1.dunit, dt2.unit_3)
                            when dt2.fix = 4 then if(dt2.unit_4 = '' or dt2.unit_4 is null, dt1.dunit, dt2.unit_4)
                            when dt2.fix = 5 then if(dt2.unit_5 = '' or dt2.unit_5 is null, dt1.dunit, dt2.unit_5)
                          end ),
                          dt1.dunit) as unit,
                        if (dt2.sttcost = 1,
                          (case 
                            when dt2.fix = 1 then if(dt2.calc_prod_1 = '' or dt2.calc_prod_1 is null, dt2.calc_prod_tiket, dt2.calc_prod_1) 
                            when dt2.fix = 2 then if(dt2.calc_prod_2 = '' or dt2.calc_prod_2 is null, dt2.calc_prod_tiket, dt2.calc_prod_2)
                            when dt2.fix = 3 then if(dt2.calc_prod_3 = '' or dt2.calc_prod_3 is null, dt2.calc_prod_tiket, dt2.calc_prod_3)
                            when dt2.fix = 4 then if(dt2.calc_prod_4 = '' or dt2.calc_prod_4 is null, dt2.calc_prod_tiket, dt2.calc_prod_4)
                            when dt2.fix = 5 then if(dt2.calc_prod_5 = '' or dt2.calc_prod_5 is null, dt2.calc_prod_tiket, dt2.calc_prod_5)
                          end ),
                          dt2.calc_prod_tiket) as calc,
                        if (dt2.sttcost = 1,
                          (case 
                            when dt2.fix = 1 then if(dt2.supplier_1 = '' or dt2.supplier_1 is null, '', dt2.supplier_1) 
                            when dt2.fix = 2 then if(dt2.supplier_2 = '' or dt2.supplier_2 is null, '', dt2.supplier_2)
                            when dt2.fix = 3 then if(dt2.supplier_3 = '' or dt2.supplier_3 is null, '', dt2.supplier_3)
                            when dt2.fix = 4 then if(dt2.supplier_4 = '' or dt2.supplier_4 is null, '', dt2.supplier_4)
                            when dt2.fix = 5 then if(dt2.supplier_5 = '' or dt2.supplier_5 is null, '', dt2.supplier_5)
                          end ),
                          '') as supplier,
                        (select e.nmbrg from DBKMBS.kmmstbhnbaku e where e.kdbrg = material) as nmbrg,
                        (select f.nmsupp from DBKMBS.kmmstsupp f where f.kdsupp = supplier) as nmsupp, dt1.dremark
                        from
                        (
                          select b.dxid, b.dxidh, b.dpkj, b.dbaris, b.dcomponent, b.dmaterial, b.dunit, b.dremark
                          from factory.ratiket_d b 
                          where b.dxidh = '".$hxid."' and b.dpkj = '".$no."' 
                          order by b.dpkj, b.dbaris
                        )dt1
                        left join
                        (
                          select c.idtiketh, c.idtiketd, c.calc_prod_tiket, c.sttcost,c.material_1, c.material_2, c.material_3, c.material_4,
                               c.material_5, c.unit_1, c.unit_2, c.unit_3, c.unit_4, c.unit_5, c.calc_prod_1, c.calc_prod_2, c.calc_prod_3,
                               c.calc_prod_4, c.calc_prod_5, c.supplier_1, c.supplier_2, c.supplier_3, c.supplier_4, c.supplier_5, c.fix
                          from factory.racosting c 
                          where c.idtiketh = '".$hxid."'
                        )dt2
                        on dt1.dxidh = dt2.idtiketh and dt1.dxid = dt2.idtiketd 
                        left join
                        (
                          select d.subpkj, d.ket from DBKMBS.kmmstsubpkj d group by d.ket
                        )dt3
                        on dt1.dcomponent = dt3.ket
                        order by nmbrg";
              // echo $sql_1;
              $result_1 = mysql_query($sql_1,$conn_33);
              $count_1 = mysql_num_rows($result_1);
            }
            $tambah_1 = 0;

            if ($count_1 > 0) {
              $tambah +=$count_1;
              $tambah_1 +=$count_1;
            }

        ?>
          <tr>
            <td align="center"><?=$no?></td>
            <td colspan="10" style="text-align: left;" ><?=$data["ket"]?>
              <img id="addRow<?=$no?>" src="img/plus.png" onclick="addRow('pkj_<?=$no?>')" class="addRow" style="cursor: pointer; vertical-align: center;" title="Add Row" >
              <input type="hidden" id="row_pkj_<?=$no?>" value="<?=($no-1)+$tambah?>" size="3">
              <input type="hidden" id="row_subpkj_<?=$no?>" value="<?=(1+$tambah_1)?>" size="3">
              <img id="cmd_detail_order<?=$no?>" src="img/show_1.png" onclick="detail_order('<?=$no?>')" class="cmd_detail_order" style="cursor: pointer; vertical-align: center;" title="Show Detail Order" >
              <br/>
              <div id="detail_order<?=$no?>" class="detail_order" style="display: none;">
                  <table border="0" align="center" style="margin: 5px">
                    <tr>
                      <td align="center"><span id="33" class="33">33</span></td>
                      <td align="center"><span id="33s" class="33s">33.5</span></td>
                      <td align="center"><span id="34" class="34">34</span></td>
                      <td align="center"><span id="34s" class="34s">34.5</span></td>
                      <td align="center"><span id="35" class="35">35</span></td>
                      <td align="center"><span id="35s" class="35s">35.5</span></td>
                      <td align="center"><span id="36" class="36">36</span></td>
                      <td align="center"><span id="36s" class="36s">36.5</span></td>
                      <td align="center"><span id="37" class="37">37</span></td>
                      <td align="center"><span id="37s" class="37s">37.5</span></td>
                      <td align="center"><span id="38" class="38">38</span></td>
                      <td align="center"><span id="38s" class="38s">38.5</span></td>
                      <td align="center"><span id="39" class="39">39</span></td>
                      <td align="center"><span id="39s" class="39s">39.5</span></td>
                      <td align="center"><span id="40" class="40">40</span></td>
                      <td align="center"><span id="40s" class="40s">40.5</span></td>
                      <td align="center"><span id="41" class="41">41</span></td>
                      <td align="center"><span id="41s" class="41s">41.5</span></td>
                      <td align="center"><span id="42" class="42">42</span></td>
                      <td align="center"><span id="42s" class="42s">42.5</span></td>
                      <td align="center"><span id="43" class="43">43</span></td>
                      <td align="center"><span id="43s" class="43s">43.5</span></td>
                      <td align="center"><span id="44" class="44">44</span></td>
                      <td align="center"><span id="44s" class="44s">44.5</span></td>
                      <td align="center"><span id="">Total</span></td>
                    </tr>
                    <tr>
                      <td>
                        <input id="indord33_<?=$no?>" class="indord33" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord33s_<?=$no?>" class="indord33s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord34_<?=$no?>" class="indord34" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord34s_<?=$no?>" class="indord34s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord35_<?=$no?>" class="indord35" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord35s_<?=$no?>" class="indord35s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord36_<?=$no?>" class="indord36" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord36s_<?=$no?>" class="indord36s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord37_<?=$no?>" class="indord37" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord37s_<?=$no?>" class="indord37s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord38_<?=$no?>" class="indord38" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord38s_<?=$no?>" class="indord38s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord39_<?=$no?>" class="indord39" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord39s_<?=$no?>" class="indord39s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord40_<?=$no?>" class="indord40" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord40s_<?=$no?>" class="indord40s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord41_<?=$no?>" class="indord41" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord41s_<?=$no?>" class="indord41s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord42_<?=$no?>" class="indord42" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord42s_<?=$no?>" class="indord42s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord43_<?=$no?>" class="indord43" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord43s_<?=$no?>" class="indord43s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord44_<?=$no?>" class="indord44" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="indord44s_<?=$no?>" class="indord44s" type="text" name="intype_1" value="" maxlength="7" style="width: 35px; text-align:center;"  align="center" onkeydown="" onkeyup="" Placeholder="" readonly>
                      </td>
                      <td>
                        <input id="intotord_<?=$no?>" class="intotord" type="text" name="intype" value="" maxlength="10" style="width: 35px; text-align:center;"  align="center" onkeyup="" Placeholder="" readonly>
                      </td>
                    </tr>
                  </table>
              </div>
            </td>
          </tr>
        <?php
            if ($count_1 > 0) {
              $no_1 = 1;
              while ($data_1 = mysql_fetch_array($result_1)) {
                $id_component = trim($data_1["subpkj"]);
                $component = trim(strtoupper($data_1["dcomponent"]));
                $id_material = trim($data_1["material"]);
                $material = trim($data_1["nmbrg"]);
                $id_supplier = trim($data_1["kdsupp"]);
                $supplier = trim($data_1["nmsupp"]);
                $calc = $data_1["calc"];
                $qty = "";
                $nstn = $data_1["unit"];
                $ambil = "0.0000";
                $backorder = "0.0000";
                $dremark = $data_1["dremark"];

                echo "<tr>";
                  echo "<td style=\"text-align: center;\">";
                    echo "<input id='subpkj_".$no."_".$no_1."' class='subpkj_".$no."' type='hidden' style='width: 50px' value='".$no_1."'>";
                    echo "<img id=\"addRow".$no."\" src=\"img/plus.png\" onclick=\"addRow('pkj_".$no."')\" class=\"addRow\" style=\"cursor: pointer; vertical-align: center;\" title=\"Add Row\" >";
                  echo "</td>";
                  echo "<td style=\"text-align: center;\">";
                    echo "
                          <textarea id='component_".$no."_".$no_1."' class='component_".$no."' name='' onkeyup=\"resizeTextarea('component_".$no."_".$no_1."')\" onkeypress=\"getAutocomplete(this.id)\" data-resizable='true' style='width:85%' >".$component."</textarea>
                          <input id=\"id_component_".$no."_".$no_1."\" class=\"id_component_".$no."\" type='hidden' name='' style=\"width: 50px\" value=\"".$id_component."\">
                          <img id=\"openDialog_component_".$no."_".$no_1."\" class=\"openDialog\" src=\"img/search.png\" onclick=\"openDialog(this.id)\" style=\"cursor: pointer; vertical-align: center;\" title=\"Search Komponen\" >
                         ";
                  echo "</td>";
                  echo "<td style=\"text-align: center;\">";
                    echo "
                          <span id=\"show_id_material_".$no."_".$no_1."\" class=\"show_id_material_".$no."\" style=\"color:green;\">".$id_material."</span><br/>
                          <textarea id=\"material_".$no."_".$no_1."\" class=\"material_".$no."\" name='' onkeyup=\"resizeTextarea('material_".$no."_".$no_1."')\" onkeypress=\"getAutocomplete(this.id)\" data-resizable='true' style='width:85%' >".$material."</textarea>
                          <input id=\"id_material_".$no."_".$no_1."\" class=\"id_material_".$no."\" type='hidden' name='' style=\"width: 50px\" value=\"".$id_material."\">
                          <img id=\"openDialog_material_".$no."_".$no_1."\" class=\"openDialog\" src=\"img/search.png\" onclick=\"openDialog(this.id)\" style=\"cursor: pointer; vertical-align: center;\" title=\"Search Material\" >
                         ";
                  echo "</td>";
                  echo "<td style=\"text-align: center;\">";
                    echo "
                          <span id=\"show_id_supplier_".$no."_".$no_1."\" class=\"show_id_supplier_".$no."\" style=\"color:green;\">".$id_supplier."</span><br/>
                          <textarea id=\"supplier_".$no."_".$no_1."\" class=\"supplier_".$no."\" name='' onkeyup=\"resizeTextarea('supplier_".$no."_".$no_1."')\" onkeypress=\"getAutocomplete(this.id)\" data-resizable='true' style='width:85%' >".$supplier."</textarea>
                          <input id=\"id_supplier_".$no."_".$no_1."\" class=\"id_supplier_".$no."\" type='hidden' name='' style=\"width: 50px\" value=\"".$id_supplier."\">
                          <img id=\"openDialog_supplier_".$no."_".$no_1."\" class=\"openDialog\" src=\"img/search.png\" onclick=\"openDialog(this.id)\" style=\"cursor: pointer; vertical-align: center;\" title=\"Search Material\">
                         ";
                  
                  echo "</td>";
                  // echo "<td style=\"text-align: center;\">";
                  //   echo "
                  //         <input id=\"calc_tkt_".$no."_".$no_1."\" class=\"calc_tkt_".$no."\" type='text' name='' style=\"width: 50px; text-align: right;\" value=\"".$calc."\">
                  //        ";
                  // echo "</td>";
                  echo "<td style=\"text-align: center;\">";
                    echo "
                          <input id=\"calc_mp_".$no."_".$no_1."\" class=\"calc_mp_".$no."\" onkeyup=\"calculate('qty',this.id)\" onkeydown=\"number(event)\" type='text' name='' style=\"width: 50px; text-align: right;\" value=\"".$calc."\">
                         ";
                  echo "</td>";
                  echo "<td style=\"text-align: center;\">";
                    echo "
                          <input id=\"qty_".$no."_".$no_1."\" class=\"qty_".$no."\" onkeydown=\"number(event)\" type='text' name='' style=\"width: 50px; text-align: right;\" value=\"".$qty."\">
                         ";
                  echo "</td>";
                  echo "<td style=\"text-align: center;\">";
                    echo "
                          <select id=\"unit_".$no."_".$no_1."\" class=\"unit_".$no."\" onchange=\"\" style=''>
                         ";
                          $sql_2 = "SELECT satuan, nmsatuan FROM kmsatuan ORDER BY satuan";
                          $result_2 = mysql_query($sql_2,$conn);
                            echo "<option value=''>-</option>";
                            while($data_2 = mysql_fetch_array($result_2)){
                                $selected = "";
                                if (trim($nstn) == trim($data_2["satuan"])) {
                                  $selected = "selected";
                                }
                                echo "<option ".$selected." value='".trim($data_2['satuan'])."'>".$data_2['satuan']."</option>";
                            }
                    echo "
                          </select>
                         ";
                  echo "</td>";
                  echo "<td style=\"text-align: center;\">";
                    echo "
                          <input id=\"ambil_".$no."_".$no_1."\"class=\"ambil_".$no."\" type='text' name='' style=\"width: 50px; text-align: right;\" value=\"".$ambil."\" readonly>
                         ";
                  echo "</td>";
                  echo "<td style=\"text-align: center;\">";
                    echo "
                          <input id=\"back_order_".$no."_".$no_1."\" class=\"back_order_".$no."\" type='text' name='' style=\"width: 50px; text-align: right;\" value=\"".$backorder."\" onkeydown=\"number(event)\">
                         ";
                  echo "</td>";
                  echo "<td style=\"text-align: center;\">";
                    echo "
                          <img id=\"remove_".$no."_".$no_1."\" src=\"img/delete.png\" onclick=\"removeRow(this)\" class=\"pkj_".$no."\" style='cursor: pointer; vertical-align: center;' title=\"Delete Row\" >
                         ";
                  echo "</td>";
                echo "</tr>";
              $no_1++;
              }
            }
          }
        ?>
      </tbody>
    </table>
    <br/>
    <input id="cmdeditdetail_1" class="buttonedit" type="button" name="nmcmdeditdetail" value="Edit Detail" onclick="edit('detail')" style="margin-left: 5px;">
    <table id="myTable" class="table" width="100%">
      <thead>
        <tr>
          <th align="center" width="50%">Special Instruction</th>
          <th align="center" width="50%">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td valign="top">
            <textarea id="inrspecial" name="inrspecial" class="resize" onkeyup="" style="width:99%; min-height:150px;"><?=$dremark?></textarea>
          </td>
          <td valign="top">
            <textarea id="inrket" name="inrket" class="resize" onkeyup="" style="width:99%; min-height:150px;"></textarea>
          </td>
        </tr>
      </tbody>
    </table>
    <input id="deletedetail" class="textbox" type="hidden" name="intype" value="">
  </fieldset>

  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
          <div align="center">
              <input id="cmdSaveDetail" class="buttonadd" type="button" name="nmcmdSaveDetail" value="Save" onclick="saveclick('detail')">
              <input id="cmdCancelDetail" class="buttondelete" type="button" name="nmcmdCancelDetail" value="Cancel" onclick="lock('detail')">
          </div>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <hr>
  <input id="cmdCancel" class="buttondelete" type="button" name="nmcmdCancel" value="Close" onclick="cancelclick() " style="float: right; margin-left: 5px;">
</fieldset>