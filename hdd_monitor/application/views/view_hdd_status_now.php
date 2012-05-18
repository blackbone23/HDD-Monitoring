<div id="haloo">
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
	    <td style="padding:10px;"><label>Used Space :</label></td><td style="padding:10px;"><?php echo $row->used ?> (<?php echo $row->percent."%" ?>)</td>
        </tr>
	<tr>
	    <td style="padding:10px;"><label>Free Space :</label></td><td style="padding:10px;"><?php echo $row->free ?> (<?php echo 100-$row->percent."%" ?>)</td>
        </tr>
	<tr>
	    <td style="padding:10px;"><label>Total Space :</label></td><td style="padding:10px;"><?php echo $row->total ?></td>
        </tr>
    </table>
<?php endforeach; ?> 
    <br /> <br />
    <a href="view_hdd_status_now">back</a> <br/>

    
</div>
