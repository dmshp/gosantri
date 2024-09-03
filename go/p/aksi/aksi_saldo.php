<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$id_user = $_SESSION['id_user'];

if (isset($_POST["deposit"])) {
  $jumlah = $_POST["jumlahDeposit"];

  if ($jumlah < 0) {
    echo "<script>alert('Deposit tidak boleh kurang dari 0 / minus(-)!');history.back()</script>";
  } else {
    $result = mysqli_query($koneksi, "SELECT tabel_saldo.id_saldo FROM tabel_saldo JOIN tabel_member ON (tabel_saldo.id_user = tabel_member.id_user) WHERE tabel_member.id_user = $id_user");
    $row = mysqli_fetch_assoc($result);
    $id_saldo = $row['id_saldo'];

    mysqli_query($koneksi, "UPDATE tabel_saldo SET jumlah = jumlah + $jumlah WHERE id_user = $id_user");

    $query = "INSERT INTO `tabel_saldo_history` (`id_saldo`, `deposit`, `keterangan`, `created_at`) 
            VALUES ('$id_saldo', '$jumlah', 'deposit', NOW())";

    if (mysqli_query($koneksi, $query)) {
      echo "<script>alert('Deposit berhasil!');history.back()</script>";
      return false;
    } else {
      echo "Error: " . mysqli_error($koneksi);
    }
  }
} else if (isset($_POST["withdraw"])) {
  $jumlah = $_POST["jumlahWithdraw"];

  if ($jumlah < 0) {
    echo "<script>alert('Withdraw tidak boleh kurang dari 0 / minus(-)!');history.back()</script>";
  } else {
    $result = mysqli_query($koneksi, "SELECT tabel_saldo.id_saldo, tabel_saldo.jumlah FROM tabel_saldo JOIN tabel_member ON (tabel_saldo.id_user = tabel_member.id_user) WHERE tabel_member.id_user = $id_user");
    $row = mysqli_fetch_assoc($result);
    $id_saldo = $row['id_saldo'];
    $jumlah_saldo = $row["jumlah"];

    if ($jumlah_saldo < $jumlah) {
      echo "<script>alert('Withdraw gagal!, saldo tidak cukup');history.back()</script>";
      return false;
    } else if ($jumlah_saldo >= $jumlah) {
      mysqli_query($koneksi, "UPDATE tabel_saldo SET jumlah = jumlah - $jumlah WHERE id_user = $id_user");
      $queryHistory = "INSERT INTO `tabel_saldo_history` (`id_saldo`, `withdraw`, `keterangan`, `created_at`) 
    VALUES ('$id_saldo', '$jumlah', 'withdraw', NOW())";

      if (mysqli_query($koneksi, $queryHistory)) {
        echo "<script>alert('Withdraw berhasil!');history.back()</script>";
        return false;
      } else {
        echo "Error: " . mysqli_error($koneksi);
      }
    }
  }
}
