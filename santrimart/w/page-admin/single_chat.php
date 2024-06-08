<?php
include "../inc/koneksi.php";
session_start();
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
    header('location:../aut/login.php');
} else {
}
?>
<?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko"));
// print_r($a['tombol']);
$background    = $a['background'];
$headerfooter  = $a['headerfooter'];
$tombol        = $a['tombol'];
$logo          = $a['logo'];
$toko          = $a['nm_toko'];
$kodeMember = $_GET['id'];

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="<?php echo $toko; ?>">
    <meta name="keywords" content="<?php echo $toko; ?>">
    <meta name="author" content="<?php echo $toko; ?>">
    <meta http-equiv="refresh" content="1200">
    <title>.:<?php echo $_SESSION['nm_user']; ?>:.</title>
    <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/<?php echo $logo; ?>">
    <link href="../app-assets/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="../app-assets/font/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/app-chat.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu content-left-sidebar chat-application navbar-floating footer-static"
    data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar"
    style="background:<?php echo $background; ?>">
    <?php include '../inc/header.php'; ?>
    <!-- BEGIN: Content-->
    <div class="app-content content mb-5">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    <!-- User Chat profile area -->
                    <div class="chat-profile-sidebar">
                        <header class="chat-profile-header">
                            <span class="close-icon">
                                <i class="feather icon-x"></i>
                            </span>
                            <div class="header-profile-sidebar">
                                <div class="avatar">
                                    <img src="../img/icon/admin.jpg" height="70" width="70">
                                    <span class="avatar-status-online avatar-status-lg"></span>
                                </div>
                                <h4 class="chat-user-name">John Doe</h4>
                            </div>
                        </header>
                        <div class="profile-sidebar-area">
                            <div class="scroll-area">
                                <h6>About</h6>
                                <div class="about-user">
                                    <fieldset class="mb-0">
                                        <textarea data-length="120" class="form-control char-textarea"
                                            id="textarea-counter" rows="5"
                                            placeholder="About User">Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.</textarea>
                                    </fieldset>
                                    <small class="counter-value float-right"><span class="char-count">108</span> / 120
                                    </small>
                                </div>
                                <h6 class="mt-3">Status</h6>
                                <ul class="list-unstyled user-status mb-0">
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-success">
                                                <input type="radio" name="userStatus" value="online" checked="checked">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Active</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-danger">
                                                <input type="radio" name="userStatus" value="busy">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Do Not Disturb</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-warning">
                                                <input type="radio" name="userStatus" value="away">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Away</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-secondary">
                                                <input type="radio" name="userStatus" value="offline">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Offline</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ User Chat profile area -->
                    <!-- Chat Sidebar area -->
                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="chat-fixed-search">
                            <div class="d-flex align-items-center">
                                <div class="sidebar-profile-toggle position-relative d-inline-flex">
                                    <div class="avatar">
                                        <img src="../img/user/user.jpg" height="40" width="40">
                                        <span class="avatar-status-online"></span>
                                    </div>
                                    <div class="bullet-success bullet-sm position-absolute"></div>
                                </div>
                                <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                    <input type="text" class="form-control round" id="chat-search"
                                        placeholder="Search or start a new chat">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div id="users-list" class="chat-user-list list-group position-relative">
                            <h3 class="primary p-1 mb-0">Chats</h3>
                            <ul class="chat-users-list-wrapper media-list">
                                <?php
                                $ketQuery = "SELECT * FROM tabel_member WHERE id_user = '$kodeMember'";
                                $executeSat = mysqli_query($koneksi, $ketQuery);
                                while ($a = mysqli_fetch_array($executeSat)) {
                                    $id = $a['id_user'];
                                ?>
                                <a href="single_chat.php?id=<?php echo $id ?>">

                                    <li class="<?= $a['id_user'] == $kodeMember ? 'active' : '' ?>">
                                        <div class="pr-1">
                                            <span class="avatar m-0 avatar-md">
                                                <img class="media-object rounded-circle" src="../img/user/user.jpg"
                                                    height="40" width="40">
                                            </span>
                                        </div>
                                        <div class="user-chat-info">
                                            <div class="contact-info">
                                                <h5 class="font-weight-bold mb-0"><?php echo $a['nm_user'] ?></h5>
                                                <p class="truncate font-small-2">Status saya saat ini</p>
                                            </div>
                                            <div class="contact-meta">
                                                <span class="float-right mb-25">4:14 PM</span>
                                                <span class="badge badge-primary badge-pill float-right">3</span>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                                <?php } ?>
                            </ul>
             
                        </div>
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="chat-overlay"></div>
                        <section class="chat-app-window">
                            <!-- <div class="start-chat-area ">
                                <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                                <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                            </div> -->
                            <div class="active-chat">
                                <div class="chat_navbar">
                                    <?php
                                    $i = $_SESSION['id_user'];
                                    $kodeMember = $_GET['id'];
                                    $ketQuery = "SELECT * FROM tabel_member WHERE `id_user` = $kodeMember";
                                    $executeSat = mysqli_query($koneksi, $ketQuery);
                                    $row = mysqli_fetch_array($executeSat, MYSQLI_NUM);
                                    // print_r($_SESSION);
                                    if ($row != null) {
                                    ?>
                                    <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                        <div class="vs-con-items d-flex align-items-center">
                                            <div class="sidebar-toggle d-block d-lg-none mr-1"><i
                                                    class="feather icon-menu font-large-1"></i></div>
                                            <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                                <img src="../img/user/user.jpg" alt="" height="40" width="40" />
                                                <span class="avatar-status-busy"></span>
                                            </div>
                                            <h6 class="mb-0"><?php echo $row[3] ?></h6>
                                        </div>
                                        <span class="favorite"><i class="feather icon-star font-medium-5"></i></span>
                                    </header>
                                    <?php } ?>
                                </div>

                                <div class="user-chats mb-0">
                                    <div class="chats mb-0 " id="chat-box">

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="chat-app-form">
                    <form class="chat-app-input chat-box d-flex " action="#" enctype="multipart/form-data"
                        name="inputmsg" method="POST">
                        <input type="text" class="form-control message mr-1 ml-50 " id="chat-input"
                            placeholder="Tulis pesan">
                        <input type="text" name="idSender" id="idSender" value="<?= $i ?>" hidden>
                        <input type="text" name="idReceiver" id="idReceiver" value="<?= $kodeMember ?>" hidden>
                        <label for="sub" id="upload" class="btn btn-primary rounded-0 send mr-2"><i
                                class="fas fa-paperclip"></i></label>
                        <input type="file" id="sub" name="gambar" style="display: none; visibility: hidden;" multiple
                            onchange="sendphoto()" accept="image/png, image/jpeg"></input>

                        <button type="button" class="btn btn-primary rounded-0 send" name="submit" onclick="send()"
                            id="submit">
                            <i class=" fa fa-paper-plane-o"></i></button>
                    </form>
                </div>
            </div>
            </section>



        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- END: Content-->
    <script type="text/javascript">
    setInterval(() => {
        var idSender = $("#idSender").val();
        var idReceiver = $("#idReceiver").val();
        var chatp = document.getElementById("chat-input").value;

        $.ajax({
            type: "GET",
            url: "get_chat.php",
            data: {
                idSender: idSender,
                idReceiver: idReceiver,
            },
            success: function(data) {
                $('#chat-box').html(data);
            }
        })
    }, 1000)


    function sendphoto() {
        var idSender = $("#idSender").val();
        var idReceiver = $("#idReceiver").val();
        var file_data = $("#sub").prop("files")[0];
        var form_data = new FormData(); // Creating object of FormData class
        form_data.append("file", file_data);
        form_data.append("idSender", idSender);
        form_data.append("idReceiver", idReceiver);
        $.ajax({
            url: "../aksi/add_photo.php",
            type: "post",
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                alert(data)
            }

        })
    }

    function send() {
        var idSender = $("#idSender").val();
        var idReceiver = $("#idReceiver").val();
        var chatp = document.getElementById("chat-input").value;
        $.ajax({
            url: "add_chat.php",
            type: "post",
            data: {
                idSender: idSender,
                idReceiver: idReceiver,
                // photo: photo,
                chatp: chatp
            },
            success: function(data) {
                document.getElementById("chat-input").value = "";
            }
        })

    }


    function enter() {
        var file = $('#sub')[0].files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e) {
            var img = $('#image_preview');
            img.attr('src', this.result);

        }

        var html = '<div class="chat-content">' + '<img id="image_preview" width="100px" height="100px">' +
            "</img>" +
            "</div>";
        $(".chat:last-child .chat-body").append(html);
        $(".message").val("");
        $(".user-chats").scrollTop($(".user-chats > .chats").height());

    }
    </script>

    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../app-assets/vendors/js/vendors.min.js"></script>

    <!-- BEGIN: Vendor JS-->
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
    <script src="../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pages/app-chat.js"></script>

    <!-- END: Page JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>

