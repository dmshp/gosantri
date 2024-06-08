<?php
session_start();
include_once '../inc/koneksi.php';


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

$idReceiver = $_GET['idReceiver'];
?>

<ul class="chat-users-list-wrapper media-list">
<?php
$idUserActive = $_SESSION['id_user'];
$sql = "UPDATE tabel_member set log = NOW() WHERE id_user = '$idUserActive'";
mysqli_query($koneksi, $sql);

$ketQuery = "SELECT group_chat.*, chat.msg, chat.photo , chat.timesend 
FROM chat, 
	(SELECT tm.id_user, tm.nm_user, tm.foto, tm.akses, tm.log, COUNT(CASE WHEN tc.status='unread' AND tc.receiver_id = '$idUserActive' THEN tc.id END) as total, MAX(id) as id_chat 
		FROM chat tc INNER JOIN tabel_member tm 
		ON tc.sender_id = tm.id_user OR tc.receiver_id = tm.id_user 
		WHERE tm.id_user != '$idUserActive' and (tc.sender_id = '$idUserActive' OR tc.receiver_id = '$idUserActive') 
		GROUP BY tm.id_user, tm.nm_user, tm.foto, tm.akses, tm.log
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
		<li class="<?= $a['id_user'] == $idReceiver ? 'active' : '' ?>">
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
				<input type="hidden" id="lastseen<?= $a['id_user'] ?>" value="<?= convertDate($a['log']) ?>">
		</li>
</a>
<?php } ?>
</ul>