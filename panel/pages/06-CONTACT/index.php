<?php

if($_POST){

    $MODUL = $_POST["MODUL"];
    $ISLEM = $_POST["ISLEM"];
    $CURRENT_PAGE = $bahadir->fnc->post("CURRENT_PAGE");

    switch ($MODUL)
    {
        case 'ILETISIM_BILGILERI':

            $firma_unvan = $bahadir->fnc->post("firma_unvan");
            $adres = $bahadir->fnc->post("adres");
            $adres2 = $bahadir->fnc->post("adres2");
            $telefon = $bahadir->fnc->post("telefon");
            $fax = $bahadir->fnc->post("fax");
            $eposta = $bahadir->fnc->post("eposta");

            switch ($ISLEM)
            {
                case 'UPDATE':
                    $UPDATE = $bahadir->mssqlDb->ExexQuery("UPDATE SITE_SETTINGS SET COMPANY_NAME_LONG = '$firma_unvan', ADDRESS = '$adres', ADDRESS2 = '$adres2', PHONE = '$telefon', EMAIL = '$eposta', FAX = '$fax'");
                    break;
            }
            break;
        case 'BAYILER':

            switch ($ISLEM)
            {
                case 'INSERT':
                    $ABROAD = $bahadir->fnc->post("ABROAD");
                    $REGION = $bahadir->fnc->post("REGION");
                    $COMPANY_NAME = $bahadir->fnc->post("COMPANY_NAME");
                    $ADRESS = $bahadir->fnc->post("ADRESS");
                    $ADRESS2 = $bahadir->fnc->post("ADRESS2");
                    $PHONE = $bahadir->fnc->post("PHONE");
                    $FAX = $bahadir->fnc->post("FAX");
                    $EMAIL = $bahadir->fnc->post("EMAIL");
                    $WWW = $bahadir->fnc->post("WWW");
                    $INSERT = $bahadir->mssqlDb->ExexQuery("INSERT INTO DEALERS (ABROAD,REGION,COMPANY_NAME,ADRESS,ADRESS2,PHONE,FAX,EMAIL,WWW) VALUES('$ABROAD','$REGION','$COMPANY_NAME','$ADRESS','$ADRESS2','$PHONE','$FAX','$EMAIL',$WWW)");
                    break;
                case 'DELETE':
                    $ID = $bahadir->fnc->post("ID");
                    $DELETE = $bahadir->mssqlDb->ExexQuery("DELETE DEALERS WHERE ID = $ID");
                    break;
            }

            break;
    }
}

$SETTINGS = $bahadir->GET_SITE_SETTINGS();
$DEALERS = $bahadir->mssqlDb->Select("SELECT *FROM DEALERS");
?>

<?php
if(isset($CURRENT_PAGE)){
?>
<script>
    $(document).ready(function () {
        setTimeout(function () {
             $("[href='<?php echo $CURRENT_PAGE; ?>']").click();
        }, 2000);
    });
</script>
<?php } ?>

<link href="/panel/pages/06-CONTACT/style.css" rel="stylesheet" type="text/css" />
<script src="/panel/pages/06-CONTACT/script.js"></script>

<style>
    textarea.materialize-textarea {
        height: 6rem !important;
        overflow: visible;
    }
</style>

