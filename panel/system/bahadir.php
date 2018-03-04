<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'BDatabase.php';
require 'BFunctions.php';

$bahadir = new bahadir();

if($panel == true){
    $bahadir->OTURUM_KONTROL();
}else{
    $SETTINGS = $bahadir->GET_SITE_SETTINGS();
    if(!isset($_SESSION["SITE_LANG_ID"])){
        $_SESSION["SITE_LANG_ID"] = $SETTINGS["DEFAULT_LANG_ID"];
    }
}

class bahadir extends PDO
{
    public $mssqlDb;
    public $fnc;

    public static $MaxUploadFileSize = 4096;
    public static $slayt_foto_x = 1920;
    public static $slayt_foto_y = 500;
    public static $slayt_foto_thumbnail_x = 290;
    public static $slayt_foto_thumbnail_y = 180;
    public static $slayt_foto_resize = false;
    public static $slayt_foto_ratio_crop = false;
    public static $slayt_foto_tablename = 'slayt';
    public static $slayt_foto_input_name = 'resim';

	function __construct()
	{

		$mssql_host = "192.168.6.76";
        $mssql_database = "BahadirWEB";
        $mssql_uid = "sa";
        $mssql_password = "Ridahab956230";

		
        $this->mssqlDb = new MSSQL_Database($mssql_host,$mssql_database,$mssql_uid,$mssql_password);
        $this->SESSION_START();
        $this->fnc = new BFunctions();
	}

    public function SESSION_START(){
		session_start();
		ob_start();
	}

	public function SESSION_FLUSH()
	{
        unset($_COOKIE['panel2016_username']);
        unset($_COOKIE['panel2016_password']);
        unset($_COOKIE['panel2016_remember']);

        setcookie('panel2016_username', null, time()-1, '/panel');
        setcookie('panel2016_password', null, time()-1, '/panel');
        setcookie('panel2016_remember', null, time()-1, '/panel');

        session_destroy();
        ob_end_flush();
        header("location:index.php");
    }

    public function OTURUM_KONTROL($panel = false){
        if($_SESSION['ON'] == "ON"){
            
        }else{
            header("location:login.php");
        }
    }

    public function LOGIN($username, $password, $remember){

        $username_md5 = md5(md5($username));
        $password_md5 = md5(md5($password));
        $LOGIN = $this->mssqlDb->Select("SELECT *FROM site.USERS WHERE USERNAME = '$username' AND PASSWORD = '$password_md5'");

        if(count($LOGIN) > 0){

            $_SESSION['ON'] = "ON";

            if ($remember == "on") {
                setcookie('BUSER_NAME', $username_md5, time()+60*60*24*365, '/panel');
                setcookie('BPASSWORD', $password_md5, time()+60*60*24*365, '/panel');
                setcookie('BREMEMBER', $remember, time()+60*60*24*365, '/panel');
            }else{
                setcookie('BUSER_NAME', null, time()-1, '/panel');
                setcookie('BPASSWORD', null, time()-1, '/panel');
                setcookie('BREMEMBER', null, time()-1, '/panel');
            }
            header("location:index.php");
        }else{
            $message = "Hatalı kullanıcı adı veya parola!";
            return $message;
        }
    }

    public function GET_SITE_SETTINGS(){
        $SETTINGS = $this->mssqlDb->Select("SELECT *FROM site.SETTING");
        return $SETTINGS[0];
    }

