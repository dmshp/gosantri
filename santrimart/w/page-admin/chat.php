<?php 
include "../inc/koneksi.php";
session_start();
if($_SESSION['akses']==""){
	header("location:index.php?menu=login");
}
?>
<?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko"));
// print_r($a['tombol']);
$background     = $a['background'];
$headerfooter     = $a['headerfooter'];
$tombol             = $a['tombol'];
$logo             = $a['logo'];
$toko             = $a['nm_toko'];
$kodeChat = isset($_GET['id']) ? $_GET['id'] : "";

$user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT foto FROM tabel_member WHERE id_user = '$_SESSION[id_user]'"));
$foto       = $user['foto'];

function convertDate($tgl){
	date_default_timezone_set("Asia/Bangkok");
	$current = strtotime(date("Y-m-d"));
	$date    = strtotime(explode(" ",$tgl)[0]);
	$val 		 = date_create($tgl);
	$datediff = $date - $current;
	$difference = floor($datediff/(60*60*24));
	if($difference==0){
			return date_format($val,"H:i");
	}
	else if($difference < -6){
			return date_format($val,"d/m/Y");
	}
	else if($difference < -1){
			$day = date_format($val,"l");
			switch ($day) {
				case 'Sunday':
				$hari = 'Minggu';
				break;
				case 'Monday':
				$hari = 'Senin';
				break;
				case 'Tuesday':
				$hari = 'Selasa';
				break;
				case 'Wednesday':
				$hari = 'Rabu';
				break;
				case 'Thursday':
				$hari = 'Kamis';
				break;
				case 'Friday':
				$hari = 'Jum\'at';
				break;
				case 'Saturday':
				$hari = 'Sabtu';
				break;
				default:
				$hari = 'Tidak ada';
				break;
			}
			return $hari;
	}
	else{
			return 'Kemarin';
	}  
}
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
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- END: Custom CSS-->

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
                            <span id="chat-list">
								<ul class="chat-users-list-wrapper media-list">
									<?php
									$idUserActive = $_SESSION['id_user'];
									$ketQuery = "SELECT group_chat.*, chat.msg, chat.photo , chat.timesend 
									FROM chat, 
										(SELECT tm.id_user, tm.nm_user, tm.foto, tm.akses, COUNT(CASE WHEN tc.status='unread' AND tc.receiver_id = '$idUserActive' THEN tc.id END) as total, MAX(id) as id_chat 
											FROM chat tc INNER JOIN tabel_member tm 
											ON tc.sender_id = tm.id_user OR tc.receiver_id = tm.id_user 
											WHERE tm.id_user != '$idUserActive' and (tc.sender_id = '$idUserActive' OR tc.receiver_id = '$idUserActive') 
											GROUP BY tm.id_user, tm.nm_user, tm.foto, tm.akses
										) group_chat 
									where chat.id = group_chat.id_chat order by chat.timesend desc";
									$executeSat = mysqli_query($koneksi, $ketQuery);
									while ($a = mysqli_fetch_array($executeSat)) {
											$id = $a['id_user'];
											$url = $a['akses'];
											if($a['akses'] == 'member'){
												$url = 'user';
											}else if($a['akses'] == 'admin'){
												$url = 'toko';
											}

											$msg = $a['msg'];
											if($a['msg'] == ""){
												$msg = '<span data-testid="status-image" data-icon="status-image" class=""><svg viewBox="0 0 16 20" width="16" height="20" class=""><path fill="currentColor" d="M13.822 4.668H7.14l-1.068-1.09a1.068 1.068 0 0 0-.663-.278H3.531c-.214 0-.51.128-.656.285L1.276 5.296c-.146.157-.266.46-.266.675v1.06l-.001.003v6.983c0 .646.524 1.17 1.17 1.17h11.643a1.17 1.17 0 0 0 1.17-1.17v-8.18a1.17 1.17 0 0 0-1.17-1.169zm-5.982 8.63a3.395 3.395 0 1 1 0-6.79 3.395 3.395 0 0 1 0 6.79zm0-5.787a2.392 2.392 0 1 0 0 4.784 2.392 2.392 0 0 0 0-4.784z"></path></svg></span> Photo';
											}
									?>
									<a href="chat.php?id=<?php echo $id ?>">
										<li class="<?= $a['id_user'] == $kodeChat ? 'active' : '' ?>">
											<div class="pr-1">
												<span class="avatar m-0 avatar-md">
													<img class="media-object rounded-circle" src="../img/<?= $url ?>/<?= $a['foto'] ?>" onerror="this.src='../img/user/user.jpg';"
																height="40" width="40">
												</span>
											</div>
											<div class="user-chat-info">
												<div class="contact-info">
													<h5 class="font-weight-bold mb-0"><?php echo $a['nm_user'] ?></h5>
													<span class="truncate font-small-2"><?= $msg ?></span>
												</div>
												<div class="contact-meta">
													<div class="mb-25"><?= convertDate($a['timesend']) ?></div>
													<?php if($a['total']){ ?>
													<span class="badge badge-primary badge-pill float-right"><?= $a['total'] ?></span>
													<?php } ?>
												</div>
											</div>
										</li>
									</a>
									<?php } ?>
									</ul>
							</span>
                            <h3 class="primary p-1 mb-0">Contacts</h3>
                            <ul class="chat-user
                            s-list-wrapper media-list">
                                <?php
								$akses = "";
								if ($_SESSION['akses'] != 'merchant') { $akses = ",'merchant'"; }
                                $ketQuery = "SELECT * FROM tabel_member WHERE id_user != '$idUserActive' AND akses in ('admin' $akses) AND stt_user = 'AKTIF' ORDER BY akses, nm_user ASC";
                                $executeSat = mysqli_query($koneksi, $ketQuery);
                                $id = "";
                                while ($a = mysqli_fetch_array($executeSat)) {
                                    $id = $a['id_user'];
									$url = $a['akses'];
									if($a['akses'] == 'member'){
										$url = 'user';
									}else if($a['akses'] == 'admin'){
										$url = 'toko';
									}
                                ?>
                                <a href="chat.php?id=<?php echo $id ?>">
                                    <li>
                                        <div class="pr-1">
                                            <span class="avatar m-0 avatar-md">
                                                <img class="media-object rounded-circle" src="../img/<?= $url ?>/<?= $a['foto'] ?>" onerror="this.src='../img/user/user.jpg';"
                                                    height="40" width="40">
                                            </span>
                                        </div>
                                        <div class="user-chat-info">
                                            <div class="contact-info">
                                                <h5 class="font-weight-bold mb-0"><?php echo $a['nm_user']?></h5>
                                                <p class="truncate font-small-2"><?php echo $a['akses']?></p>
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
                            <div class="active-chat">
                                <div class="chat_navbar">
                                    <?php
                                    $i = $_SESSION['id_user'];
                                    $ketQuery = "SELECT * FROM tabel_member WHERE `id_user` = $kodeChat";
                                    $executeSat = mysqli_query($koneksi, $ketQuery);
									if($executeSat){
                                    	$row = mysqli_fetch_array($executeSat);
                                    ?>
                                    <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                        <div class="vs-con-items d-flex align-items-center">
                                            <div class="sidebar-toggle d-block d-lg-none mr-1"><i
                                                    class="feather icon-menu font-large-1"></i></div>
                                            <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                                <img src="../img/user/user.jpg" alt="" height="40" width="40" />
                                                <!--<span class="avatar-status-busy"></span>-->
                                            </div>
											<div>
												<h6 class="mb-0"><?= $row['nm_user'] ?></h6>
												<div style="font-size: 11px;margin-top: 4px;">Terakhir dilihat <span id="lastseen"><?= convertDate($row['log']) ?></span></div>
											</div>
                                        </div>
                                        <span class="favorite"><i class="feather icon-star font-medium-5"></i></span>
                                    </header>
                                    <?php }else{ ?>
                                    <header class="chat_header d-flex justify-content-between align-items-center p-1" style="background-color: #DFDBE5;">
                                        <div class="vs-con-items d-flex align-items-center">
                                            <div class="sidebar-toggle d-block d-lg-none mr-1"><i
                                                    class="feather icon-menu font-large-1"></i></div>
                                        </div>
                                    </header>
                                    <?php } ?>
                                </div>

								<?php if($executeSat){ ?>
                                <div class="user-chats mb-0 position-static overflow-auto d-flex flex-column-reverse" style="<?= $kodeChat == "" ? 'height: 665px;' : '' ?>">
                                    <div class="chats mb-0 <?= $kodeChat == "" ? 'hidden' : '' ?>" id="chat-box">
										<div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                  	</div>
									</div>
                                </div>
									<?php }else{ ?>
									<div class="start-chat-area">
											<span class="mb-1 start-chat-icon feather icon-message-square"></span>
											<h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
									</div>
									<?php } ?>
                        	</div>
            						</section>

							<div class="chat-app-form <?= $kodeChat == "" ? 'hidden' : '' ?>">
								<form class="chat-app-input chat-box d-flex " action="#" enctype="multipart/form-data"
										name="inputmsg" method="POST">
									<input type="text" class="form-control message mr-1 ml-50 " id="chat-input"
											placeholder="Tulis pesan"/>
									<input type="text" name="idSender" id="idSender" value="<?= $i ?>" hidden/>
									<input type="text" name="idReceiver" id="idReceiver" value="<?= $kodeChat ?>" hidden>
									<label for="sub" id="upload" class="btn btn-primary rounded-0 send mr-2">
										<i class="fas fa-paperclip"></i>
									</label>
									<input type="file" id="sub" name="gambar" style="display: none; visibility: hidden;" multiple
											onchange="sendphoto()" accept="image/png, image/jpeg"/>

									<button type="button" class="btn btn-primary rounded-0 send" name="submit" onclick="send()"
											id="submit">
										<i class=" fa fa-paper-plane-o"></i>
									</button>
								</form>
							</div>
                    </div>
                </div>

            </div>



        </div>
    </div>
    </div>
    </div>
    </div>
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-body text-center imgmodal"></div>
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
				$(".user-chats .ps__rail-x,.user-chats .ps__rail-y").hide();
            }
        })

        $.ajax({
            type: "GET",
            url: "get_chat_list.php",
            data: { idReceiver: idReceiver },
            success: function(data) {
                $('#chat-list').html(data);
				$('#lastseen').html($('#lastseen'+idReceiver).val())
            }
        })
    }, 1000)

		function openImg(src) {
			$(".imgmodal").html('<img src="'+src+'">')
		}


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
                //alert(data)
            }

        })
    }

		
		$(document).ready(function () {
			$('#chat-input').keyup(function(e){
				if(e.keyCode == 13)
				{
					send();
				}
			});
		});
		

    function send() {
        var idSender = $("#idSender").val();
        var idReceiver = $("#idReceiver").val();
        var chatp = document.getElementById("chat-input").value;
		if(chatp != ""){
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
    }
    </script>

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