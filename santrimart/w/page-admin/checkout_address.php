<style>
	.select2-selection__rendered{
		font-size: 12px;
	}
	.alamatutama{
		border: 2px solid #49b5c3;
	}
	.div{
		margin: 0 5px 0 8px !important; border-left: 2px solid #dfdfdf !important;
	}
	.i-check{
		position: absolute;
    right: 20px;
    top: 60px;
    font-size: 20px;
    color: #49b5c3;
	}
	.alamatutama .fa-check {
		display: block;
  	visibility: inherit;
	}
	.aksi-button{
    color: #49b5c3;
		cursor: pointer;
	}
</style>
<div class="customer-card">
		<div class="card" style="border-bottom: 1px solid #49b5c3;">
				<div class="card-body pb-0">
						<div class="d-inline-block">
							<h3>Alamat Saya</h3>
							<p class="text-muted mt-25">Pastikan untuk memilih Alamat Utama </p>
						</div>
						<button type="button" onClick="tambah_alamat_modal()" class="btn btn-success mr-1 mb-1 waves-effect waves-light d-inline-block float-right">Tambah Alamat Baru</button>
				</div>
		</div>

		<div class="list_alamat"></div>
</div>
<div class="checkout-options">
		<div class="card">
				<div class="card-content">
						<div class="card-body">
								<hr>
								<input type="hidden" id="alamat_saya" value="1">
								<div class="price-details">
										<p>Price Details</p>
								</div>
								<div class="detail">
										<div class="detail-title">
												<p>Total </p>
										</div>
										<div class="detail-amt">
												<p id="total_harga_alamat">
														Rp.0</p>
										</div>
								</div>
								<div class="detail">
										<div class="details-title">
												Harga Pengiriman
										</div>
										<div class="detail-amt discount-amt">
												<input type="hidden" id="biaya_kirim_alamat" value="0">
												<input type="hidden" id="jarak" value="0">
												<input type="hidden" id="durasi" value="0">
												<p id="b_kirim_alamat">Rp.0</p>
										</div>
								</div>
								<hr>
								<div class="detail">
										<div class="detail-title detail-total">Total
										</div>
										<div class="detail-amt total-amt">
												<p id="harga_final_alamat">
														Rp.<?php echo $d['hrg_jual']; ?></p>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>

