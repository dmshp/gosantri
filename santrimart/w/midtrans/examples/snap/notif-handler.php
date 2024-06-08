<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for sample HTTP notifications:
// https://docs.midtrans.com/en/after-payment/http-notification?id=sample-of-different-payment-channels

namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';
Config::$isProduction = false;
Config::$serverKey = 'SB-Mid-server-yltv-txCutx5RL4ebq-MRZvW';

// include "koneksi.php";

$servername = "localhost";
$username   = "root";
$password   = "";
$db         = "halimgol_santrimart";

$koneksi = mysqli_connect($servername, $username, $password, $db);

session_start();
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} else {
}


$a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tabel_toko`"));
$background     = $a['background'];
$headerfooter   = $a['headerfooter'];
$tombol         = $a['tombol'];
$logo           = $a['logo'];
$toko           = $a['nm_toko'];
$kd_toko        = $a['kd_toko'];
$almt_toko      = $a['almt_toko'];
$tlp_toko       = $a['tlp_toko'];
$latlng_toko    = $a['latitude'] . "," . $a['longitude'];
?>

<?php $user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE nm_user = '$_SESSION[nm_user]'"));
$foto       = $user['foto'];

// var_dump($toko); die();

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

try {
    $notif = new Notification();
}
catch (\Exception $e) {
    exit($e->getMessage());
}

$notif = $notif->getResponse();
$transaction = $notif->transaction_status;
$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;

$message = 'ok';

if ($transaction == 'capture') {
    // For credit card transaction, we need to check whether transaction is challenge by FDS or not
    if ($type == 'credit_card') {
        if ($fraud == 'challenge') {
            // TODO set payment status in merchant's database to 'Challenge by FDS'
            // TODO merchant should decide whether this transaction is authorized or not in MAP
            $message =  "Transaction order_id: " . $order_id ." is challenged by FDS";
        } else {
            // TODO set payment status in merchant's database to 'Success'
            $message =  "Transaction order_id: " . $order_id ." successfully captured using " . $type;
        }
    }
} else if ($transaction == 'settlement') {

    $query_update = "UPDATE tabel_pembelian a SET a.status = 'check', a.pembayaran = '2' WHERE a.no_faktur_pembelian = '$order_id';";
    $hasil = mysqli_query($koneksi, $query_update);

    // TODO set payment status in merchant's database to 'Settlement'
    $message =  "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
} else if ($transaction == 'pending') {

    $query_update = "UPDATE tabel_pembelian a SET a.status = 'pending', a.pembayaran = '11' WHERE a.no_faktur_pembelian = '$order_id';";
    $hasil = mysqli_query($koneksi, $query_update);

    // TODO set payment status in merchant's database to 'Pending'
    $message =  "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
} else if ($transaction == 'deny') {

    $query_update = "UPDATE tabel_pembelian a SET a.status = 'denied', a.pembayaran = '13' WHERE a.no_faktur_pembelian = '$order_id';";
    $hasil = mysqli_query($koneksi, $query_update);

    // TODO set payment status in merchant's database to 'Denied'
    $message =  "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
} else if ($transaction == 'expire') {

    $query_update = "UPDATE tabel_pembelian a SET a.status = 'batal', a.pembayaran = '9' WHERE a.no_faktur_pembelian = '$order_id';";
    $hasil = mysqli_query($koneksi, $query_update);

    // TODO set payment status in merchant's database to 'expire'
    $message =  "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
} else if ($transaction == 'cancel') {

    $query_update = "UPDATE tabel_pembelian a SET a.status = 'batal', a.pembayaran = '9' WHERE a.no_faktur_pembelian = '$order_id';";
    $hasil = mysqli_query($koneksi, $query_update);

    // TODO set payment status in merchant's database to 'Denied'
    $message =  "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
}

$filename = $order_id . ".txt";
$dirpath = 'log';
is_dir($dirpath) || mkdir($dirpath, 0777, true);

echo file_put_contents($dirpath . "/" . $filename, $message);

function printExampleWarningMessage() {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo 'Notification-handler are not meant to be opened via browser / GET HTTP method. It is used to handle Midtrans HTTP POST notification / webhook.';
    }
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-yltv-txCutx5RL4ebq-MRZvW\';');
        die();
    }   
}
