<div id="title">HDD Monitoring</div>

<div id="linkGroup">
    <?php if($user_type == "1") {?>
    <div class="link"><a href="user">User</a><br/></div>
    <div class="link"><a href="add_user">Add User</a></div>
    <?php } else { ?>
    <div class="link"><a href="view_hdd_status_now">HDD Status</a></div>
    <div class="link"><a href="edit_person_info">Account</a></div>
    <div class="link"><a href="show_hdd_info">HDD settings</a></div>
    <?php } ?>
    <div class="link"><a href="logout">logout</a></div>
</div>

<div id="blueBox"> 
  <div id="header"></div>
  <div class="contentTitle">Welcome to HDD Monitoring</div>
    <div class="pageContent">
	<div id="hdd-list">
	    <?php
		$username = $this->session->userdata('username');
		echo "Username anda : $username";
	    ?>
	    <h3>Checking Partition for : <?php echo $username ?></h3>
	    <?php
	    if($query != "no_query") {
	    ?>
	    <table border='1' cellspacing='0' cellpadding='5'>
		<tr>
		    <th>IP</th>
		   <!-- <th>partition</th> -->
		    <th>between</th>
		    <th>get Statistic</th>
		</tr>
	
	    <?php 
	    
		foreach ($query as $row) : 
			$IP=$row->IP;

	    ?>
		<form action='chart'>
		<tr>
		    <td>
			<?php echo $row->IP ?>
			<input type="hidden" name="IP" value="<?php echo $IP ?>" />
		    </td>
		   <!-- <td>
			<select name="device">
			    <option value="-">-</option>-->
			<?php
			    //$sql = $this->db->query("select device from hdd_device where IP = '$IP'");
			  // foreach($sql->result() as $row) {
			//	echo "<option value='$row->device'>$row->device</option>";
			   // }
			?>
			<!--</select>
		    </td>-->
		    <td>
		    <select name="month">
	 		<option value="-">-</option>
			<?php
			    $sql = $this->db->query("select distinct month from hdd_status where IP = '$IP'");
			    foreach ($sql->result() as $row) {
				if(!isset($row)){
				
				} else {
				    $set_month = true;
				}
			    }
			    if(isset($set_month)) { 
			?>
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
			<?php } 
			    unset($set_month);
			?>
		    </select>
		    <select name="year">
			<option value="-">-</option>
			<?php
			    $sql = $this->db->query("select distinct year from hdd_status where IP = '$IP'");
			    foreach ($sql->result() as $row) {
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
	    <?php endforeach; 
	    } else {echo "No Harddisk found";}	
	?>
	    </table>
	    
	    <br/>
	     <br/>
	     <br/>
	     <br/>
	    
	    
	</div>
</div>