<!---------------------------------------- Modal Tambah Alamat------------------------------------>
<div class=" modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title font-medium-2 pr-2" id="myModalLabel20">Tambah Alamat Pengiriman</h4>
					<p class="text-muted mt-25">Pastikan untuk mencentang "Kirim
						ke alamat ini" setelah Anda selesai</p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
						<div class="row">
								<div class="col-md-6 col-sm-12">
										<div class="form-group">
												<label for="checkout-name">Nama
														penerima</label>
												<input type="text" class="form-control penerima">
										</div>
								</div>
								<div class="col-md-6 col-sm-12">
										<div class="form-group">
												<label
														for="checkout-number">No.Handphone:</label>
												<input type="number" class="form-control no_telp">
										</div>
								</div>

								<div class="col-md-6 col-sm-12">
										<label for="checkout-village">Kelurahan, Kecamatan, Kota, Provinsi, Kode Pos</label>
										<div class="form-group">
												<select name="village" class="village w-100">
													<option disabled selected>Inputkan Kelurahan/Kecamatan</option>
												</select>
										</div>
								</div>

								<div class="col-md-6 col-sm-12">
										<div class="form-group">
												<label for="checkout-landmark">Alamat
														Lengkap (nama jalan / gedung)</label>
												<input type="text" class="form-control alamat">
										</div>
								</div>

								<div class="col-md-12 col-sm-12">
										<div class="form-group">
												<label for="checkout-landmark">Pinpoint Lokasi</label>
												<div id="map_pin_add" class="w-100" style="height: 400px;"></div>
												<input type="hidden" class="lat_pin_add"></input>
												<input type="hidden" class="lng_pin_add"></input>
										</div>
								</div>

								<div class="col-md-6 col-sm-12">
										<div class="form-group">
												<label for="checkout-city">Catatan untuk kurir (opsional)</label>
												<input type="text" class="form-control catatan"
														placeholder="Warna rumah, patokan, pesan khusus, dll.">
										</div>
								</div>

								<div class="col-md-6 col-sm-12">
										<div class="form-group">
												<label for="checkout-city">Label Alamat</label>
												<div class="d-flex">
													<fieldset>
															<div class="vs-radio-con vs-radio-info mr-2">
																	<input type="radio" name="label" checked value="rumah">
																	<span class="vs-radio">
																			<span class="vs-radio--border"></span>
																			<span class="vs-radio--circle"></span>
																	</span>
																	<span class="">Rumah</span>
															</div>
													</fieldset>
													<fieldset>
															<div class="vs-radio-con vs-radio-info mr-2">
																	<input type="radio" name="label" value="apartemen">
																	<span class="vs-radio">
																			<span class="vs-radio--border"></span>
																			<span class="vs-radio--circle"></span>
																	</span>
																	<span class="">Apartemen</span>
															</div>
													</fieldset>
													<fieldset>
															<div class="vs-radio-con vs-radio-info mr-2">
																	<input type="radio" name="label" value="kantor">
																	<span class="vs-radio">
																			<span class="vs-radio--border"></span>
																			<span class="vs-radio--circle"></span>
																	</span>
																	<span class="">Kantor</span>
															</div>
													</fieldset>
													<fieldset>
															<div class="vs-radio-con vs-radio-info">
																	<input type="radio" name="label" value="kos">
																	<span class="vs-radio">
																			<span class="vs-radio--border"></span>
																			<span class="vs-radio--circle"></span>
																	</span>
																	<span class="">Kos</span>
															</div>
													</fieldset>
												</div>
										</div>
								</div>

								
								<div class="col-md-6 col-sm-12">
										<fieldset>
											<div class="vs-checkbox-con vs-checkbox-primary">
													<input type="checkbox" name="utama" checked value="false">
													<span class="vs-checkbox">
															<span class="vs-checkbox--check">
																	<i class="vs-icon feather icon-check"></i>
															</span>
													</span>
													<span class="">Jadikan alamat utama</span>
											</div>
									</fieldset>
								</div>
								<div class="col-md-6 col-sm-12">
										<div
												class="btn btn-primary rounded-0 float-right" onClick="tambah_alamat()">
												SIMPAN
										</div>
								</div>
						</div>
			</div>
		</div>
  </div>
</div>
<!---------------------------------------- Modal Tambah Alamat------------------------------------>

