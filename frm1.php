<?php

include("../../configuration.php");
include("../../connection.php");
include("../../endec.php");
include("akses.php");
require_once('calendar/classes/tc_calendar.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Form Pembuatan MP</title>
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="expires" content="0">
    <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
    </head>


    <script language="javascript" src="calendar/calendar.js"></script>

    <link rel="stylesheet" href="../../theme/south-street/jquery-ui-1.8.13.custom.css">
    <!-- <script src="../../js/jquery-1.5.1.js"></script> -->
    <script src="../../js/ui/jquery.ui.core.js"></script>
    <script src="../../js/ui/jquery.ui.widget.js"></script>
    <script src="../../js/ui/jquery.ui.datepicker.js"></script>
    <link rel="stylesheet" href="css/demos.css">

    <!-- MODAL DIALOG -->
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css"/>

    <?php
    $xrdm = date("YmdHis");
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css?verion=$xrdm\" />";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/frmstyle.css?version=$xrdm\" />";
    ?>
    <link href="calendar/calendar.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/frm1.js?version=<?=$xrdm?>"></script>

  <body onload="init();">
      <table id="tabelview" width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2">
                  <div align="left">
                    <span style="font-size: 14px;font:Arial, Helvetica, sans-serif;font-weight: bold;">
                      Form Pembuatan MP
                    </span>
                    <hr />
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <?php            
            // kode menu add=1, edit=2, delete=3
                  if(in_array(1, $id_tombol) == 1){
                    ?>
                    <INPUT id="cmdadd" class="buttonadd" type="button" name="nmcmdadd" value="Add New" onclick="addnewclick()">&nbsp;
                      <?php 
                    }  
                      if(in_array(3, $id_tombol) == 1){
                        ?>
                        <INPUT id="cmddelete" class="buttondelete" type="button" name="nmcmddelete" value="Delete" onclick="deleteclick()">&nbsp;
                          <?php 
                        } 
                        ?>
                        <INPUT id="cmdsearch" class="buttonfind" type="button" name="nmcmdsearch" value="Search" onclick="searchclick()">&nbsp;
                        <?php
                        if(in_array(2, $id_tombol) == 1){
                        ?>
                        <INPUT id="cmdunissued" class="buttonunissued" type="button" name="nmcmdunissued" value="Un Issued" onclick="unissued()">&nbsp;
                        <?php 
                        } 
                        ?>
                        <?php
                        if(in_array(2, $id_tombol) == 1){
                        ?>
                        <INPUT id="cmdhistory" class="buttonhistory" type="button" name="nmcmdhistory" value="History" onclick="openDialog('history')">&nbsp;
                        <?php 
                        } 
                        ?>
                        </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td><hr></td>
    </tr>
    <tr>
      <td>
        <div id="areasearch">
         <fieldset class="info_fieldset"><legend>Search</legend>
           <form id="ajax-contact-form" action="#">
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                  <table id="tblSearch">
                    <tr>
                      <td>Field : 
                        <select class='txtfield' id="txtfield0">
                          <option value=''>-</option>
                          <option value='a.mpno'>No. MP</option>
                          <option value='a.cust'>Kode Customer</option>
                          <option value="DATE_FORMAT(a.dateiss,'%d/%m/%Y')">Date Issued</option>
                          <option value='a.article'>Article</option>
                          <option value='a.`last`'>Last</option>
                          <option value='a.noso'>No. SO</option>
                        </select>
                      </td>
                      <td>
                        <select class='txtparameter' id="txtparameter0">
                          <option value='like'>like</option>
                          <option value='equal'>equal</option>
                          <option value='notequal'>not equal</option>
                          <option value='less'>less</option>
                          <option value='lessorequal'>less or equal</option>
                          <option value='greater'>greater</option>
                          <option value='greaterorequal'>greater or equal</option>
                          <option value='isnull'>is null</option>
                          <option value='isnotnull'>is not null</option>
                          <option value='isin'>is in</option>
                          <option value='isnotin'>is not in</option>
                        </select>
                      </td>
                      <td>Data : 
                        <input type="text" class="txtdata" id="txtdata0" onkeydown="enterfind(event)">
                      </td>
                      <td>
                        <input type="button" value="[+]" onclick="addSearch()">
                      </td>
                      <td>
                       <input type="button" value="clear" id="rmv1" onclick="deleteRow(this.id)" style="cursor:pointer;">
                     </td>
                   </tr>
                 </table>
               </td>
               <td valign='top'><INPUT id="cmdfind" class="buttongofind" type="button" name="nmcmdfind" value="Find" onclick="findclick()"></td>
             </tr>
             <tr>
               <td>
                <div id="infoview" align="left">view : <INPUT id="txtperpage" class="textbox" type="text" name="txtperpage" value="10" onkeydown="enterfind(event)"></div>
              </td>
              <td>
                <div id="infocmdpage" align="left">
                  <INPUT id="cmdback" class="buttonback" type="button" name="nmcmdback" value="Prev" onclick="prevpage()">
                    <INPUT id="txtpage" class="textbox" type="text" name="nmtxtpage" value="1">
                      <INPUT id="cmdnext" class="buttonnext" type="button" name="nmcmdnext" value="Next" onclick="nextpage()">
                      </div>
                    </td>
                  </tr>
                </table>
              </form>
            </fieldset>
          </div>
        </td>
      </tr>
      <tr>
        <td>
         <div id="frmloading" align="center">
          <img src="img/ajax-loader.gif" />
        </div>
        <div id="frmbody">
          <div id="frmcontent">
          </div>
        </div>
      </td>
    </tr>
  </table>

  <table id="tabelinput" width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <input id="intxtmode" name="innmmode" type="hidden" value="">Mode: <span id="mode"></span>
        <div id="areaclose">
          <input id="cmdCancel" class="buttondelete" type="button" name="nmcmdCancel" value="Close" onclick="cancelclick() " style="float: right; margin-left: 5px;">
        </div>
        <div id="areabutton">
          <?php
          if(in_array(2, $id_tombol) == 1){
          ?>
            <INPUT id="cmdedit" class="buttonedit" type="button" name="nmcmdedit" value="Edit" onclick="checkissued()" style="float: right; margin-left: 5px;">
          <?php 
          }
          ?>
          <INPUT id="cmdexport" class="buttonexport" type="button" name="nmcmdexport" value="Export" onclick="exportclick()" style="float: right; margin-left: 5px;">
          <select id="exporttype" style="float: right; margin-left: 5px;">
            <option value="pdf" selected>Pdf</option>
            <!-- <option value="pdf2">Pdf 2</option> -->
          </select>
        </div>
      </td>
    </tr>
    <tr>
      <td><hr></td>
    </tr>
    <tr>
      <td>
        <div id="areacopy" style="display: none;">
          <fieldset class="info_fieldset">
            <legend>Copy Ticket</legend>
            <label style="width: 140px; padding-left: 33px;">Kode Tiket</label>
            <input id="inkodetiket" class="textbox" type="text" name="intype" style="" readonly="" disabled="">
            <input id="cmdFindTicket" class="buttonfind" type="button" name="nmFindTicket" value="Search" onclick="openDialog('ticket','')" style="margin-left: 20px;">
            <input id="cmdCopyMp" class="buttoncopy" type="button" name="nmCopyMp" value="Copy MP" onclick="openDialog('copymp','')" style="margin-left: 20px;">
          </fieldset>
        </div>
        <div id="frmloading_copy" align="center" style="display: none;">
          <img style="height: 30%; width: 30%;" src="img/loader_7.gif" />
        </div>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
        <div id="areaedit" style="display:none"></div>
        <div id="areainput"></div>
      </td>
    </tr>
  </table>

  <div id="dialog-open" class="dialog-open"></div>

  <input id="txtSQL" name="nmSQL" type="hidden" value="<?php echo $sql; ?>"/>
  
</body>

    </html>
    <?php
    mysql_close($conn);
    ?>
