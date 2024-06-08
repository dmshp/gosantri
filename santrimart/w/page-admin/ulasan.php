<style type="text/css">
	
/*	body{margin-top:20px;}*/
* {
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  box-sizing:border-box;
}

*:before, *:after {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

.clearfix {
  clear:both;
}

.text-center {text-align:center;}

a {
  color: tomato;
  text-decoration: none;
}

a:hover {
  color: #2196f3;
}

pre {
display: block;
padding: 9.5px;
margin: 0 0 10px;
font-size: 13px;
line-height: 1.42857143;
color: #333;
word-break: break-all;
word-wrap: break-word;
background-color: #F5F5F5;
border: 1px solid #CCC;
border-radius: 4px;
}

.header {
  padding:20px 0;
  position:relative;
  margin-bottom:10px;
  
}

.header:after {
  content:"";
  display:block;
  height:1px;
  background:#eee;
  position:absolute; 
  left:30%; right:30%;
}

.header h2 {
  font-size:3em;
  font-weight:300;
  margin-bottom:0.2em;
}

.header p {
  font-size:14px;
}



#a-footer {
  margin: 20px 0;
}

.new-react-version {
  padding: 20px 20px;
  border: 1px solid #eee;
  border-radius: 20px;
  box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);
  
  text-align: center;
  font-size: 14px;
  line-height: 1.7;
}

.new-react-version .react-svg-logo {
  text-align: center;
  max-width: 60px;
  margin: 20px auto;
  margin-top: 0;
}

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





.success-box {
  margin:20px 0;
  padding:10px 10px;
  border:1px solid #eee;
  background:#f9f9f9;
  border-radius: 10px;
}

.success-box img {
  margin-right:10px;
  display:inline-block;
  vertical-align:top;
}

.success-box > div {
  vertical-align:top;
  display:inline-block;
  color:#888;
}



/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}