<!---------------------------------------- Modal Ubah Alamat------------------------------------>
<div class=" modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title font-medium-2 pr-2" id="myModalLabel20">Ubah Alamat Pengiriman</h4>
					<p class="text-muted mt-25">Pastikan untuk mencentang "Kirim
						ke alamat ini" setelah Anda selesai</p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
					<div class="row">
							<input type="hidden" class="form-control id_hidden">
							<div class="col-md-6 col-sm-12">
									<div class="form-group">
											<label for="checkout-name">Nama
													penerima</label>
											<input type="text" class="form-control penerima_edit">
									</div>
							</div>
							<div class="col-md-6 col-sm-12">
									<div class="form-group">
											<label
													for="checkout-number">No.Handphone:</label>
											<input type="number" class="form-control no_telp_edit">
									</div>
							</div>

							<div class="col-md-6 col-sm-12">
									<label for="checkout-village">Kelurahan, Kecamatan, Kota, Provinsi, Kode Pos</label>
									<div class="form-group">
											<select name="village" class="village_edit w-100">
												<option disabled selected>Inputkan Kelurahan/Kecamatan</option>
											</select>
									</div>
							</div>

							<div class="col-md-6 col-sm-12">
									<div class="form-group">
											<label for="checkout-landmark">Alamat
													Lengkap (nama jalan / gedung)</label>
											<input type="text" class="form-control alamat_edit">
									</div>
							</div>

							<div class="col-md-12 col-sm-12">
									<div class="form-group">
											<label for="checkout-landmark">Pinpoint Lokasi</label>
											<div id="map_pin_edit" class="w-100" style="height: 400px;"></div>
											<input type="hidden" class="lat_pin_edit"></input>
											<input type="hidden" class="lng_pin_edit"></input>
									</div>
							</div>

							<div class="col-md-6 col-sm-12">
									<div class="form-group">
											<label for="checkout-city">Catatan untuk kurir (opsional)</label>
											<input type="text" class="form-control catatan_edit"
													placeholder="Warna rumah, patokan, pesan khusus, dll.">
									</div>
							</div>

							<div class="col-md-6 col-sm-12">
									<div class="form-group">
											<label for="checkout-city">Label Alamat</label>
											<div class="d-flex">
												<fieldset>
														<div class="vs-radio-con vs-radio-info mr-2">
																<input type="radio" name="label_edit" checked value="rumah">
																<span class="vs-radio">
																		<span class="vs-radio--border"></span>
																		<span class="vs-radio--circle"></span>
																</span>
																<span class="">Rumah</span>
														</div>
												</fieldset>
												<fieldset>
														<div class="vs-radio-con vs-radio-info mr-2">
																<input type="radio" name="label_edit" value="apartemen">
																<span class="vs-radio">
																		<span class="vs-radio--border"></span>
																		<span class="vs-radio--circle"></span>
																</span>
																<span class="">Apartemen</span>
														</div>
												</fieldset>
												<fieldset>
														<div class="vs-radio-con vs-radio-info mr-2">
																<input type="radio" name="label_edit" value="kantor">
																<span class="vs-radio">
																		<span class="vs-radio--border"></span>
																		<span class="vs-radio--circle"></span>
																</span>
																<span class="">Kantor</span>
														</div>
												</fieldset>
												<fieldset>
														<div class="vs-radio-con vs-radio-info">
																<input type="radio" name="label_edit" value="kos">
																<span class="vs-radio">
																		<span class="vs-radio--border"></span>
																		<span class="vs-radio--circle"></span>
																</span>
																<span class="">Kos</span>
														</div>
												</fieldset>
											</div>
									</div>
							</div>

							
							<div class="col-md-6 col-sm-12">
									<fieldset>
										<div class="vs-checkbox-con vs-checkbox-primary">
												<input type="checkbox" name="utama_edit" class="utama_edit" value="false">
												<span class="vs-checkbox">
														<span class="vs-checkbox--check">
																<i class="vs-icon feather icon-check"></i>
														</span>
												</span>
												<span class="">Jadikan alamat utama</span>
										</div>
								</fieldset>
							</div>
							<div class="col-md-6 col-sm-12">
									<div
											class="btn btn-primary rounded-0 float-right" onClick="ubah_alamat()">
											SIMPAN
									</div>
							</div>
					</div>
			</div>
		</div>
  </div>
