function YurtDisiBolgeSelected(value) {
    $.ajax({
        type: "GET",
        url: "/Doit/BayiDetail/" + value,
        success: function (data) {
            $("#lbl_yurtDisiFirmaAdi").html(data.FirmaAdi);
            $("#lbl_yurtDisiAdres").html(data.Adres);
            $("#lbl_yurtDisiTel").html(data.Tel);
            $("#lbl_yurtDisiFax").html(data.Fax);
            $("#lbl_yurtDisiEMail").html(data.EMail);
            $("#lbl_yurtDisiWeb").html(data.Web);
        },
        complate: function () {

        }
    });
}

function YurtIciBolgeSelected(value) {
    $.ajax({
        type: "GET",
        url: "/Doit/BayiDetail/" + value,
        success: function (data) {
            $("#lbl_yurtIciFirmaAdi").html(data.FirmaAdi);
            $("#lbl_yurtIciAdres").html(data.Adres);
            $("#lbl_yurtIciTel").html(data.Tel);
            $("#lbl_yurtIciFax").html(data.Fax);
            $("#lbl_yurtIciEMail").html(data.EMail);
            $("#lbl_yurtIciWeb").html(data.Web);
        },
        complate: function () {

        }
    });
}