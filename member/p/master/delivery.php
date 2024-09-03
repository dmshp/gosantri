<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAn663LJf_g9rRQONdNTWhA_jY9qPVY_f4"></script>
</head>
<body>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Order SantriRide / SantriCar / SantriCarXL/ SantriSend</h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <span class="font-small-2"><strong>TENTUKAN DESTINASIMU </strong>, Cukup masukkan <i><u>lokasi awal & lokasi tujuan</u></i> kemana Kamu ingin pergi.</span><hr>
        <div class="row">
          <div class="col-md-6 col-6 mb-1">
            <fieldset>
              <label>Lokasi Anda</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <button class="btn btn-primary btn-icon"><i class="fa-solid fa-location-crosshairs"></i></button>
                </div>
                <input class="form-control form-control-sm" placeholder="Lokasi Penjemputan" required/>
              </div>
            </fieldset>           
          </div>

          <div class="col-md-6 col-6 mb-1">
            <fieldset>
              <label>Tujuan</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <button class="btn btn-primary btn-icon"><i class="fa-solid fa-location-crosshairs"></i></button>
                </div>
                <input class="form-control form-control-sm" placeholder="Lokasi Tujuan" required/>
              </div>
            </fieldset>           
          </div>

          <div class="col-md-6 col-7 mb-1">
            <fieldset>
              <div class="input-group">
                <select class="form-control form-control-sm">
                  <option>---Pembayaran---</option>
                  <option>Saldo</option>
                  <option>Transfer</option>
                  <option>CASH</option>
                </select>
              </div>
            </fieldset>           
          </div>

          <div class="col-md-6 col-5">              
            <button type="button" class="btn btn-danger btn-sm block mb-1">ORDER &nbsp;<i class="fa-solid fa-angles-right float-right"></i></button>
          </div>   

          <div class="col-md-12 col-12 mb-1">
            <h3>PETA DISINI</h3>
            <div id="maps" style="height: 47vh; width: 100%;"></div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d32654820.88251222!2d117.8888!3d-2.44565!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1690044063482!5m2!1sid!2sid" width="80%" style="border:0; height: 100vh" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>		 
      </div>
    </div>
  </div>

  <script>
    function initMap() {
      var mapOptions = {
        center: { lat: -6.2088, lng: 106.8456 }, 
        zoom: 13, 
      };
      var map = new google.maps.Map(document.getElementById('maps'), mapOptions);

      var marker = new google.maps.Marker({
        position: { lat: -6.2088, lng: 106.8456 },
        map: map,
        title: 'Lokasi Penjemputan'
      });
    }

    google.maps.event.addDomListener(window, 'load', initMap);
  </script>
</body>
</html>
