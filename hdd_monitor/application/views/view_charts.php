<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HDD disk space checker by tr4c3r</title>
	<script src="http://ryan.pakar/HDD-Monitoring/hdd_monitor/public/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="http://ryan.pakar/HDD-Monitoring/hdd_monitor/public/highcharts/js/highcharts.js" type="text/javascript"></script>
	<script src="http://ryan.pakar/HDD-Monitoring/hdd_monitor/public/highcharts/js/modules/exporting.js"></script>

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
<?php 
    function switch_month($month) {
	switch($month) {
	    case "01" : return "January";
	    case "02" : return "February";
	    case "03" : return "March";
	    case "04" : return "April";
	    case "05" : return "May";
	    case "06" : return "June";
	    case "07" : return "July";
	    case "08" : return "August";
	    case "09" : return "September";
	    case "10" : return "October";
	    case "11" : return "November";
	    case "12" : return "December";
	}
    }

    function total_days_month($month,$year) {
	if (($year %4) == 0) {	
	    switch($month) {
		case "01" : return "31";
		case "02" : return "29";
		case "03" : return "31";
		case "04" : return "30";
		case "05" : return "31";
		case "06" : return "30";
		case "07" : return "31";
		case "08" : return "31";
		case "09" : return "30";
		case "10" : return "31";
		case "11" : return "30";
		case "12" : return "31";
	    }
	} else {	
	    switch($month) {
		case "01" : return "31";
		case "02" : return "28";
		case "03" : return "31";
		case "04" : return "30";
		case "05" : return "31";
		case "06" : return "30";
		case "07" : return "31";
		case "08" : return "31";
		case "09" : return "30";
		case "10" : return "31";
		case "11" : return "30";
		case "12" : return "31";
	    }
	}
    }

    function get_data_percent($IP,$device,$month, $year) {
	    if($device == "all") { 
		$sql = mysql_query("select device from hdd_device where IP = '$IP' order by device asc");
		while ($row = mysql_fetch_assoc($sql)) {
		    $devices[] = $row['device'];
		}
		foreach ($devices as $device) {
		    $sql2 = mysql_query("select percent, mount_on, device, day, month, year from hdd_status where IP = '$IP' and device = '$device' and month = '$month' and year = '$year' order by day");
		    while ($row2 = mysql_fetch_assoc($sql2)) {
			$device = $row2['device'];
			$mount_point = $row2['mount_on'];
			$day = $row2['day'];
			$month = $row2['month'];
			$year = $row2['year'];
			$percent = $row2['percent'];
			$values[] = explode(",","$day,$percent");
		    }
		    #var_dump($values);
		    $days = total_days_month($month,$year);
		    $n = "0";
		    for($i=1;$i<=$days;$i++) {
			if(!isset($values[$n][0])){$data_single[] = "0";}
			elseif(($i %$values[$n][0]) == 0) {
			    $data_single[] = $values[$n][1];
			    $n++;
			} else {
			    $data_single[] = "0";
			}
		    }
		    #$data_graph[] = $data_single;
		    $data_graph[] = "{
			name: '$device ($mount_point)',
			data: [".implode(",",$data_single)."]
		      }";
		    $data_single = "";
		    $values = "";
		}
		return $data_graph;
		#var_dump($day_percent);

	    } else { 
		$sql2 = mysql_query("select percent, mount_on, device, day, month, year from hdd_status where IP = '$IP' and device = '$device' and month = '$month' and year = '$year' order by day");
		while ($row2 = mysql_fetch_assoc($sql2)) {
		    $device = $row2['device'];
		    $mount_point = $row2['mount_on'];
		    $day = $row2['day'];
		    $month = $row2['month'];
		    $year = $row2['year'];
		    $percent = $row2['percent'];
		    $values[] = explode(",","$day,$percent");
		}
		#var_dump($values);
		$days = total_days_month($month,$year);
		$n = "0";
		for($i=1;$i<=$days;$i++) {
		    if(!isset($values[$n][0])){$data_single[] = "0";}
		    elseif(($i %$values[$n][0]) == 0) {
			$data_single[] = $values[$n][1];
			$n++;
		    } else {
			$data_single[] = "0";
		    }
		}
		#$data_graph[] = $data_single;
		$data_graph[] = "{
		    name: '$device ($mount_point)',
		    data: [".implode(",",$data_single)."]
		}";
		$data_single = "";
		$values = "";
	    }
		return $data_graph;
	} 
    function get_device($IP) {
	$sql = mysql_query("select device from hdd_device where IP = '$IP' order by device asc");
	while ($row = mysql_fetch_assoc($sql)) {
	    $devices[] = $row['device'];
	}
	return $devices;
    }
    
    function get_username($IP) {
	$sql = mysql_query("select username_hdd from harddisk where IP = '$IP'");
	while ($row = mysql_fetch_assoc($sql)) {
	    $name = $row['username_hdd'];
	}
	return $name;
    }
    
    $name = get_username($IP);