</style>


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0 text-dark text-capitalize">
                            <?php echo $_SESSION['akses']; ?></h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="index.php?menu=history" class="text-dark">Ulasan</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Ulasan Detail</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-body">
                <div class="divider">
                    <div class="divider-text">
                        <h3 class="mb-3 display-4 text-uppercase">ULASAN DETAIL</h3>
                    </div>
                </div>

								
				<?php 
				isset($_GET['faktur']) ? $noFaktur = $_GET['faktur'] : $noFaktur='';
				$ketQuery = "SELECT * FROM tabel_pembelian as p, tabel_pembelian_status as ps WHERE no_faktur_pembelian = '$noFaktur' and p.status = ps.kd_pembelian_status";
				$executeSat = mysqli_query($koneksi, $ketQuery);
				$pemb = mysqli_fetch_array($executeSat);
				$id_pembelian = isset($pemb['id_pembelian_status']) ? $pemb['id_pembelian_status'] : '';
				$kd_pembelian = isset($pemb['kd_pembelian_status']) ? $pemb['kd_pembelian_status'] : '';
				$status 	  = isset($pemb['status']) ? $pemb['status'] : '';
				$nomor_faktur = isset($pemb['no_faktur_pembelian']) ? $pemb['no_faktur_pembelian'] : '';
				// var_dump($nomor_faktur); die();
				?>
				<input type="hidden" value="<?php echo $id_pembelian ?>" id="id_status">
				
			</div>

            <div class="card-body">
				<div class="row">
					<div class="col-lg-4 col-12">
						<div class="table-responsive">
							<table class="table table-striped customtb">
								<tbody>
										<?php
										$idUser = $user['id_user'];
										$ketQuery = "SELECT * FROM tabel_rinci_pembelian, tabel_barang_gambar, tabel_barang WHERE tabel_barang.kd_barang = tabel_rinci_pembelian.kd_barang AND tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND no_faktur_pembelian = '$noFaktur'";
										$executeSat = mysqli_query($koneksi, $ketQuery);
										while ($b = mysqli_fetch_array($executeSat)) {
												// print_r($b);
												$e = explode(",", $b['gambar']);

										?>
										<tr>
												<td><img src="../img/produk/<?php echo $e[0] ?>" width="50px" height="50px"></td>
												<td>
													<?php echo $b['nm_barang'] ?>
													<div>Rp<?php echo number_format($b['harga'], 0, ",", "."); ?> x <?php echo $b['jumlah'] ?></div>
												</td>
												<td align="right">
													Harga
													<div style="font-weight:600;">Rp<?php echo number_format($b['sub_total_beli'], 0, ",", "."); ?></div>
												</td>
										</tr>
										<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan=2 style="border-top: 1px dashed;">Total Pembelian : </td>
										<td align="right" style="border-top: 1px dashed;">Rp. <?= isset($pemb['total_pembelian']) ? number_format($pemb['total_pembelian'], 0, ",", ".") : '-'; ?></td>
									</tr>
									<tr>
										<td colspan=2>Biaya Pengiriman : </td>
										<td align="right">Rp. <?= isset($pemb['biaya_pengiriman']) ? number_format($pemb['biaya_pengiriman'], 0, ",", ".") : '-'; ?></td>
									</tr>
									<tr>
										<td colspan=2 style="border-top: 1px dashed;font-weight: bold;font-size: 18px;">Total Belanja : </td>
										<td  align="right" style="border-top: 1px dashed;font-weight: bold;font-size: 18px;">Rp. <?= isset($pemb['total_biaya']) ? number_format($pemb['total_biaya'], 0, ",", ".") : '-'; ?></td>
									</tr>
									<tr>
										<td colspan=2>Metode Pembayaran : </td>
										<td align="right"><?= isset($pemb['ket']) ? $pemb['ket'] : '-'; ?></td>
									</tr>
									<?php if($status == "diterima") { ?>
									<tr>
										<td colspan=2 style="border-top: 1px dashed; font-weight: bold;font-size: 18px;">Status Pembelian : </td>
										<td align="right" style="border-top: 1px dashed; font-weight: bold;font-size: 18px;">
											<button class="btn btn-danger btn-xs nama-user">
												<?= isset($pemb['status']) ? strtoupper($pemb['status']) : '-'; ?>
											</button>
										</td>
									</tr>
									<?php } ?>

								</tfoot>
							</table>
						</div>
					</div>
					<div class="col-lg-8 col-12">
						<div class="card">
							<div class="card-body pb-0">
								<div class="w-100 mb-1" style="border-bottom: 1px solid #49b5c3;">
									<h3>Beri Ulasan Sekarang</h3>
								</div>
								<div class="card-body">
									<form action="../aksi/add_ulasan_pembelian.php" method="POST" enctype="multipart/form-data">
										<input type="hidden" value="<?php echo $nomor_faktur ?>" id="no_faktur" name="no_faktur" readonly>
										<div class='rating-stars text-center'>
											<input type="hidden" id="rating" name="rating" readonly required>
										    <ul id='stars'>
										      <li class='star' title='Poor' data-value='1'>
										        <i class='fa fa-star fa-fw'></i>
										      </li>
										      <li class='star' title='Fair' data-value='2'>
										        <i class='fa fa-star fa-fw'></i>
										      </li>
										      <li class='star' title='Good' data-value='3'>
										        <i class='fa fa-star fa-fw'></i>
										      </li>
										      <li class='star' title='Excellent' data-value='4'>
										        <i class='fa fa-star fa-fw'></i>
										      </li>
										      <li class='star' title='WOW!!!' data-value='5'>
										        <i class='fa fa-star fa-fw'></i>
										      </li>
										    </ul>
										</div>
										  
										<div class='success-box'>
										    <div class='clearfix'></div>
										    <img alt='tick image' width='25' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
										    <div class='text-message'></div>
										    <div class='clearfix'></div>
										</div>
										<div class="form-group">
                        <label for="exampleFormControlInput1">Keterangan</label>
                        <textarea class="form-control" name="keterangan" cols="30" rows="5" placeholder="Tambahkan Keterangan" required></textarea>
                    </div>
                    <div class="badge badge-primary float-right">
                        <button type="submit" class="btn btn-success btn-xs">
												SIMPAN ULASAN
											</button>
                    </div>
                  </form>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <!-- END: Content-->
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

	$(".actions.clearfix").remove();
	let id_status = $("#id_status").val();
	id_status = id_status - 1;

	if(id_status != 5){
		$(".steps li").each(function (id) {
			if (id_status == id) {
				$('.steps li:nth-child(' + (id + 1) + ')').addClass("current");
				$('.steps li:nth-child(' + (id + 1) + ')').removeClass("disabled");
			}else if(id_status > id){
				$('.steps li:nth-child(' + (id + 1) + ')').removeClass("current");
				$('.steps li:nth-child(' + (id + 1) + ')').addClass("done disabled");
			}
		});
	}

	$('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue == 2) {
    	$('#rating').val('2');
        msg = "BURUK, Maaf kami akan tingkatkan pelayanan kami";
    } else if (ratingValue == 3) {
    	$('#rating').val('3');
        msg = "CUKUP BAGUS, Terima kasih atas kepercayaannya terhadap layanan kami";
    } else if (ratingValue == 4) {
    	$('#rating').val('4');
        msg = "BAGUS, Terima kasih atas kepercayaannya terhadap layanan kami";
    } else if (ratingValue == 5) {
    	$('#rating').val('5');
        msg = "SANGAT BAGUS, Terima kasih atas kepercayaannya terhadap layanan kami";
    }
    else {
    	$('#rating').val('1');
        msg = "BURUK SEKALI, Maaf kami akan perbaiki pelayanan kami";
    }
    responseMessage(msg);
    
  });

});

function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}

</script>