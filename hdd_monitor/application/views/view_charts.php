<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HDD disk space checker by tr4c3r</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="http://rully.tr4c3r.dev/HDD-Monitoring/hdd_monitor/public/highcharts/js/highcharts.js" type="text/javascript"></script>
	<script src="http://rully.tr4c3r.dev/HDD-Monitoring/hdd_monitor/public/highcharts/js/modules/exporting.js"></script>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>

<script type="text/javascript">
    var chart1; // globally available
	$(document).ready(function() {
            chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'line'
             },
             title: {
                text: 'HDD Space Consumption Month <?php echo "January" ?>'
             },
	     subtitle: {
                text: 'Source : http://rully.tr4c3r.dev/'
             },
             xAxis: {
                categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31']
             },
             yAxis: {
                title: {
                   text: 'Percentage Used'
                },
		labels: {
                    formatter: function() {
                        return this.value +'%'
                    }
                }
             },
             tooltip: {
                crosshairs: true,
                shared: true
             },
             plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
             },
             series: [{
                name: '/dev/sda1 (/)',
                data: [10, 0, 14, 10, 0, 14, 10, 0, 14, 10, 0, 14, 10, 0, 14, 10, 0, 14, 10, 99, 14, 10, 0, 14, 10, 0, 14, 10, 0, 14, 14]
             }, {
                name: '/dev/sda2 (/home)',
                data: [5, 7, 3, 5, 7, 3, 5, 7, 3, 5, 7, 3, 5, 7, 3, 5, 7, 3, 5, 7, 3, 5, 7, 3, 5, 7, 3, 5, 7, 3, 7]
             }]
          });
       });
</script>

</head>
<body>

<h1>Testing Highcharts</h1>

<div id="container">

</div>

<div id="bottom_nav">
	<input type=button value="Back" onClick="window.history.back()">
</div>

</body>
</html>