?>
<script type="text/javascript">
    var zoomRatio = 1;
    var lastX;
    var lastY;
    var mouseDown;
	Highcharts.setOptions({
	chart: {
	    zoomType: 'xy'
	}
    });
  
    function createData() {
	var arr = [];
	for (var i = 0; i < 200; i++) {
	    arr.push(Math.random()*100);
	}
	return arr;
    }

    var chart1; // globally available
	$(document).ready(function() {
	    chart1 = new Highcharts.Chart({
	    chart: {
		renderTo: 'container',
		type: 'line'
	      },
	      title: {
		text: 'HDD Space Consumption Month <?php echo switch_month($month)." ".$year; ?>'
	      },
	      subtitle: {
		text: 'Source : http://<?php echo $IP ?> (user : <?php echo $name ?>)'
	      },
	      xAxis: {
		categories: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7', 'Day 8', 'Day 9', 'Day 10', 'Day 11', 'Day 12', 'Day 13', 'Day 14', 'Day 15', 'Day 16', 'Day 17', 'Day 18', 'Day 19', 'Day 20', 'Day 21', 'Day 22', 'Day 23', 'Day 24', 'Day 25', 'Day 26', 'Day 27', 'Day 28', 'Day 29', 'Day 30', 'Day 31']
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
		}//,
		//line: {
		//	dataLabels: {
		//		enabled: true
		//	},
		//	enableMouseTracking: true
		//}
	      },
	      series: [
		<?php
		$data_array =  get_data_percent($IP,$device,$month, $year);
		echo implode(",",$data_array);
		?>
		]
	  });
	});

    var setZoom = function() {

	var xMin = chart1.xAxis[0].getExtremes().dataMin;
	var xMax = chart1.xAxis[0].getExtremes().dataMax;
	var yMin = chart1.yAxis[0].getExtremes().dataMin;
	var yMax = chart1.yAxis[0].getExtremes().dataMax;
      

	chart1.xAxis[0].setExtremes(xMin + (1 - zoomRatio) * xMax, xMax * zoomRatio);
	chart1.yAxis[0].setExtremes(yMin + (1 - zoomRatio) * yMax, yMax * zoomRatio);
    };

    $('#resetZoom').click(function() {

	var xExtremes = chart1.xAxis[0].getExtremes;
	var yExtremes = chart1.yAxis[0].getExtremes;
	chart1.xAxis[0].setExtremes(xExtremes.dataMin, xExtremes.dataMax);
	chart1.yAxis[0].setExtremes(yExtremes.dataMin, yExtremes.dataMax);
	zoomRatio = 1;
	
    });

    $('#container').bind("contextmenu", function (e) {
		    e.preventDefault();
		});

    $('#container').mousedown(function(b) {
	switch(b.which.toString()) {
		case '3':
		    mouseDown = 1;
		    break;
	}
    });

    $('#container').mouseup(function(b) {
	switch(b.which.toString()) {
		case '3':
		    mouseDown = 0;
		    break;
	}
    });

    $('#container').mousemove(function(e) {
	if (mouseDown == 1) {
	    if (e.pageX > lastX) {
		var diff = e.pageX - lastX;
		var xExtremes = chart1.xAxis[0].getExtremes();
		chart1.xAxis[0].setExtremes(xExtremes.min - diff, xExtremes.max - diff);
	    }
	    else if (e.pageX < lastX) {
		var diff = lastX - e.pageX;
		var xExtremes = chart1.xAxis[0].getExtremes();
		chart1.xAxis[0].setExtremes(xExtremes.min + diff, xExtremes.max + diff);
	    }

	    if (e.pageY > lastY) {
		var ydiff = 1 * (e.pageY - lastY);
		var yExtremes = chart1.yAxis[0].getExtremes();
		chart1.yAxis[0].setExtremes(yExtremes.min + ydiff, yExtremes.max + ydiff);
	    }
	    else if (e.pageY < lastY) {
		var ydiff = 1 * (lastY - e.pageY);
		var yExtremes = chart1.yAxis[0].getExtremes();
		chart1.yAxis[0].setExtremes(yExtremes.min - ydiff, yExtremes.max - ydiff);
	    }
	}
	lastX = e.pageX;
	lastY = e.pageY;
    });


    <?php 
    $n = 2;
    $devices = get_device($IP);
    foreach($devices as $device):
	$container = "container".$n; 
    ?>
    var chart<?php echo $n;?>; // globally available
	$(document).ready(function() {
	    chart<?php echo $n;?> = new Highcharts.Chart({
	    chart: {
		renderTo: '<?php echo $container; ?>',
		type: 'line'
	      },
	      title: {
		text: 'HDD Space Consumption Month <?php echo switch_month($month)." ".$year; ?>'
	      },
	      subtitle: {
		text: 'Source : http://<?php echo $IP ?> (user : <?php echo $name ?>)'
	      },
	      xAxis: {
		categories: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7', 'Day 8', 'Day 9', 'Day 10', 'Day 11', 'Day 12', 'Day 13', 'Day 14', 'Day 15', 'Day 16', 'Day 17', 'Day 18', 'Day 19', 'Day 20', 'Day 21', 'Day 22', 'Day 23', 'Day 24', 'Day 25', 'Day 26', 'Day 27', 'Day 28', 'Day 29', 'Day 30', 'Day 31']
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
		}//,
		//line: {
		//	dataLabels: {
		//		enabled: true
		//	},
		//	enableMouseTracking: true
		//}
	      },
	      series: [
		<?php
		$data_array =  get_data_percent($IP,$device,$month, $year);
		echo implode(",",$data_array);
		?>
		]
	  });
	});

    var setZoom = function() {

	var xMin = chart<?php echo $n;?>.xAxis[0].getExtremes().dataMin;
	var xMax = chart<?php echo $n;?>.xAxis[0].getExtremes().dataMax;
	var yMin = chart<?php echo $n;?>.yAxis[0].getExtremes().dataMin;
	var yMax = chart<?php echo $n;?>.yAxis[0].getExtremes().dataMax;
      

	chart<?php echo $n;?>.xAxis[0].setExtremes(xMin + (1 - zoomRatio) * xMax, xMax * zoomRatio);
	chart<?php echo $n;?>.yAxis[0].setExtremes(yMin + (1 - zoomRatio) * yMax, yMax * zoomRatio);
    };

    $('#resetZoom').click(function() {

	var xExtremes = chart<?php echo $n;?>.xAxis[0].getExtremes;
	var yExtremes = chart<?php echo $n;?>.yAxis[0].getExtremes;
	chart<?php echo $n;?>.xAxis[0].setExtremes(xExtremes.dataMin, xExtremes.dataMax);
	chart<?php echo $n;?>.yAxis[0].setExtremes(yExtremes.dataMin, yExtremes.dataMax);
	zoomRatio = 1;
	
    });

    $('#<?php echo $container; ?>').bind("contextmenu", function (e) {
		    e.preventDefault();
		});

    $('#<?php echo $container; ?>').mousedown(function(b) {
	switch(b.which.toString()) {
		case '3':
		    mouseDown = 1;
		    break;
	}
    });

    $('#<?php echo $container; ?>').mouseup(function(b) {
	switch(b.which.toString()) {
		case '3':
		    mouseDown = 0;
		    break;
	}
    });

    $('#<?php echo $container; ?>').mousemove(function(e) {
	if (mouseDown == 1) {
	    if (e.pageX > lastX) {
		var diff = e.pageX - lastX;
		var xExtremes = chart<?php echo $n;?>.xAxis[0].getExtremes();
		chart<?php echo $n;?>.xAxis[0].setExtremes(xExtremes.min - diff, xExtremes.max - diff);
	    }
	    else if (e.pageX < lastX) {
		var diff = lastX - e.pageX;
		var xExtremes = chart<?php echo $n;?>.xAxis[0].getExtremes();
		chart<?php echo $n;?>.xAxis[0].setExtremes(xExtremes.min + diff, xExtremes.max + diff);
	    }

	    if (e.pageY > lastY) {
		var ydiff = 1 * (e.pageY - lastY);
		var yExtremes = chart<?php echo $n;?>.yAxis[0].getExtremes();
		chart<?php echo $n;?>.yAxis[0].setExtremes(yExtremes.min + ydiff, yExtremes.max + ydiff);
	    }
	    else if (e.pageY < lastY) {
		var ydiff = 1 * (lastY - e.pageY);
		var yExtremes = chart<?php echo $n;?>.yAxis[0].getExtremes();
		chart<?php echo $n;?>.yAxis[0].setExtremes(yExtremes.min - ydiff, yExtremes.max - ydiff);
	    }
	}
	lastX = e.pageX;
	lastY = e.pageY;
    });

    <?php 
	$n++;
	endforeach; 
    ?>

    
    
</script>

</head>
<body>

<h1>Testing Highcharts</h1>

	<?php echo $grafik == "no" ? "no result for your query" : "<button id='resetZoom'>Reset</button><div id='container'></div> <div id='container2' style='width:50%; float:left;'></div> <div id='container3' style='width:50%;'></div>" ; ?>

<div id="bottom_nav">
	<input type=button value="Back" onClick="window.history.back()">
</div>


</body>
</html>

