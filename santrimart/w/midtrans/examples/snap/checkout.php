<?php

// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview


namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-yltv-txCutx5RL4ebq-MRZvW';
Config::$clientKey = 'SB-Mid-client-AGuU8TKtN6ME612V';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;
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

// include "koneksi.php";

$order_id = $_GET['order_id'];
$tot_biaya = $_GET['total_biaya'];

$query = "SELECT * FROM tabel_pembelian as p, tabel_pembelian_status as ps, tabel_member as a, tabel_rinci_pembelian b, tabel_barang c WHERE p.status = ps.kd_pembelian_status and p.id_user = a.id_user and p.no_faktur_pembelian = b.no_faktur_pembelian and b.kd_barang = c.kd_barang and p.no_faktur_pembelian = '$order_id' order by p.tgl_pembelian desc;";

$a = mysqli_fetch_array(mysqli_query($koneksi, $query));
$hasil_email = isset($data['email_user']) ? $data['email_user'] : '';
$kd_barang  = isset($a['kd_barang']) ? $a['kd_barang'] : '';
$nm_barang  = isset($a['nm_barang']) ? $a['nm_barang'] : '';
$qty        = isset($a['jumlah']) ? $a['jumlah'] : '';
$nm_user    = isset($a['nm_user']) ? $a['nm_user'] : '';
$email_user = isset($a['email_user']) ? $a['email_user'] : '';
$hp_user    = isset($a['hp']) ? $a['hp'] : '';
// var_dump($nm_barang); die();             

// Required
$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $tot_biaya, // no decimal allowed for creditcard
);
// Optional
$item_details = array (
    array(
        'id' => $kd_barang,
        'price' => $tot_biaya,
        'quantity' => $qty,
        'name' => $nm_barang
    ),
  );
// Optional
$customer_details = array(
    'first_name'    => $nm_user,
    'last_name'     => "",
    'email'         => $email_user,
    'phone'         => $hp_user,
    // 'billing_address'  => $billing_address,
    // 'shipping_address' => $shipping_address
);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
}
catch (\Exception $e) {
    echo $e->getMessage();
}
// echo "snapToken = ".$snap_token;

function printExampleWarningMessage() {
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
        die();
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $toko; ?>">
    <meta name="keywords" content="<?php echo $toko; ?>">
    <meta name="author" content="<?php echo $toko; ?>">
    <!-- <title>Bootstrap Card</title> -->
    <title>.: <?php echo $toko; ?> :.</title>
    <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/<?php echo $logo; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style type="text/css">
    .nama-user{
        font-size: 12px;
        animation: blink-animation 1s steps(3, start) infinite;
        -webkit-animation: blink-animation 1s steps(3, start) infinite;
    }

    .text-user{
        color: #df0a0a;
        animation: blink-animation 1s steps(3, start) infinite;
        -webkit-animation: blink-animation 1s steps(3, start) infinite;
    }

    @keyframes blink-animation {
        to {
          visibility: hidden;
        }
    }

    @-webkit-keyframes blink-animation {
        to {
          visibility: hidden;
        }
    }
</style>
    <body> 
        <!-- <button id="pay-button">Pay!</button> -->

        <div class="container">
          <!-- <h2>Basic Card</h2> -->
          <br><br><br><br><br><br>
          <div class="card">
            <div class="card-body">
                <p class="text-user">Proses Registrasi Berhasil, Silahkan Melakukan Pembayaran Sekarang.</p>
                <button type="button" id="pay-button" name="pay-button" class="btn btn-primary">
                    PILIH METODE PEMBAYARAN
                </button>
            </div>
          </div>
        </div>

        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snap_token?>');
            };
        </script>
    </body>
</html>
