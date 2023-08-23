<?php
  include("../../configuration.php");
  include("../../connection.php");
?>
<link rel="stylesheet" href="css/table.css">

<script type="text/javascript">

</script>

<fieldset class="info_fieldset"><legend>Form input</legend>
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <label style="width: 140px; padding-left: 33px;">Kode Tiket</label>
        <input id="inkodetiket" class="textbox" type="text" name="intype" style="" >
        <input id="cmdsave" class="buttongofind" type="button" name="nmcmdsave" value="Add" onclick="">
        <br />
      </td>
      <td>&nbsp;</td>
    </tr>
  </table>

  <fieldset class="info_fieldset" style="1px 1px 1px 1px;"><legend>Header MP</legend>
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
                <input type="hidden" id="inxgambar_1"/>
                <table width="100%">
                  <tr>
                    <td>
                      <div id="uploaded-picture_1" style="border:4px black inset;width: 120px; height: 120px;" onclick="openDialog('gambar','')">
                        <img src="gambar/No_Image_Available.jpg" style="width: 120px; height: 120px;">
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
          <input id="inartprod" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 120px">
          Art. Customer
          <input id="inartcust" class="textbox" type="text" name="intype" value="" maxlength="30" style="width: 186px">
        </td>
      </tr>
      <tr>
        <td>
          <label>Warna</label>
          <input id="inwarna" class="textbox" type="text" name="intype" value="" maxlength="30" style="width: 250px">
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
          <input id="inshoelast" class="textbox" type="text" name="intype" value="" maxlength="30" style="width: 250px">
          <!-- <img src="img/search.png" onclick="openDialog('shoelast','')" style="cursor: pointer; vertical-align: center;" title="Search Shoe Last"> -->
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
                  <input id="innoso" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 120px" onkeydown="check(event,'salesorder')" >
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
                  <text style="margin-left: 20px;">Kode Barang</text>
                  <input id="inkdbrg" class="textbox" type="text" name="intype" value="" maxlength="10" style="width: 200px" onkeydown="check(event,'kdbrg')" >
                  <input id="cmdFindKdbrg" class="buttonfind" type="button" name="nmFindKdbrg" value="Search" onclick="openDialog('kdbrg','')" style="margin-left: 20px;">
                  <input id="cmdAddKdbrg" class="buttongofind" type="button" name="nmAddKdbrg" value="Add" onclick="add('salesorder')" style="margin-left: 20px;">
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
            <input id="cmdCancelHeader" class="buttondelete" type="button" name="nmcmdCancelHeader" value="Cancel" onclick="cancelclick()">
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
<fieldset class="info_fieldset"><legend>Detail MP</legend>
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
          $sql = "SELECT ket FROM kmmstpkj ORDER BY pkj";
          $result = mysql_query($sql,$conn);
          $no = 0;
          while ($data = mysql_fetch_array($result)) {
            $no++;
            $tambah = 0;
            $tambah_1 = 0;

        ?>
          <tr>
            <td align="center"><?=$no?></td>
            <td colspan="10" style="text-align: left;" ><?=$data["ket"]?>
              <img id="addRow<?=$no?>" src="img/plus.png" onclick="addRow('pkj_<?=$no?>')" class="addRow" style="cursor: pointer; vertical-align: center;" title="Add Row" >
              <input type="hidden" id="row_pkj_<?=$no?>" value="<?=($no-1)+$tambah?>" size="3">
              <input type="hidden" id="row_subpkj_<?=$no?>" value="<?=(1+$tambah_1)?>" size="3">
            </td>
          </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
    <!-- <br/> -->
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
            <textarea id="inrspecial" name="inrspecial" onkeyup="resizeTextarea('inrspecial')" data-resizable="true" style="width:99%"></textarea>
          </td>
          <td valign="top">
            <textarea id="inrket" name="inrket" onkeyup="resizeTextarea('inrket')" data-resizable="true" style="width:99%"></textarea>
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
              <input id="cmdCancelDetail" class="buttondelete" type="button" name="nmcmdCancelDetail" value="Cancel" onclick="cancelclick()">
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