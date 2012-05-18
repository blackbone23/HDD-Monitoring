<div id="haloo">
    <?php
        $username = $this->session->userdata('username');
	echo "Username anda : $username";
    ?>
    <h3>Checking Partition for : <?php echo $username ?></h3>
    
    <table border='1' cellspacing='0' cellpadding='5'>
        <tr>
	    <th>IP</th>
	    <th>partition</th>
	    <th>between</th>
	    <th>get Statistic</th>
        </tr>
    <?php foreach ($query as $row) : 
		$IP=$row->IP;
    ?>
	<form action='chart'>
	<tr>
	    <td>
		<?php echo $row->IP ?>
		<input type="hidden" name="IP" value="<?php echo $IP ?>" />
	    </td>
	    <td>
		<select name="device">
		    <option value="-">-</option>
		<?php
		    $sql = mysql_query("select device from hdd_device where IP = '$IP'");
		    while ($row = mysql_fetch_object($sql)) {
			echo "<option value='$row->device'>$row->device</option>";
		    }
		?>
		</select>
	    </td>
	    <td>
	    <select name="month">
 		<option value="-">-</option>
		<option value="01">Jan</option>
		<option value="02">Feb</option>
		<option value="03">Mar</option>
		<option value="04">Apr</option>
		<option value="05">May</option>
		<option value="06">Jun</option>
		<option value="07">Jul</option>
		<option value="08">Aug</option>
		<option value="09">Sep</option>
		<option value="10">Oct</option>
		<option value="11">Nov</option>
		<option value="12">Des</option>
	    </select>
	    <select name="year">
		<option value="-">-</option>
		<?php
		    $sql = mysql_query("select distinct year from hdd_status where IP = '$IP'");
		    while ($row = mysql_fetch_object($sql)) {
			echo "<option value='$row->year'>$row->year</option>";
		    }
		?>
	    </select>
	    </td>
	    <td>
		<input type="submit" name="submit" value="get statistic" />
	    </td>
	</tr>
	</form>
    <?php endforeach; ?>
    </table>
    
    <br/>
    <a href="view_hdd_status_now">View Your HDD Status Now</a> <br/>
    <a href="edit_person_info">Account Setting</a> <br/>
    <a href="show_hdd_info">HDD settings</a> <br/>
    <a href="logout">logout</a>
    
</div>