</body>
<!-- END: Body-->

</html><?php
include "../inc/koneksi.php";
session_start();
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
    header('location:../aut/login.php');
} else {
}
?>
<?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko"));
// print_r($a['tombol']);
$background     = $a['background'];
$headerfooter     = $a['headerfooter'];
$tombol             = $a['tombol'];
$logo             = $a['logo'];
$toko             = $a['nm_toko'];
$kodeMember = $_GET['id'];

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="<?php echo $toko; ?>">
    <meta name="keywords" content="<?php echo $toko; ?>">
    <meta name="author" content="<?php echo $toko; ?>">
    <meta http-equiv="refresh" content="1200">
    <title>.:<?php echo $_SESSION['nm_user']; ?>:.</title>
    <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/<?php echo $logo; ?>">
    <link href="../app-assets/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="../app-assets/font/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/app-chat.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu content-left-sidebar chat-application navbar-floating footer-static"
    data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar"
    style="background:<?php echo $background; ?>">
    <?php include '../inc/header.php'; ?>
    <!-- BEGIN: Content-->
    <div class="app-content content mb-5">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    <!-- User Chat profile area -->
                    <div class="chat-profile-sidebar">
                        <header class="chat-profile-header">
                            <span class="close-icon">
                                <i class="feather icon-x"></i>
                            </span>
                            <div class="header-profile-sidebar">
                                <div class="avatar">
                                    <img src="../img/icon/admin.jpg" height="70" width="70">
                                    <span class="avatar-status-online avatar-status-lg"></span>
                                </div>
                                <h4 class="chat-user-name">John Doe</h4>
                            </div>
                        </header>
                        <div class="profile-sidebar-area">
                            <div class="scroll-area">
                                <h6>About</h6>
                                <div class="about-user">
                                    <fieldset class="mb-0">
                                        <textarea data-length="120" class="form-control char-textarea"
                                            id="textarea-counter" rows="5"
                                            placeholder="About User">Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.</textarea>
                                    </fieldset>
                                    <small class="counter-value float-right"><span class="char-count">108</span> / 120
                                    </small>
                                </div>
                                <h6 class="mt-3">Status</h6>
                                <ul class="list-unstyled user-status mb-0">
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-success">
                                                <input type="radio" name="userStatus" value="online" checked="checked">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Active</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-danger">
                                                <input type="radio" name="userStatus" value="busy">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Do Not Disturb</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-warning">
                                                <input type="radio" name="userStatus" value="away">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Away</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-secondary">
                                                <input type="radio" name="userStatus" value="offline">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Offline</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ User Chat profile area -->
                    <!-- Chat Sidebar area -->
                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="chat-fixed-search">
                            <div class="d-flex align-items-center">
                                <div class="sidebar-profile-toggle position-relative d-inline-flex">
                                    <div class="avatar">
                                        <img src="../img/user/user.jpg" height="40" width="40">
                                        <span class="avatar-status-online"></span>
                                    </div>
                                    <div class="bullet-success bullet-sm position-absolute"></div>
                                </div>
                                <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                    <input type="text" class="form-control round" id="chat-search"
                                        placeholder="Search or start a new chat">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div id="users-list" class="chat-user-list list-group position-relative">
                            <h3 class="primary p-1 mb-0">Chats (Baru mulai)</h3>
                            <ul class="chat-users-list-wrapper media-list">
                                <?php
                                $ketQuery = "SELECT * FROM tabel_member WHERE akses = 'admin' ORDER BY nm_user ASC";
                                $executeSat = mysqli_query($koneksi, $ketQuery);
                                while ($a = mysqli_fetch_array($executeSat)) {
                                    $id = $a['id_user'];
                                    // print_r($a);
                                ?>
                                <a href="chat.php?id=<?php echo $id ?>">

                                    <li class="<?= $a['id_user'] == $kodeMember ? 'active' : '' ?>">
                                        <div class="pr-1">
                                            <span class="avatar m-0 avatar-md">
                                                <img class="media-object rounded-circle" src="../img/user/user.jpg"
                                                    height="40" width="40">
                                            </span>
                                        </div>
                                        <div class="user-chat-info">
                                            <div class="contact-info">
                                                <h5 class="font-weight-bold mb-0"><?php echo $a['nm_user'] ?></h5>
                                                <p class="truncate font-small-2">Status saya saat ini</p>
                                            </div>
                                            <div class="contact-meta">
                                                <span class="float-right mb-25">4:14 PM</span>
                                                <span class="badge badge-primary badge-pill float-right">3</span>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                                <?php } ?>
                            </ul>
                            <h3 class="primary p-1 mb-0">Contacts</h3>
                            <ul class="chat-user
                            s-list-wrapper media-list">
                                <?php
                                $idUserActive = $_SESSION['id_user'];
                                $ketQuery = "SELECT * FROM tabel_member WHERE akses != 'member' AND id_user != '$idUserActive' AND akses != 'admin' ORDER BY akses, nm_user ASC";
                                $executeSat = mysqli_query($koneksi, $ketQuery);
                                $id = "";
                                while ($a = mysqli_fetch_array($executeSat)) {
                                    $id = $a['id_user'];
                                ?>
                                <a href="chat.php?id=<?php echo $id ?>">
                                    <li class="<?= $a['id_user'] == $kodeMember ? 'active' : '' ?>">
                                        <div class="pr-1">
                                            <span class="avatar m-0 avatar-md">
                                                <img class="media-object rounded-circle" src="../img/user/user.jpg"
                                                    height="40" width="40">
                                            </span>
                                        </div>
                                        <div class="user-chat-info">
                                            <div class="contact-info">

                                                <h5 class="font-weight-bold mb-0"><?php echo $a['nm_user'] ?></h5>
                                                <p class="truncate font-small-2"><?php echo $a['akses'] ?></p>
                                            </div>
                                            <div class="contact-meta">
                                                <span class="float-right mb-25">4:14 PM</span>
                                                <span class="badge badge-primary badge-pill float-right">3</span>
                                            </div>
                                        </div>

                                    </li>
                                </a>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="chat-overlay"></div>
                        <section class="chat-app-window">
                            <!-- <div class="start-chat-area ">
                                <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                                <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                            </div> -->
                            <div class="active-chat">
                                <div class="chat_navbar">
                                    <?php
                                    $i = $_SESSION['id_user'];
                                    $kodeMember = $_GET['id'];
                                    $ketQuery = "SELECT * FROM tabel_member WHERE `id_user` = $kodeMember";
                                    $executeSat = mysqli_query($koneksi, $ketQuery);
                                    $row = mysqli_fetch_array($executeSat, MYSQLI_NUM);
                                    // print_r($_SESSION);
                                    if ($row != null) {
                                    ?>
                                    <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                        <div class="vs-con-items d-flex align-items-center">
                                            <div class="sidebar-toggle d-block d-lg-none mr-1"><i
                                                    class="feather icon-menu font-large-1"></i></div>
                                            <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                                <img src="../img/user/user.jpg" alt="" height="40" width="40" />
                                                <span class="avatar-status-busy"></span>
                                            </div>
                                            <h6 class="mb-0"><?php echo $row[3] ?></h6>
                                        </div>
                                        <span class="favorite"><i class="feather icon-star font-medium-5"></i></span>
                                    </header>
                                    <?php } ?>
                                </div>

                                <div class="user-chats mb-0">
                                    <div class="chats mb-0 " id="chat-box">

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="chat-app-form">
                    <form class="chat-app-input chat-box d-flex " action="#" enctype="multipart/form-data"
                        name="inputmsg" method="POST">
                        <input type="text" class="form-control message mr-1 ml-50 " id="chat-input"
                            placeholder="Tulis pesan">
                        <input type="text" name="idSender" id="idSender" value="<?= $i ?>" hidden>
                        <input type="text" name="idReceiver" id="idReceiver" value="<?= $kodeMember ?>" hidden>
                        <label for="sub" id="upload" class="btn btn-primary rounded-0 send mr-2"><i
                                class="fas fa-paperclip"></i></label>
                        <input type="file" id="sub" name="gambar" style="display: none; visibility: hidden;" multiple
                            onchange="sendphoto()" accept="image/png, image/jpeg"></input>

                        <button type="button" class="btn btn-primary rounded-0 send" name="submit" onclick="send()"
                            id="submit">
                            <i class=" fa fa-paper-plane-o"></i></button>
                    </form>
                </div>
            </div>
            </section>



        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- END: Content-->
    <script type="text/javascript">
    setInterval(() => {
        var idSender = $("#idSender").val();
        var idReceiver = $("#idReceiver").val();
        var chatp = document.getElementById("chat-input").value;

        $.ajax({
            type: "GET",
            url: "get_chat.php",
            data: {
                idSender: idSender,
                idReceiver: idReceiver,
            },
            success: function(data) {
                $('#chat-box').html(data);
            }
        })
    }, 1000)


    function sendphoto() {
        var idSender = $("#idSender").val();
        var idReceiver = $("#idReceiver").val();
        var file_data = $("#sub").prop("files")[0];
        var form_data = new FormData(); // Creating object of FormData class
        form_data.append("file", file_data);
        form_data.append("idSender", idSender);
        form_data.append("idReceiver", idReceiver);
        $.ajax({
            url: "../aksi/add_photo.php",
            type: "post",
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                alert(data)
            }

        })
    }

    function send() {
        var idSender = $("#idSender").val();
        var idReceiver = $("#idReceiver").val();
        var chatp = document.getElementById("chat-input").value;
        $.ajax({
            url: "add_chat.php",
            type: "post",
            data: {
                idSender: idSender,
                idReceiver: idReceiver,
                // photo: photo,
                chatp: chatp
            },
            success: function(data) {
                document.getElementById("chat-input").value = "";
            }
        })

    }


    function enter() {
        var file = $('#sub')[0].files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e) {
            var img = $('#image_preview');
            img.attr('src', this.result);

        }

        var html = '<div class="chat-content">' + '<img id="image_preview" width="100px" height="100px">' +
            "</img>" +
            "</div>";
        $(".chat:last-child .chat-body").append(html);
        $(".message").val("");
        $(".user-chats").scrollTop($(".user-chats > .chats").height());

    }
    </script>

    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../app-assets/vendors/js/vendors.min.js"></script>

    <!-- BEGIN: Vendor JS-->
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
    <script src="../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pages/app-chat.js"></script>

    <!-- END: Page JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>

</body>
<!-- END: Body-->

</html>