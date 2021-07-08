<?php
?>

<footer class="main-footer">
  <strong>Copyright &copy; 2021 <a href="https://www.linkedin.com/in/taha-duman/">Taha Duman</a>.</strong>
  Tüm hakları saklıdır.
</footer>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4GmSXRQ0BAHdXgDQ2tkxJYqmA2G4qhqs&callback=initMap&libraries=&v=weekly" async></script>


	 <script>
        $(document).ready(function (){
			setInterval(haritaGuncelle, 3000);
			setInterval(sicaklikGuncelle, 3000);
        });
		 
		 function haritaGuncelle(){
			$.ajax({
				type: 'POST',
				url: 'lastLatLng.php',
				success: function(ajaxCevap) {
					var arrTemp = ajaxCevap.split("|");
					initMap(parseFloat(arrTemp[0]), parseFloat(arrTemp[1]));
				}
			});
		 }
		 function sicaklikGuncelle(){
			$.ajax({
				type: 'POST',
				url: 'lastTemp.php',
				success: function(ajaxCevap) {
					var arrTemp = ajaxCevap.split("|");
					//arrTemp[0] son sicaklik
					//arrTemp[1] son tarih
					//arrTemp[3] ilk sicaklik
					//arrTemp[4] son tarih
					
					drawChart(arrTemp[0],arrTemp[1],arrTemp[2],arrTemp[3],arrTemp[4],arrTemp[5]);
				}
			});
		 }
		 
		 //40.765206,29.9046325
      // Initialize and add the map
      function initMap(fltLat = 41, fltLng = 29) {
        // The location of Uluru
        const uluru = { lat: fltLat , lng: fltLng };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 16,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart(ates1,zaman1,ates2,zaman2,ates3,zaman3) {
        var data = google.visualization.arrayToDataTable([
          ['Zaman', 'Sıcaklık'],
          [zaman3,  parseFloat(ates3)],
		  [zaman2,  parseFloat(ates2)],
		  [zaman1,  parseFloat(ates1)],
        ]);

        var options = {
          title: 'Askerin Vücut Sıcaklığı',
          hAxis: {title: 'Zaman',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</body>
</html>

