<?php
$panel = false;
include_once('system/bahadir.php');
if($_POST){
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(isset($_POST["remember"])){ $remember = $_POST["remember"]; }else{ $remember = "off"; }
    $message = $bahadir->LOGIN($username, $password, $remember);
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>
        <?php echo $bahadir->TRANSLATE_WORD("Bahadır | CMS", 1); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="author" content="Bahadır IT" />
    <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="signin-page">
    <!--<div class="loader-bg"></div>-->
    <!--<div class="loader">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>-->
    <div class="mn-content valign-wrapper">
        <main class="mn-inner container">
            <div class="valign">
                <div class="row">
                    <div class="col s12 m6 l4 offset-l4 offset-m3">
                        <div class="card white darken-1">
                            <div class="card-content ">
                                <span class="card-title"><?php echo $bahadir->TRANSLATE_WORD("YÖNETİM PANELİ", 1); ?></span>
                                <div class="row">
                                    <form method="post" enctype="multipart/form-data" class="col s12">
                                        <div class="input-field col s12">
                                            <input style="padding-left:5px;" type="text" name="username" class="form-control" placeholder="<?php echo $bahadir->TRANSLATE_WORD("Kullanıcı Adı", 1); ?>" />
                                        </div>
                                        <div class="input-field col s12">
                                            <input style="padding-left:5px;" type="password" name="password" class="form-control" placeholder="<?php echo $bahadir->TRANSLATE_WORD("Parola", 1); ?>" />
                                        </div>                        
                                        <div class="col s12 right-align m-t-sm">
                                            <button type="submit" class="waves-effect waves-light btn teal">giriş</button>
                                        </div>
                                        <span style="color:red;text-align:left;float:left;margin-left:3px;">
                                            <?php
                                            if(isset($message)){ echo $bahadir->TRANSLATE_WORD($message, 1); }
                                            ?>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <!--<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>-->
    <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="assets/js/alpha.min.js"></script>
</body>
</html>