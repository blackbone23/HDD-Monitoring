<div id="title">HDD Monitoring</div>

<div id="linkGroup">
    <div class="link"><a href="view_hdd_status_now">HDD Status</a></div>
    <div class="link"><a href="edit_person_info">Account</a></div>
    <div class="link"><a href="show_hdd_info">HDD settings</a></div>
    <div class="link"><a href="logout">logout</a></div>
</div>

<div id="blueBox"> 
  <div id="header"></div>
  <div class="contentTitle">Welcome to HDD Monitoring</div>
    <div class="pageContent">
	<div id="view-hdd-status-doc">
	    <br/>
	    <h3>HDD status for IP : <?php echo $IP; ?> </h3>

	 <div class="hdd_username">HDD Username : <?php echo $username ?></div> <br/>

	<?php foreach($data_hdd as $row) :?>
	    <div class="hdd_mount">HDD statistic mounted on : <?php echo $row->mount_on ?></div>
	    <table style="border:0;">
		<tr>
		    <td style="padding:10px;"><label>Filetype :</label></td><td style="padding:10px;"><?php echo $row->filetype ?></td>
		</tr>
	 	<tr>
		    <td style="padding:10px;"><label>Partition :</label></td><td style="padding:10px;"><?php echo $row->device ?></td>
		</tr>
		<tr>
		    <td style="padding:10px;"><label>Used Space :</label></td><td style="padding:10px;"><?php echo ((($row->used)/1024)/1024)/1024; echo " GB"; ?> (<?php echo $row->percent."%" ?>)</td>
		</tr>
		<tr>
		    <td style="padding:10px;"><label>Free Space :</label></td><td style="padding:10px;"><?php echo ((($row->free)/1024)/1024)/1024; echo " GB"; ?> (<?php echo 100-$row->percent."%" ?>)</td>
		</tr>
		<tr>
		    <td style="padding:10px;"><label>Total Space :</label></td><td style="padding:10px;"><?php echo ((($row->total)/1024)/1024)/1024; echo " GB"; ?></td>
		</tr>
	    </table>


	<?php endforeach; ?> 
	    <br /> <br />
	    <a href="view_hdd_status_now">back</a> <br/>

	    
	</div>
</div>
