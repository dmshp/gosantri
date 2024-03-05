<!DOCTYPE html>
<html>
<head>
  <title>Simple Click Events</title>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script type="module">
    import { Loader } from '@googlemaps/js-api-loader';

    const loader = new Loader({
      apiKey: 'AIzaSyAn663LJf_g9rRQONdNTWhA_jY9qPVY_f4', 
      version: 'weekly',
      libraries: ['geometry', 'places'],
    });

    loader.load().then(() => {
      initMap();
    });
  </script>
  <style>
    #map {
      height: 100%;
      max-width: 800px; 
      margin: 0 auto;  
    }

    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
  <div id="map"></div>

  <script>
    function initMap() {
      const myLatlng = { lat: -25.363, lng: 131.044 };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: myLatlng,
      });

      const marker = new google.maps.Marker({
        position: myLatlng,
        map,
        title: "Click to zoom",
      });

      map.addListener("center_changed", () => {
        window.setTimeout(() => {
          map.panTo(marker.getPosition());
        }, 3000);
      });

      marker.addListener("click", () => {
        map.setZoom(8);
        map.setCenter(marker.getPosition());
      });
    }
  </script>
</body>
</html>
