<style type="text/css">
	.mt-1, .my-1 {
	    margin-top: 8rem !important;
	}
</style>

<!-- BEGIN: Content-->

<div class="app-content content pt-1">
	<div class="content-overlay"></div>
	<div class="text-center mt-1">
		<img src="../img/toko/<?php echo $logo;?>" width="100" height="100" />
		<h1><?= $toko ?></h1>
	</div>
	<div class="content-wrapper">
		<section id="statistics-card">
			<div class="row">
					
				<div class="col-12">
					<div class="card text-center rounded">
						<div class="card-body">
								
							<h4 class="mb-0 line-ellipsis">
								Selamat datang <strong><?php echo $_SESSION['nm_user'] ;?></strong>, ini adalah halaman Utama.
							</h4>
						</div>
					</div>
				</div>

				<div class="col-12 list-order"></div>

			</div>

		</section>
		<!-- // Statistics Card section end-->

	</div>
</div>
	<!-- END: Content-->
	
	<script>
		//* jika diaktifkan :
		//	- update lokasi dan status
		//	- setInterval 10 detik
		//	- jika ada pesanan, bunyi alarm
		//* jika non aktif :
		//	- update lokasi dan status
		//	- interval berhenti
		var myInterval;
		var mySound = new Audio("../app-assets/bell.mp3");
		$(document).ready(function(){
	
			if($("#checkStatus:checked").length){
				getLocation();
				myInterval = setInterval(getLocation, 5000);
			}
	
			$('#checkStatus').change(function() {
					if(this.checked) {
						$(".kurir-status").html("<span class='color-success'>Aktif</span>");
						getLocation();
						myInterval = setInterval(getLocation, 5000);
					}else{
						$(".kurir-status").html("<span class='color-danger'>Tidak Aktif</span>");
						clearInterval(myInterval);
						getLocation()
					}
			});
		});
		
		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else {
				const status = $("#checkStatus:checked").length;
				updateStatus("", "", status)
			}
		}
	
		function showPosition(position) {
			const status = $("#checkStatus:checked").length;
			updateStatus(position.coords.latitude, position.coords.longitude, status)
		}
	
		function updateStatus(lat = "", lng = "", status) {
			$.ajax({
					url: "../aksi/edit_kurir_status.php",
					type: "post",
					data: { lat: lat, lng: lng, status: status },
					success: function(text) {
						if(text == 0){
							if($("#checkStatus:checked").length){
								$(".list-order").html("<div class='card text-center'><div class='card-body'><div class='spinner-border text-primary mb-1 color-success' role='status'></div><div>Menunggu Orderan</div></div></div>");
							}else{
								$(".list-order").html("");
							}
						}
						else{
							mySound.play();
							$(".list-order").html(text);
							$(".alamat_user strong").remove()
							$(".alamat_user div:nth-child(1), .alamat_user p").remove()
							$("form").each(function (id) {
								$("form:nth-child(" + (id + 1) + ") .almt_user").html($("form:nth-child(" + (id + 1) + ") .alamat_user div:nth-child(1)").html())
							});
							$(".alamat_user div:nth-child(1)").remove()
						}
					}
			})
		}
	</script>
<?php

?>