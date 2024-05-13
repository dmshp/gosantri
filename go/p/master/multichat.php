<?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member"));
// print_r($a['tombol']);
// $background = $a['background'];
// $headerfooter = $a['headerfooter'];
// $tombol = $a['tombol'];
// $logo = $a['logo'];
// $toko = $a['nm_toko'];
$kodeChat = isset($_GET['id']) ? $_GET['id'] : "";

$user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT foto FROM tabel_member WHERE id_user = '$_SESSION[id_user]'"));
$foto = $user['foto'];

function convertDate($tgl)
{
    date_default_timezone_set("Asia/Bangkok");
    $current = strtotime(date("Y-m-d"));
    $date = strtotime(explode(" ", $tgl)[0]);
    $val = date_create($tgl);
    $datediff = $date - $current;
    $difference = floor($datediff / (60 * 60 * 24));
    if ($difference == 0) {
        return date_format($val, "H:i");
    } else if ($difference < -6) {
        return date_format($val, "d/m/Y");
    } else if ($difference < -1) {
        $day = date_format($val, "l");
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
    } else {
        return 'Kemarin';
    }
}
?>
<!-- BEGIN: Content-->

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
                            <img src="images/user/user.png" alt="user_avatar" height="70" width="70">
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
                                <textarea data-length="120" class="form-control char-textarea" id="textarea-counter"
                                    rows="5"
                                    placeholder="About User">Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.</textarea>
                            </fieldset>
                            <small class="counter-value float-right"><span class="char-count">108</span> / 120 </small>
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
                                <img src="images/user/user.png" alt="user_avatar" height="40" width="40">
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
                        $idUserActive = $_SESSION['id_user'];
                        $ketQuery = "SELECT tm.id_user, tm.nm_user, tm.foto, tm.akses, COUNT(CASE WHEN tc.status='unread' AND tc.receiver_id = ? THEN tc.id END) as total, MAX(tc.id) as id_chat, MAX(tc.timesend) as timesend, MAX(tc.msg) as msg
                FROM chat tc 
                INNER JOIN tabel_member tm ON tc.sender_id = tm.id_user OR tc.receiver_id = tm.id_user 
                WHERE tm.id_user != ? AND (tc.sender_id = ? OR tc.receiver_id = ?) 
                GROUP BY tm.id_user, tm.nm_user, tm.foto, tm.akses
                ORDER BY timesend DESC";

                        $stmt = $koneksi->prepare($ketQuery);
                        $stmt->bind_param("iiii", $idUserActive, $idUserActive, $idUserActive, $idUserActive);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($a = $result->fetch_assoc()) {
                                $id = $a['id_user'];
                                $msg = $a['msg'] ? $a['msg'] : '<span data-testid="status-image" data-icon="status-image" class=""><svg viewBox="0 0 16 20" width="16" height="20" class=""><path fill="currentColor" d="M13.822 4.668H7.14l-1.068-1.09a1.068 1.068 0 0 0-.663-.278H3.531c-.214 0-.51.128-.656.285L1.276 5.296c-.146.157-.266.46-.266.675v1.06l-.001.003v6.983c0 .646.524 1.17 1.17 1.17h11.643a1.17 1.17 0 0 0 1.17-1.17v-8.18a1.17 1.17 0 0 0-1.17-1.169zm-5.982 8.63a3.395 3.395 0 1 1 0-6.79 3.395 3.395 0 0 1 0 6.79zm0-5.787a2.392 2.392 0 1 0 0 4.784 2.392 2.392 0 0 0 0-4.784z"></path></svg></span> Photo';
                                ?>
                                <a href="?menu=mchat&id=<?= $id ?>">
                                    <li class="<?= $a['id_user'] == $kodeChat ? 'active' : '' ?>">
                                        <div class="pr-1">
                                            <span class="avatar m-0 avatar-md">
                                                <img class="media-object rounded-circle" src="./images/user/<?= $a['foto'] ?>"
                                                    onerror="this.src='./images/user/user.png';" height="40" width="40">
                                            </span>
                                        </div>
                                        <div class="user-chat-info">
                                            <div class="contact-info">
                                                <h5 class="font-weight-bold mb-0"><?= $a['nm_user'] ?></h5>
                                                <span class="truncate font-small-2"><?= $msg ?></span>
                                            </div>
                                            <div class="contact-meta">
                                                <div class="mb-25"><?= convertDate($a['timesend']) ?></div>
                                                <?php if ($a['total']) { ?>
                                                    <span
                                                        class="badge badge-primary badge-pill float-right"><?= $a['total'] ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                                <?php
                            }
                        } else {
                            // Tidak ada hasil yang ditemukan
                            echo "<p>Tidak ada percakapan yang tersedia.</p>";
                        }
                        ?>
                    </ul>

                    <h3 class="primary p-1 mb-0">Contacts</h3>
                    <!-- <ul class="chat-users-list-wrapper media-list">
                        <li>
                            <div class="pr-1">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="images/user/user.png" height="42" width="42"
                                        alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div>
                            <div class="user-chat-info">
                                <div class="contact-info">
                                    <h5 class="font-weight-bold mb-0">Sarah Woods</h5>
                                    <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake.
                                        Pudding cookie lemon drops icing.</p>
                                </div>
                                <div class="contact-meta">
                                    <span class="float-right mb-25"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pr-1">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="images/user/user.png" height="42" width="42"
                                        alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div>
                            <div class="user-chat-info">
                                <div class="contact-info">
                                    <h5 class="font-weight-bold mb-0">Jenny Perich</h5>
                                    <p class="truncate">Tart dragée carrot cake chocolate bar. Chocolate cake jelly
                                        beans caramels tootsie roll candy canes.</p>
                                </div>
                                <div class="contact-meta">
                                    <span class="float-right mb-25"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pr-1">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="images/user/user.png" height="42" width="42"
                                        alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div>
                            <div class="user-chat-info">
                                <div class="contact-info">
                                    <h5 class="font-weight-bold mb-0">Sarah Montgomery</h5>
                                    <p class="truncate">Tootsie roll sesame snaps biscuit icing jelly-o biscuit chupa
                                        chups powder.</p>
                                </div>
                                <div class="contact-meta">
                                    <span class="float-right mb-25"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pr-1">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="images/user/user.png" height="42" width="42"
                                        alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div>
                            <div class="user-chat-info">
                                <div class="contact-info">
                                    <h5 class="font-weight-bold mb-0">Heather Howell</h5>
                                    <p class="truncate">Tart cookie dragée sesame snaps halvah. Fruitcake sugar plum
                                        gummies cheesecake toffee.</p>
                                </div>
                                <div class="contact-meta">
                                    <span class="float-right mb-25"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pr-1">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="images/user/user.png" height="42" width="42"
                                        alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div>
                            <div class="user-chat-info">
                                <div class="contact-info">
                                    <h5 class="font-weight-bold mb-0">Kelly Reyes</h5>
                                    <p class="truncate">Wafer toffee tart jelly cake croissant chocolate bar cupcake
                                        donut. Fruitcake gingerbread tiramisu sweet jelly-o.</p>
                                </div>
                                <div class="contact-meta">
                                    <span class="float-right mb-25"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pr-1">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="images/user/user.png" height="42" width="42"
                                        alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div>
                            <div class="user-chat-info">
                                <div class="contact-info">
                                    <h5 class="font-weight-bold mb-0">Vincent Nelson</h5>
                                    <p class="truncate">Toffee gummi bears sugar plum gummi bears chocolate bar donut.
                                        Pudding cookie lemon drops icing</p>
                                </div>
                                <div class="contact-meta">
                                    <span class="float-right mb-25"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pr-1">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="images/user/user.png" height="42" width="42"
                                        alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div>
                            <div class="user-chat-info">
                                <div class="contact-info">
                                    <h5 class="font-weight-bold mb-0">Elizabeth Elliott</h5>
                                    <p class="truncate">Candy canes ice cream jelly beans carrot cake chocolate bar
                                        pastry candy jelly-o.</p>
                                </div>
                                <div class="contact-meta">
                                    <span class="float-right mb-25"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pr-1">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="images/user/user.png" height="42" width="42"
                                        alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div>
                            <div class="user-chat-info">
                                <div class="contact-info">
                                    <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>
                                    <p class="truncate">Marzipan bonbon chocolate bar biscuit lemon drops muffin jelly-o
                                        sweet jujubes.</p>
                                </div>
                                <div class="contact-meta">
                                    <span class="float-right mb-25"></span>
                                </div>
                            </div>
                        </li>
                    </ul> -->
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
                            $ketQuery = "SELECT * FROM tabel_member WHERE `id_user` = ?";
                            $stmt = $koneksi->prepare($ketQuery);
                            $stmt->bind_param("i", $kodeChat);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                ?>
                                <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                    <div class="vs-con-items d-flex align-items-center">
                                        <div class="sidebar-toggle d-block d-lg-none mr-1">
                                            <i class="feather icon-menu font-large-1"></i>
                                        </div>
                                        <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                            <img src="../img/user/user.jpg" alt="" height="40" width="40" />
                                        </div>
                                        <div>
                                            <h6 class="mb-0"><?= $row['nm_user'] ?></h6>
                                            <div style="font-size: 11px;margin-top: 4px;">Terakhir dilihat <span
                                                    id="lastseen"><?= convertDate($row['log']) ?></span></div>
                                        </div>
                                    </div>
                                    <span class="favorite"><i class="feather icon-star font-medium-5"></i></span>
                                </header>
                            <?php } else { ?>
                                <header class="chat_header d-flex justify-content-between align-items-center p-1"
                                    style="background-color: #DFDBE5;">
                                    <div class="vs-con-items d-flex align-items-center">
                                        <div class="sidebar-toggle d-block d-lg-none mr-1">
                                            <i class="feather icon-menu font-large-1"></i>
                                        </div>
                                    </div>
                                </header>
                            <?php } ?>
                        </div>

                        <?php if ($result->num_rows > 0) { ?>
                            <div class="user-chats mb-0 position-static overflow-auto d-flex flex-column-reverse"
                                style="<?= $kodeChat == "" ? 'height: 665px;' : '' ?>">
                                <div class="chats mb-0 <?= $kodeChat == "" ? 'hidden' : '' ?>" id="chat-box">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
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
                            placeholder="Tulis pesan" />
                        <input type="text" name="idSender" id="idSender" value="<?= $i ?>" hidden />
                        <input type="text" name="idReceiver" id="idReceiver" value="<?= $kodeChat ?>" hidden>
                        <label for="sub" id="upload" class="btn btn-primary rounded-0 send mr-2">
                            <i class="fas fa-paperclip"></i>
                        </label>
                        <input type="file" id="sub" name="gambar" style="display: none; visibility: hidden;" multiple
                            onchange="sendphoto()" accept="image/png, image/jpeg" />

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
<!-- END: Content-->