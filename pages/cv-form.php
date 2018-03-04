<div>
    <script src="/assets/js/bootstrap.min.js"></script>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <script src="/assets/js/icheck.min.js"></script>
    <link href="/assets/plugins/iCheck/custom.css" rel="stylesheet" />
    <!--<link href="/assets/css/Resolution/InsanKaynaklari.css" rel="stylesheet" />-->
    <link href="/assets/css/DateTimePicker.min.css" rel="stylesheet" />
    <link href="/assets/css/jquerysctipttop.css" rel="stylesheet" />
    <!--<script type="text/javascript" src="Areas/Admin/js/jquery.form.js"></script>-->
    <script type="text/javascript" src="/assets/js/Validation.js"></script>
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/Scripts/Css/DateTimePicker-ltie9.css" />
    <script type="text/javascript" src="/Scripts/Js/DateTimePicker-ltie9.js"></script>
    <![endif]-->
    <script src="/assets/js/DateTimePicker.min.js"></script>
    <script src="/assets/js/InsanKaynaklari.js"></script>
    <link href="/assets/css/Resolution/IkYonetimi.css" rel="stylesheet" />
    <div class="argeBG_img">
        <div class="argeBG_imgOpacity">
            <div class="siteContainer" id="yonetimSiteContainer">
                <div class="indirmeBgTextContainer">
                    <div id="argeBgTextContainer">
                        <div class="indirmeBgTextContainerTitle1">İNSAN KAYNAKLARI</div>
                        <div class="indirmeBgTextContainerTitle2">Y&#214;NETİMİ</div>
                        <div class="indirmeBgTextContainerText">İK yaklaşımımız, liyakata dayalı bir g&#246;revlendirmeyi esas alarak; &#231;alışan memnuniyeti ve motivasyonunu artırıcı temel prensiplere dayalıdır.</div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="siteContainer">
        <div class="argePageTitle">ÖZGEÇMİŞ FORMU</div>
        <div class="argePageTitleFullLine"></div>
        <div class="argePageTitleLine"></div>
        <div class="addPhotoContainer">
            <input id="resim" type="file" style="display:none;" accept="image/*" />
            <div class="addPhotoButton">
                <img id="cvImage" style="display:none;width:100%;height:auto;" />
            </div>
            <div class="addPhotoInfo">
                <div class="infoHeader">Profil Fotoğrafı</div>
                <div class="infoContent">
                    Dosya, JPEG formatında, maksimum "2 mb"<br />
                    boyutunda ve ‘’320x320 px’’ ebatında olmalıdır.
                </div>
            </div>
        </div>
        <div class="flex-container">
            <div class="flex-box">
                <div class="ik_kisiselBilgilerContainerBanner">
                    <div class="ik_kisiselBilgilerContainerBannerTitle">
                        <table style="width:100%;">
                            <tr>
                                <td class="ik_num">1</td>
                                <td>
                                    <div class="ik_kisiselBilgilerContainerBannerTitle">&nbsp; &nbsp; &nbsp; KİŞİSEL BİLGİLER</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <ul class="ik_kisiselBilgilerContainerContent">
                    <li>
                        <input autocomplete="off" class="bahadirTextbox1" id="txt_adSoyad" name="txt_adSoyad" placeholder="ADI SOYADI..." required="required" type="text" value="" />
                        <div class="clear"></div>
                    </li>
                    <li>
                        <input autocomplete="off" class="bahadirTextbox1" id="txt_dogumYeri" name="txt_dogumYeri" placeholder="DOĞUM YERİ..." required="required" type="text" value="" />
                        <div class="clear"></div>
                    </li>
                    <li>
                        <input type="text" id="txt_dogumTarihi" name="txt_dogumTarihi" class="bahadirDatetimeBox" placeholder="DOĞUM TARİHİ..." data-field="date" required="required" readonly>
                        <div class="clear"></div>
                    </li>
                    <li class="ik_kisiselBilgilerContainerContentCinsiyet">
                        <div style="width:100%;margin: 0 auto; padding-top: 15px;">
                            <div class="ik_kisiselBilgilerContainerContentEhliyetTitle" style="font-weight:500;">CİNSİYET</div>
                            <table class="ik_kisiselBilgilerContainerContentCinsiyetTableContainer">
                                <tr>
                                    <td class="ik_kisiselBilgilerContainerContentCinsiyetTableContainerVarItem" style="width:80px;">
                                        <input type="radio" name="rdo_cinsiyet" id="rdo_cinsiyetErkek" value="1" class="css-checkbox" checked />
                                        <label for="rdo_cinsiyetErkek" class="css-label radGroup1" style="font-weight:normal;font-size:13px;margin-left: 5px;background-image:none;">Erkek</label>
                                    </td>
                                    <td style="width:70px;">
                                        <input type="radio" name="rdo_cinsiyet" id="rdo_cinsiyetKadin" value="2" class="css-checkbox" />
                                        <label for="rdo_cinsiyetKadin" class="css-label radGroup1" style="font-weight:normal;font-size:13px;margin-left: 5px;background-image:none;">Kadın</label>
                                    </td>
                                    <input id="hd_cinsiyet" name="hd_cinsiyet" type="hidden" value="" />
                                </tr>
                            </table>
                        </div>
                        <div class="clear"></div>
                    </li>
                    <li id="li_drp_askerlik">
                        <div style="width:100%;margin:0 auto;">
                            <div class="drop1_container">
                                <select class="drop1" id="drp_askerlik" name="drp_askerlik" data-value="Yapılmadı">
                                    <option selected="selected" value="-1" disabled>ASKERLİK DURUMU</option>
                                    <option value="Yapıldı">YAPILDI</option>
                                    <option value="Yapılmadı">YAPILMADI</option>
                                    <option value="Tecilli">TECİLLİ</option>
                                    <option value="Muaf">MUAF</option>
                                </select>
                            </div>
                            <div class="drop1_result_container">
                                Yapılmadı
                            </div>
                        </div>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div style="width:100%;margin:0 auto;">
                            <div class="drop1_container">
                                <select class="drop1" id="drp_medeniDurum" name="drp_medeniDurum" data-value="Bekar">
                                    <option selected="selected" value="-1" disabled>MEDENİ DURUMU</option>
                                    <option value="Evli">EVLİ</option>
                                    <option value="Bekar">BEKAR</option>
                                </select>
                            </div>
                            <div class="drop1_result_container">
                                Bekar
                            </div>
                        </div>
                        <div class="clear"></div>
                    </li>
                    <li id="surucuBelgeSinifi" style="display:none;display: flex;align-content:center;">
                        <div style="width:100%;margin:0 auto;">
                            <div class="drop1_container">
                                <select class="drop1" id="drp_ehliyet" name="drp_ehliyet" data-value="Yok">
                                    <option selected="selected" value="-1" disabled>B2 SÜRÜCÜ EHLİYETİ</option>
                                    <option value="Var">VAR</option>
                                    <option value="Yok">YOK</option>
                                </select>
                            </div>
                            <div class="drop1_result_container">
                                Yok
                            </div>
                        </div>
                        <div class="clear"></div>
                    </li>
                </ul>
            </div>
            <div class="flex-box">
                <div class="ik_kisiselBilgilerContainerBanner">
                    <div class="ik_kisiselBilgilerContainerBannerTitle">
                        <table style="width:100%;">
                            <tr>
                                <td class="ik_num">2</td>
                                <td>
                                    <div class="ik_kisiselBilgilerContainerBannerTitle">&nbsp; &nbsp; &nbsp; EĞİTİM BİLGİLERİ</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <ul class="ik_kisiselBilgilerContainerContent" id="ul_OkulEkle">
                    <li>
                        <input autocomplete="off" class="bahadirTextbox1" id="txt_okulAdi" name="txt_okulAdi" placeholder="EĞİTİM KURUMU..." type="text" value="" />
                        <div class="clear"></div>
                    </li>
                    <li>
                        <input autocomplete="off" class="bahadirTextbox1" id="txt_bolum" name="txt_bolum" placeholder="BÖLÜM ADI..." type="text" value="" />
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div style="width:100%;margin:0 auto;">
                            <div class="drop1_container">
                                <select class="drop1" id="drp_ogrenimDerecesi" name="drp_ogrenimDerecesi" data-value="Lisans">
                                    <option selected="selected" value="-1" disabled>ÖĞRENİM DERECESİ</option>
                                    <option value="Önlisans">ÖNLİSANS</option>
                                    <option value="Lisans">LİSANS</option>
                                    <option value="Doktora">DOKTORA</option>
                                </select>
                            </div>
                            <div class="drop1_result_container">
                                Lisans
                            </div>
                        </div>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div style="width:100%;margin:0 auto;">
                            <div style="width:49%;float:left;">
                                <input type="text" id="txt_ogrenimDerecesiBasTarih" name="txt_ogrenimDerecesiBasTar" class="bahadirDatetimeBox" placeholder="BAŞLANGIÇ TARİHİ..." data-field="date" readonly>
                            </div>
                            <div style="width:49%;float:right;">
                                <input type="text" id="txt_ogrenimDerecesiBitTarih" name="txt_ogrenimDerecesiBitTar" class="bahadirDatetimeBox" placeholder="BİTİŞ TARİHİ..." data-field="date" readonly>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </li>
                    <li style="height: 87px;">
                        <div style="width:100%;margin:0 auto;margin-top:10px;">
                            <a href="javascript:void(0)" class="ik_okulEkleTitleContainer" id="a_okulEkle">
                                <img class="okulEkleIcon" style="float: left;width:32px;height:32px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDc3Ljk0NSA3Ny45NDUiIGhlaWdodD0iNzcuOTQ1cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA3Ny45NDUgNzcuOTQ1IiB3aWR0aD0iNzcuOTQ1cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxnPjxnPjxnPjxnPjxwYXRoIGQ9Ik0wLDM4Ljk3M0MwLjAwMSwxNy40NDgsMTcuNDQ4LDAsMzguOTcyLDBsMCwwYzIxLjUyMywwLDM4Ljk3MywxNy40NDgsMzguOTczLDM4Ljk3NGwwLDAgICAgICAgYzAsMjEuNTIyLTE3LjQ0NywzOC45NzEtMzguOTczLDM4Ljk3M2wwLDBDMTcuNDQ4LDc3Ljk0MywwLjAwMSw2MC40OTYsMCwzOC45NzNMMCwzOC45NzN6IE0xMi4xMzEsMTIuMTMxICAgICAgIEM1LjI2MiwxOS4wMDIsMS4wMTMsMjguNDg4LDEuMDEzLDM4Ljk3M2wwLDBjMCwxMC40ODMsNC4yNDksMTkuOTcxLDExLjExNywyNi44NDJsMCwwICAgICAgIGM2Ljg3MSw2Ljg2OSwxNi4zNTYsMTEuMTE3LDI2Ljg0MiwxMS4xMTdsMCwwYzEwLjQ4NCwwLDE5Ljk3MS00LjI0OCwyNi44NDItMTEuMTE3bDAsMCAgICAgICBjNi44NzEtNi44NzEsMTEuMTE3LTE2LjM1NywxMS4xMTctMjYuODQybDAsMGMwLTEwLjQ4My00LjI0Ni0xOS45NzItMTEuMTE3LTI2Ljg0M2wwLDBDNTguOTQxLDUuMjYsNDkuNDU3LDEuMDE0LDM4Ljk3MiwxLjAxNCAgICAgICBsMCwwQzI4LjQ4NywxLjAxNCwxOS4wMDIsNS4yNiwxMi4xMzEsMTIuMTMxTDEyLjEzMSwxMi4xMzF6IiBmaWxsPSIjMDEwMTAxIi8+PC9nPjwvZz48L2c+PGc+PGc+PHBvbHlnb24gcG9pbnRzPSIzOC4yMzEsNjEuMjM4IDM4LjIzMSwxNi43MDYgMzkuNDMxLDE2LjcwNiAzOS40MzEsNjEuMjM4IDM4LjIzMSw2MS4yMzggICAgICIvPjwvZz48Zz48cG9seWdvbiBwb2ludHM9IjE2Ljg0NywzOC40NDQgMTYuODQ3LDM3LjI0NCA2MS4wOTYsMzcuMjQ0IDYxLjA5NiwzOC40NDQgMTYuODQ3LDM4LjQ0NCAgICAgIi8+PC9nPjwvZz48L2c+PC9nPjwvc3ZnPg==" />
                                <div class="ik_okulEkleTitle">Okul Ekleyiniz.</div>
                            </a>
                        </div>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="flex-box">
                <div class="isDeneyimi_ikKisiselBilgilerContainer_isDeneyimi">
                    <div class="ik_kisiselBilgilerContainerBanner">
                        <div class="ik_kisiselBilgilerContainerBannerTitle">
                            <table style="width:100%;">
                                <tr>
                                    <td class="ik_num">3</td>
                                    <td>
                                        <div class="ik_kisiselBilgilerContainerBannerTitle">&nbsp; &nbsp; &nbsp; İŞ DENEYİMİ</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <ul id="ul_IsDeneyimi" class="ik_kisiselBilgilerContainerContent">
                        <li>
                            <input autocomplete="off" class="bahadirTextbox1" id="txt_firmaAdi" name="txt_firmaAdi" placeholder="FİRMA ADI..." type="text" value="" />
                        </li>
                        <li>
                            <input autocomplete="off" class="bahadirTextbox1" id="txt_pozisyon" name="txt_pozisyon" placeholder="POZİSYON..." type="text" value="" />
                        </li>
                        <li>
                            <div style="width:100%;margin:0 auto;">
                                <div style="width:49%;float:left;">
                                    <input type="text" id="txt_iseBaslamaTarihi" name="txt_iseBaslamaTarihi" class="bahadirDatetimeBox" placeholder="BAŞLANGIÇ TARİHİ..." data-field="date" readonly>
                                </div>
                                <div style="width:49%;float:right;">
                                    <input type="text" id="txt_istenAyrilmaTarihi" name="txt_istenAyrilmaTarihi" class="bahadirDatetimeBox" placeholder="BİTİŞ TARİHİ..." data-field="date" readonly>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </li>
                        <li style="height: 87px;">
                            <div style="width:100%;margin:0 auto;margin-top:10px;">
                                <a href="javascript:void(0)" class="ik_okulEkleTitleContainer" id="isDeneyimiEkle">
                                    <img class="okulEkleIcon" style="float: left;width:32px;height:32px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDc3Ljk0NSA3Ny45NDUiIGhlaWdodD0iNzcuOTQ1cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA3Ny45NDUgNzcuOTQ1IiB3aWR0aD0iNzcuOTQ1cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxnPjxnPjxnPjxnPjxwYXRoIGQ9Ik0wLDM4Ljk3M0MwLjAwMSwxNy40NDgsMTcuNDQ4LDAsMzguOTcyLDBsMCwwYzIxLjUyMywwLDM4Ljk3MywxNy40NDgsMzguOTczLDM4Ljk3NGwwLDAgICAgICAgYzAsMjEuNTIyLTE3LjQ0NywzOC45NzEtMzguOTczLDM4Ljk3M2wwLDBDMTcuNDQ4LDc3Ljk0MywwLjAwMSw2MC40OTYsMCwzOC45NzNMMCwzOC45NzN6IE0xMi4xMzEsMTIuMTMxICAgICAgIEM1LjI2MiwxOS4wMDIsMS4wMTMsMjguNDg4LDEuMDEzLDM4Ljk3M2wwLDBjMCwxMC40ODMsNC4yNDksMTkuOTcxLDExLjExNywyNi44NDJsMCwwICAgICAgIGM2Ljg3MSw2Ljg2OSwxNi4zNTYsMTEuMTE3LDI2Ljg0MiwxMS4xMTdsMCwwYzEwLjQ4NCwwLDE5Ljk3MS00LjI0OCwyNi44NDItMTEuMTE3bDAsMCAgICAgICBjNi44NzEtNi44NzEsMTEuMTE3LTE2LjM1NywxMS4xMTctMjYuODQybDAsMGMwLTEwLjQ4My00LjI0Ni0xOS45NzItMTEuMTE3LTI2Ljg0M2wwLDBDNTguOTQxLDUuMjYsNDkuNDU3LDEuMDE0LDM4Ljk3MiwxLjAxNCAgICAgICBsMCwwQzI4LjQ4NywxLjAxNCwxOS4wMDIsNS4yNiwxMi4xMzEsMTIuMTMxTDEyLjEzMSwxMi4xMzF6IiBmaWxsPSIjMDEwMTAxIi8+PC9nPjwvZz48L2c+PGc+PGc+PHBvbHlnb24gcG9pbnRzPSIzOC4yMzEsNjEuMjM4IDM4LjIzMSwxNi43MDYgMzkuNDMxLDE2LjcwNiAzOS40MzEsNjEuMjM4IDM4LjIzMSw2MS4yMzggICAgICIvPjwvZz48Zz48cG9seWdvbiBwb2ludHM9IjE2Ljg0NywzOC40NDQgMTYuODQ3LDM3LjI0NCA2MS4wOTYsMzcuMjQ0IDYxLjA5NiwzOC40NDQgMTYuODQ3LDM4LjQ0NCAgICAgIi8+PC9nPjwvZz48L2c+PC9nPjwvc3ZnPg==">
                                    <div class="ik_okulEkleTitle">İş Deneyimini Ekleyiniz.</div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="flex-box">
                <div class="ik_kisiselBilgilerContainerBanner">
                    <div class="ik_kisiselBilgilerContainerBannerTitle">
                        <table style="width:100%;">
                            <tr>
                                <td class="ik_num">4</td>
                                <td>
                                    <div class="ik_kisiselBilgilerContainerBannerTitle">&nbsp; &nbsp; &nbsp; BİLGİ VE BECERİLER</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <ul class="ik_kisiselBilgilerContainerContent">
                    <li>
                        <textarea id="txt_software_info" class="txt_ikInputTextArea" placeholder="PROGRAM BECERİLERİ..." rows="7"></textarea>
                    </li>
                    <li>
                        <textarea id="txt_language_info" class="txt_ikInputTextArea" placeholder="DİL BECERİLERİ..." rows="7"></textarea>
                    </li>
                </ul>
            </div>
            <div class="flex-box">
                <div class="ik_kisiselBilgilerContainerBanner">
                    <div class="ik_kisiselBilgilerContainerBannerTitle">
                        <table style="width:100%;">
                            <tr>
                                <td class="ik_num">5</td>
                                <td>
                                    <div class="ik_kisiselBilgilerContainerBannerTitle">&nbsp; &nbsp; &nbsp; İLETİŞİM BİLGİLERİ</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <ul class="ik_kisiselBilgilerContainerContent">
                    <li>
                        <input autocomplete="off" class="bahadirTextbox1" id="txt_celTelNo" name="txt_celTelNo" placeholder="CEP TEL NUMARASI..." required="required" type="text" value="" />
                    </li>
                    <li>
                        <input autocomplete="off" class="bahadirTextbox1" id="txt_evTelNo" name="txt_evTelNo" placeholder="EV/İŞ TEL NUMARASI..." required="required" type="text" value="" />
                    </li>
                    <li>
                        <input autocomplete="off" class="bahadirTextbox1" id="txt_eMail" name="txt_eMail" placeholder="E-POSTA..." required="required" type="text" value="" />
                    </li>
                    <li>
                        <input autocomplete="off" class="bahadirTextbox1" id="txt_adres" name="txt_adres" placeholder="ADRES..." required="required" type="text" value="" />
                    </li>
                </ul>
            </div>
            <div class="flex-box">
                <div class="ik_onYaziIcon">
                    <img src="img/onYaziIcon.html" />
                </div>
                <div class="ik_onYaziTitle">
                    <table>
                        <tr>
                            <td valign="top">
                                <input class="i-checks chk_sozlesmeKabulYazisi" id="cb_anlasma" name="cb_anlasma" type="checkbox" value="true" />
                                <input name="cb_anlasma" type="hidden" value="false" />
                            </td>
                            <td valign="top" style="display:block; margin-left:5px;">
                                <div class="ik_onYaziPostContainerTitle">KİŞİSEL BİLGİLERİMİN, BAHADIR TIBBİ ALETLER İNSAN KAYNAKLARI VERİ TABANINDA SAKLANMASINI KABUL EDİYORUM.</div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="clear"></div>
                <div class="ik_onYaziTextContainer">
                    <textarea autocomplete="off" class="txt_ikOnYaziText" cols="20" id="txt_onYazi" name="txt_onYazi" rows="2" placeholder="ÖNYAZI EKLEMEK İSTİYORUM..."></textarea>
                </div>
                <div class="ik_onYaziPostContainer">

                    <div class="clear"></div>
                    <button id="btnFormSubmit" type="button" class="acikPozisyonBasvurLink" disabled>
                    <span>
                       <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="12px" height="12px" viewBox="0 0 128 128" xml:space="preserve"><g><circle cx="16" cy="64" r="16" fill="#ffffff" fill-opacity="1" /><circle cx="16" cy="64" r="16" fill="#ffffff" fill-opacity="0.67" transform="rotate(45,64,64)" /><circle cx="16" cy="64" r="16" fill="#ffffff" fill-opacity="0.42" transform="rotate(90,64,64)" /><circle cx="16" cy="64" r="16" fill="#ffffff" fill-opacity="0.2" transform="rotate(135,64,64)" /><animateTransform attributeName="transform" type="rotate" values="0 64 64;315 64 64;270 64 64;225 64 64;180 64 64;135 64 64;90 64 64;45 64 64" calcMode="discrete" dur="720ms" repeatCount="indefinite"></animateTransform></g></svg>
                    </span>
                    <span>
                        BAŞVUR
                    </span>
                    </button>
                </div>
                <div class="clear"></div>
            </div>
        </div>     
        <br />
        <br />
        <br />
    </div>
    <div id="dtBox"></div>
    <script type="text/javascript">
        $(document).ready(function () {

        $('.i-checks, #rdo_cinsiyetKadin, #rdo_cinsiyetErkek').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        $("#rdo_cinsiyetKadin").on('ifChecked', function (event) {
            $("#li_drp_askerlik").animate({ "opacity": "0" }, 300, function () {
                $("#li_drp_askerlik").css("display", "none");
            })
            $("#hd_cinsiyet").val("2");
        });
        

        $("#rdo_cinsiyetErkek").on('ifChecked', function (event) {
            $("#li_drp_askerlik").css("display", "block").animate({ "opacity": "1" }, 300, function () {

            })
            $("#hd_cinsiyet").val("1");
        });











        $("#dtBox").DateTimePicker({
            dateTimeFormat: "dd-MM-yyyy hh:mm:ss AA",
            maxDateTime: "20-07-2016 12:00:00 AM",
            minDateTime: "20-07-2012 12:00:00 AM",
            minTime: "10:00",
            maxTime: "17:00",
            animationDuration: 100
        });
    });
    </script>
</div>