<div class="row">

    <div class="col s12">
        <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
            <li class="tab col s3">
                <a href="#iletisimbilgileri" class="active">
                    <?php echo $bahadir->TRANSLATE_WORD("iletişim bilgileri", 1); ?>
                </a>
            </li>
            <li class="tab col s3">
                <a href="#bayilikler">
                    <?php echo $bahadir->TRANSLATE_WORD("bayilikler", 1); ?>
                </a>
            </li>
            <div class="indicator" style="right: 460.5px; left: 0px;"></div>
        </ul>
    </div>

    <div id="iletisimbilgileri" class="col s12 x-content" style="display: block;margin-top:20px;">
        <form method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">İLETİŞİM BİLGİLERİ</div>

                    <div class="input-field col s12">
                        <input type="text" name="firma_unvan" value="<?php echo $SETTINGS["COMPANY_NAME_LONG"]; ?>" />
                        <label>firma ünvanı</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="adres" value="<?php echo $SETTINGS["ADDRESS"]; ?>" />
                        <label>adres</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="adres2" value="<?php echo $SETTINGS["ADDRESS2"]; ?>" />
                        <label>adres2</label>
                    </div>
                    
                    <div class="input-field col s12">
                        <input type="text" name="telefon" value="<?php echo $SETTINGS["PHONE"]; ?>" />
                        <label>telefon</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="fax" value="<?php echo $SETTINGS["FAX"]; ?>" />
                        <label>fax</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="eposta" value="<?php echo $SETTINGS["EMAIL"]; ?>" />
                        <label>eposta</label>
                    </div>
                    <div class="col s12">
                        <input type="hidden" name="MODUL" value="ILETISIM_BILGILERI" />
                        <input type="hidden" name="ISLEM" value="UPDATE" />
                        <input name="CURRENT_PAGE" type="hidden" />
                        <button class="btn">Kaydet</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="bayilikler" class="col s12 x-content" style="display: block;margin-top:20px;">       
        <div class="card">
           <div class="card-content">
                    <div class="card-title">BAYİLİKLER</div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="input-field col s12">
                            <select name="ABROAD">
                                <option value="2">YURTİÇİ</option>
                                <option value="1">YURTDIŞI</option>
                            </select>
                            <label>konum</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" name="REGION" value="" />
                            <label>bölge</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" name="COMPANY_NAME" value="" />
                            <label>firma ünvanı</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" name="ADRESS" value="" />
                            <label>adres</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" name="ADRESS2" value="" />
                            <label>adres</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" name="PHONE" value="" />
                            <label>telefon</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" name="FAX" value="" />
                            <label>fax</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" name="EMAIL" value="" />
                            <label>epota</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" name="WWW" value="" />
                            <label>url</label>
                        </div>

                        <div class="input-field col s12">
                            <button type="submit" class="btn m-b-xs">Firma Ekle</button>
                        </div>

                        <input type="hidden" name="MODUL" value="BAYILER" />
                        <input type="hidden" name="ISLEM" value="INSERT" />
                        <input name="CURRENT_PAGE" type="hidden" />
                    </form>
                    <div class="input-field col s12">
                            <table id="kelime_tablosu" class="display responsive-table datatable-example">
                                <thead>
                                    <tr>
                                        <th>KONUM</th>
                                        <th>BÖLGE</th>
                                        <th>FİRMA ADI</th>
                                        <th>ADRES</th>
                                        <th>ADRES</th>
                                        <th>PHONE</th>
                                        <th>FAX</th>
                                        <th>EMAİL</th>
                                        <th>URL</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                       $BAYILER = $bahadir->mssqlDb->Select("SELECT *FROM DEALERS");
                                       foreach ($BAYILER as $BAYI)
                                       {
                                       ?>
                                    <tr>
                                        <td style="width:auto;overflow:hidden;"><?php echo $BAYI["ABROAD"]==1?'YURTDIŞI':'YURTİÇİ'; ?>
                                        </td>
                                        <td style="width:auto;overflow:hidden;"><?php echo $BAYI["REGION"]; ?>
                                        </td>
                                        <td style="width:auto;overflow:hidden;"><?php echo $BAYI["COMPANY_NAME"]; ?>
                                        </td>
                                        <td style="width:auto;overflow:hidden;"><?php echo $BAYI["ADRESS"]; ?>
                                        </td>
                                        <td style="width:auto;overflow:hidden;"><?php echo $BAYI["ADRESS2"]; ?>
                                        </td>
                                        <td style="width:auto;overflow:hidden;"><?php echo $BAYI["PHONE"]; ?>
                                        </td>
                                        <td style="width:auto;overflow:hidden;"><?php echo $BAYI["FAX"]; ?>
                                        </td>
                                        <td style="width:auto;overflow:hidden;"><?php echo $BAYI["EMAIL"]; ?>
                                        </td>
                                        <td style="width:auto;overflow:hidden;"><?php echo $BAYI["WWW"]; ?>
                                        </td>

                                        <td>    
                                            <form method="post">
                                                <button type="submit" class="btn m-b-xs danger" onclick="return confirm('Silmek istediğinizden eminmisiniz?');">Sil</button>                                                
                                                <input type="hidden" name="MODUL" value="BAYILER" />
                                                <input type="hidden" name="ISLEM" value="DELETE" />
                                                <input type="hidden" name="ID" value="<?php echo $BAYI["ID"]; ?>" />
                                                <input name="CURRENT_PAGE" type="hidden" />
                                            </form>
                                        </td>
                                    </tr><?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>
        </div>
    </div>
</div>