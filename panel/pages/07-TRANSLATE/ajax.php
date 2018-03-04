<?php
$panel = true;
include_once("../../system/bahadir.php");
$option = $bahadir->fnc->post("OPTION");
switch ($option)
{
    case 'INSERT_CEVIRI':

        $txtCeviri = $bahadir->fnc->post("txtCeviri", true);
        $cboLanguage = $bahadir->fnc->post("cboLanguage");
        $cboCeviriBekleyenKelimeler = $bahadir->fnc->post("cboCeviriBekleyenKelimeler");
        $INSERT_KELIME = $bahadir->mssqlDb->ExexQuery("INSERT INTO translate.DICTIONARY (LANGUAGE_ID,WORD_ID,TRANSLATED_WORD) VALUES($cboLanguage,$cboCeviriBekleyenKelimeler,'$txtCeviri')");
        $LAST_ID = $bahadir->mssqlDb->IDENT_CURRENT("translate.DICTIONARY");
        $SON_EKLENEN_CEVIRI = $bahadir->mssqlDb->Select("SELECT translate.WORDS.ID AS WORD_ID, translate.WORDS.WORD, translate.DICTIONARY.TRANSLATED_WORD, translate.LANGUAGE.LANGUAGE_LONG, translate.DICTIONARY.LANGUAGE_ID FROM translate.LANGUAGE INNER JOIN translate.DICTIONARY ON translate.LANGUAGE.ID = translate.DICTIONARY.LANGUAGE_ID FULL OUTER JOIN translate.WORDS ON translate.DICTIONARY.WORD_ID = translate.WORDS.ID WHERE translate.DICTIONARY.ID = $LAST_ID");
        echo json_encode(array('KELIME'=>$SON_EKLENEN_CEVIRI));

        break;

    case 'CEVRILECEK_KELIMELERI_GETIR':
        $LANGUAGE_ID = $bahadir->fnc->post("LANGUAGE_ID");
        $CEVRILECEK_KELIMELER = $bahadir->mssqlDb->Select("SELECT translate.WORDS.ID AS WORD_ID, translate.WORDS.WORD, translate.DICTIONARY.TRANSLATED_WORD, translate.LANGUAGE.LANGUAGE_LONG, translate.DICTIONARY.LANGUAGE_ID FROM translate.LANGUAGE INNER JOIN translate.DICTIONARY ON translate.LANGUAGE.ID = translate.DICTIONARY.LANGUAGE_ID FULL OUTER JOIN translate.WORDS ON translate.DICTIONARY.WORD_ID = translate.WORDS.ID WHERE (translate.DICTIONARY.TRANSLATED_WORD IS NULL) AND (translate.DICTIONARY.LANGUAGE_ID IS NULL OR translate.DICTIONARY.LANGUAGE_ID <> $LANGUAGE_ID)");
        echo json_encode($CEVRILECEK_KELIMELER);
    break;


    case 'SLIDER_SEQUENCE':
        $LIST = json_decode($_POST["LISTE"]);
        for ($i = 0; $i < count($LIST); $i++)
        {
            $ID = $LIST[$i][0];
            $SEQUENCE = $LIST[$i][1];
            $bahadir->mssqlDb->ExexQuery("UPDATE site.SLIDER SET SEQUENCE = $SEQUENCE WHERE ID = $ID");
        }
        echo json_encode(array(count($LIST)));
        break;
    case 'CHANGE_STATE':
        $ID = $bahadir->fnc->post("ID");
        $STATE = $bahadir->fnc->post("STATE");
        $UPDATE_STATE = $bahadir->mssqlDb->ExexQuery("UPDATE translate.LANGUAGE SET VISIBILITY = $STATE WHERE ID = $ID");
        break;
    case 'SELECT_LANGUAGE':
        $LANGUAGE_ID = $bahadir->fnc->post("LANGUAGE_ID");
        $LANGUAGE = $bahadir->mssqlDb->Select("SELECT *FROM translate.LANGUAGE WHERE ID = $LANGUAGE_ID");
        echo json_encode($LANGUAGE[0]);
        break;
}
?>