    public function TRANSLATE_WORD($WORD, $ISCONTENT = false, $PANEL = false){
        //$SITE_LANG_ID = $_SESSION["SITE_LANG_ID"];
        $SITE_LANG_ID = 2;
        if($PANEL == true){
            return $WORD;
        }else{
            $KEYWORD = $this->fnc->encoding->STR_UTF8_TO_MSSQL($this->fnc->tirnak_replace($WORD));

            $KELIME_VARMI = $this->mssqlDb->Select("SELECT *FROM translate.WORDS WHERE WORD = '$KEYWORD'");
            if(count($KELIME_VARMI) > 0){
                $WORD_ID = $KELIME_VARMI[0]["ID"];
                $CEVIRISI_VARMI = $this->mssqlDb->Select("SELECT *FROM translate.DICTIONARY WHERE WORD_ID = $WORD_ID AND LANGUAGE_ID = $SITE_LANG_ID");
                if(count($CEVIRISI_VARMI) > 0){
                    return $this->fnc->encoding->HTML_ENTITY_DECODE($CEVIRISI_VARMI[0]["TRANSLATED_WORD"]);
                }else{
                    return $this->fnc->encoding->HTML_ENTITY_DECODE($KELIME_VARMI[0]["WORD"]);
                }
            }else{
                if($ISCONTENT == true){
                    $this->mssqlDb->ExexQuery("INSERT INTO translate.WORDS (WORD,ISCONTENT) VALUES('$KEYWORD',1)");
                }else
                {
                    $this->mssqlDb->ExexQuery("INSERT INTO translate.WORDS (WORD) VALUES('$KEYWORD')");
                }
                return $WORD;
                //return "<span style='background-color:red;'>".$WORD."</span>";
            }
        }
    }

    public function SLAYT_EKLE(){

        $baslik1 = $this->fnc->post("baslik1", true);
        $baslik2 = $this->fnc->post("baslik2", true);
        $aciklama = $this->fnc->post("aciklama", true);

        $gorunurluk = "";
        if(isset($_POST["gorunurluk"])){
            $gorunurluk = $_POST["gorunurluk"] == 'on' ? 1 : 0;
        }

        if($_FILES["resim"]){
            $IMG_BINARY = $this->fnc->CONVERT_POSTED_FILE_TO_BINARY($_FILES["resim"]);
        }else{
            $IMG_BINARY='';
        }

        $content = $this->fnc->post("content", true);
        $seo = $this->fnc->turkce_karakter_temizle($aciklama);

        $SLIDERS = $this->mssqlDb->Select("SELECT ID FROM site.SLIDER");

        $SIRA = count($SLIDERS) + 1;
        $this->mssqlDb->ExexQuery("INSERT INTO SLIDER (SEQUENCE,IMAGE_BINARY,TITLE1,TITLE2,DESCRIPTION,CONTENT_HTML,SEO,VISIBILITY) VALUES($SIRA,$IMG_BINARY,'$baslik1','$baslik2','$aciklama','$content','$seo','$gorunurluk')");

    }

    public function SLAYT_GUNCELLE()
    {
        $SLAYT_ID = $this->fnc->post("SLIDER_ID");
        $baslik1 = $this->fnc->post("baslik1", true);
        $baslik2 = $this->fnc->post("baslik2", true);
        $aciklama = $this->fnc->post("aciklama", true);
        $gorunurluk = $_POST["gorunurluk"]  == 'on' ? 1 : 0;

        $content = $this->fnc->post("content", true);
        $seo = $this->fnc->turkce_karakter_temizle($aciklama);

        if($_FILES["resim"]["error"] == 0){
            $IMG_BINARY = $this->fnc->CONVERT_POSTED_FILE_TO_BINARY($_FILES["resim"]);
            $SQL = "UPDATE site.SLIDER SET IMAGE_BINARY = $IMG_BINARY, TITLE1 = '$baslik1', TITLE2 = '$baslik2', DESCRIPTION = '$aciklama', CONTENT_HTML = '$content', SEO = '$seo', VISIBILITY = $gorunurluk WHERE ID = $SLAYT_ID";
        }else{
            $SQL = "UPDATE site.SLIDER SET TITLE1 = '$baslik1', TITLE2 = '$baslik2', DESCRIPTION = '$aciklama', CONTENT_HTML = '$content', SEO = '$seo', VISIBILITY = $gorunurluk WHERE ID = $SLAYT_ID";
        }

        $this->mssqlDb->ExexQuery($SQL);
    }