</div>
<!---------------------------------------- Modal Ubah Alamat------------------------------------>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHNblfcSOZhJKO9xAgLNk36xvvqgvoJ8w&callback=initMap">
</script>
<script type="text/javascript">
	$(".village").select2({ width: '100%' });
	var keyword; var timer; var modal = "";
	$(document).on('keyup', '.select2-search__field', function (e) {	
		
		clearTimeout(timer);
				
		keyword = this.value;
		
		timer = setTimeout(function () {
				search_wilayah(keyword, modal)
		}, 300);
		
	});

	function search_wilayah(keyword, modal) {
		if (keyword == "") {
			$('.village'+modal).html("<option disabled selected>Inputkan Kelurahan/Kecamatan</option>");
		} else {
				$.ajax({
						type: "POST",
						url: "../aksi/search_village.php",
						data: {
								nama: keyword,
						},
						success: function (data) {
								if (data.length == 0) {
										$('.village'+modal).html("<option disabled selected>Inputkan Kelurahan/Kecamatan</option>");
								} else {
									$('.village'+modal).html(data);
									$('.village'+modal).select2('close');
									$('.village'+modal).select2('open');
									$('.select2-search__field').val(keyword);
								}
						},
						error: function (err) {
						}
				});
		}
		
	}

	$(document).ready(function () {
		getLocation()
		show_all_alamat()
	});
	
	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
			initMap("add", arseFloat(-7.980498), parseFloat(112.6666))
			$('.lat_pin_add').val(-7.980498);
			$('.lng_pin_add').val(112.6666);
		}
	}

	function showPosition(position) {
		initMap("add", parseFloat(position.coords.latitude), parseFloat(position.coords.longitude))
	}

	function initMap(element, lat, long) {
			$('.lat_pin_'+element).val(lat);
			$('.lng_pin_'+element).val(long);
			// The location of Uluru
			var posisi = { lat: lat, lng: long };
			// The map, centered at Uluru
			var map = new google.maps.Map(
					document.getElementById('map_pin_'+element), {
							zoom: 16,
							center: posisi
					});
			// The marker, positioned at Uluru
			var marker = new google.maps.Marker({
					position: posisi,
					map: map,
					title: 'Drag Ke lokasi pengiriman',
					//animation: google.maps.Animation.BOUNCE,
					draggable: true
			});

			google.maps.event.addListener(marker, 'dragend', function (evt) {
					$('.lat_pin_'+element).val(evt.latLng.lat().toFixed(3));
					$('.lng_pin_'+element).val(evt.latLng.lng().toFixed(3));
			});
			map.setCenter(marker.position);
			marker.setMap(map);
	}
	
	function show_all_alamat() {
		$.ajax({
				url: "../aksi/show_all_alamat.php",
				type: "get",
				data: { user_id: <?= $user['id_user'] ?>
				},
				success: function(data) {
					$('.list_alamat').html(data);
					if(!data){
						$("#alamat_saya").val("0");
					}
					if($("#latitude_user").length){
						getOngkir()
					}

				}
		})
	}

	function getOngkir() {
		const latitude_toko = $("#latitude_toko").val();
		const longitude_toko = $("#longitude_toko").val();
		const latitude_user = $("#latitude_user").val();
		const longitude_user = $("#longitude_user").val();
		const total_berat = $("#total_berat").val();
		$.ajax({
				url: 'https://routing.openstreetmap.de/routed-car/route/v1/driving/'+ longitude_toko +','+ latitude_toko +';'+ longitude_user +','+ latitude_user,
				type: "get",
				data: {},
				success: function(data) {
					const jarak = Math.ceil(data.routes[0].distance / 1000);
					const durasi = Math.ceil(data.routes[0].duration / 60);
					const ongkir = jarak * 500 * Math.ceil(total_berat / 1000);
					$("#jarak").val(jarak);
					$("#durasi").val(durasi);
					$("#biaya_kirim_alamat").val(ongkir);
					$("#biaya_kirim").val(ongkir);
					$("#b_kirim_alamat").html("Rp. " + ongkir);
					$("#b_kirim").html("Rp. " + ongkir);
					cek_total()
				}
		})
		
		
	}
	
	function tambah_alamat_modal() {
		modal = "";
    $("#tambah").modal('show');
  }

	function tambah_alamat() {
			const user_id = <?= $user['id_user'] ?>;
			const penerima = $(".penerima").val();
			const no_telp = $(".no_telp").val();
			const village = $(".village").val();
			const alamat = $(".alamat").val();
			const lat_pin = $(".lat_pin_add").val();
			const lng_pin = $(".lng_pin_add").val();
			const catatan = $(".catatan").val();
			const label = $("input[name='label']:checked").val();
			let utama = 0;
			if($("input[name='utama']").prop("checked") == true){
					utama = 1;
			}
			
			if(penerima == "" || no_telp == "" || village == "" || alamat == ""){
				Swal.fire({
					icon: "error",
					tittle: "Gagal tambah alamat",
					text: "Periksa kembali penerima, no telp, wilayah dan alamat",
				}).then(function() {
				});
			}else{
				$.ajax({
						url: "../aksi/add_alamat.php",
						type: "post",
						data: { user_id: user_id, penerima: penerima, no_telp: no_telp, village: village, alamat: alamat, lat_pin: lat_pin, lng_pin: lng_pin, catatan: catatan, label: label, utama: utama
						},
						success: function(text) {
								Swal.fire(
									'Tambah Alamat',
									'Berhasil Tambah Alamat',
									'success'
								)
								$("#alamat_saya").val(text);
								$(".penerima").val("");
								$(".no_telp").val("");
								$(".village").val("");
								$(".alamat").val("");
								$(".lat_pin_add").val("");
								$(".lng_pin_add").val("");
								$(".catatan").val("");
    						$("#tambah").modal('hide');
								show_all_alamat()
						}
				})
			}
	}
	

  function statusAlamat(id) {
    $.ajax({
      type: "GET",
      url: "../aksi/edit_alamat_status.php?id=" + id + "&user_id=<?= $user['id_user'] ?>",
      async: false,
      success: function(text) {
				Swal.fire(
					'Ubah Alamat Utama',
					text,
					'success'
				)
				$("#alamat_saya").val(id);
				show_all_alamat();
      }
    });
  }

  function hapus(id) {
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			console.log(result)
			if (result.value) {
				$.ajax({
					type: "GET",
					url: "../aksi/delete_alamat.php?id=" + id,
					async: false,
					success: function(text) {
						Swal.fire(
							'Deleted!',
							text,
							'success'
						)
						show_all_alamat();
					}
				});
			}
		})
  }

  function show(id) {
    var response = [];
    let text = "";
    $.ajax({
      type: "GET",
      url: "../aksi/show_alamat.php?id=" + id,
      async: false,
      success: function(text) {
        response = JSON.parse(text);
      }
    });

    $('.id_hidden').val(response.id_alamat);
		$('.penerima_edit').val(response.nama_penerima)
		$('.no_telp_edit').val(response.no_telp);
		$('.village_edit').html(`<option value='${response.wilayah}' selected>${response.wilayah}</option>`);
		$(".village_edit").select2({ width: '100%' });
		$('.alamat_edit').val(response.alamat)
		$('.catatan_edit').val(response.catatan)
		$("input[name='label_edit'][value='" + response.label + "']").prop('checked', true);
		$('.utama_edit').prop('checked', response.status == "1" ? true : false);
		initMap("edit", parseFloat(response.latitude), parseFloat(response.longitude))

		modal = "_edit";
    $("#edit").modal('show');
  }

	function ubah_alamat() {
    	const id_hidden = $('.id_hidden').val();
			const penerima = $(".penerima_edit").val();
			const no_telp = $(".no_telp_edit").val();
			const village = $(".village_edit").val();
			const alamat = $(".alamat_edit").val();
			const lat_pin = $(".lat_pin_edit").val();
			const lng_pin = $(".lng_pin_edit").val();
			const catatan = $(".catatan_edit").val();
			const label = $("input[name='label_edit']:checked").val();
			let utama = 0;
			if($("input[name='utama_edit']").prop("checked") == true){
					utama = 1;
			}
			
			if(penerima == "" || no_telp == "" || village == "" || alamat == ""){
				Swal.fire({
					icon: "error",
					tittle: "Gagal tambah alamat",
					text: "Periksa kembali penerima, no telp, wilayah dan alamat",
				}).then(function() {
				});
			}else{
				$.ajax({
						url: "../aksi/edit_alamat.php",
						type: "post",
						data: { id_hidden: id_hidden, penerima: penerima, no_telp: no_telp, village: village, alamat: alamat, lat_pin: lat_pin, lng_pin: lng_pin, catatan: catatan, label: label, utama: utama
						},
						success: function(text) {
								Swal.fire(
									'Ubah Alamat',
									text,
									'success'
								)
    						$("#edit").modal('hide');
								show_all_alamat()
						}
				})
			}
	}
	
  </script>