    public function HABER_EKLE(){

        $baslik1 = $this->fnc->post("baslik1", true);
        $baslik2 = $this->fnc->post("baslik2", true);
        //$aciklama = $this->fnc->post("aciklama", true);
        $tarih = $this->fnc->post("tarih");

        $gorunurluk = $_POST["gorunurluk"] == 'on' ? 1 : 0;

        if($_FILES["resim"]){
            $IMG_BINARY = $this->fnc->CONVERT_POSTED_FILE_TO_BINARY($_FILES["resim"]);
        }else{
            $IMG_BINARY='';
        }

        $content = $this->fnc->post("content", true);
        $seo = $this->fnc->turkce_karakter_temizle($baslik1." ".$baslik2);

        $NEWS = $this->mssqlDb->Select("SELECT ID FROM site.NEWS");

        $SIRA = count($NEWS) + 1;
        $this->mssqlDb->ExexQuery("INSERT INTO NEWS (SEQUENCE,IMAGE_BINARY,TITLE1,TITLE2,CONTENT_HTML,DATE,SEO,VISIBILITY) VALUES($SIRA,$IMG_BINARY,'$baslik1','$baslik2','$content','$tarih','$seo','$gorunurluk')");

    }

    public function HABER_GUNCELLE()
    {
        $HABER_ID = $this->fnc->post("HABER_ID");
        $baslik1 = $this->fnc->post("baslik1", true);
        $baslik2 = $this->fnc->post("baslik2", true);
        //$aciklama = $this->fnc->post("aciklama", true);
        $tarih = $this->fnc->post("tarih");
        $gorunurluk = $_POST["gorunurluk"]  == 'on' ? 1 : 0;

        $content = $this->fnc->post("content", true);
        $seo = $this->fnc->turkce_karakter_temizle($baslik1." ".$baslik2);

        if($_FILES["resim"]["error"] == 0){
            $IMG_BINARY = $this->fnc->CONVERT_POSTED_FILE_TO_BINARY($_FILES["resim"]);
            $SQL = "UPDATE NEWS SET IMAGE_BINARY = $IMG_BINARY, TITLE1 = '$baslik1', TITLE2 = '$baslik2', CONTENT_HTML = '$content', DATE = '$tarih', SEO = '$seo', VISIBILITY = $gorunurluk WHERE ID = $HABER_ID";
        }else{
            $SQL = "UPDATE NEWS SET TITLE1 = '$baslik1', TITLE2 = '$baslik2', CONTENT_HTML = '$content', DATE = '$tarih', SEO = '$seo', VISIBILITY = $gorunurluk WHERE ID = $HABER_ID";
        }

        $this->mssqlDb->ExexQuery($SQL);
    }

    public function SAYFA_GUNCELLE(){

        $TITLE1 = $this->fnc->post("baslik1");
        $TITLE2 = $this->fnc->post("baslik2");
        $CONTENT1 = $this->fnc->post("content1");
        $CONTENT2 = $this->fnc->post("content2");

        $this->mssqlDb->ExexQuery("UPDATE PAGES SET TITLE1='$TITLE1', TITLE2='$TITLE2', CONTENT_LEFT='$CONTENT1', CONTENT_RIGHT='$CONTENT2' WHERE ID = $ID");

    }

    public function DIL_EKLE(){

        $adi = $this->fnc->post("adi", true);
        $iso = $this->fnc->post("iso", true);
        $gorunurluk = $_POST["gorunurluk"] == 'on' ? 1 : 0;

        if($_FILES["resim"]){
            $IMG_BINARY = $this->fnc->CONVERT_POSTED_FILE_TO_BINARY($_FILES["resim"]);
        }else{
            $IMG_BINARY='';
        }

        $this->mssqlDb->ExexQuery("INSERT INTO SLIDER (LANGUAGE_SHORT,LANGUAGE_LONG,FLAG,VISIBILITY) VALUES('$adi','$iso',$IMG_BINARY,$gorunurluk)");

    }

}