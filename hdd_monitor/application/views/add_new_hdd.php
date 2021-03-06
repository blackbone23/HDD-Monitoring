<div id="title">HDD Monitoring</div>

<div id="linkGroup">
    <div class="link"><a href="view_hdd_status_now">Monitoring</a></div>
    <div class="link"><a href="edit_person_info">Reporting</a></div>
    <div class="link"><a href="reporting">Modifiying</a></div>
    <div class="link"><a href="logout">logout</a></div>
</div>

<div id="blueBox"> 
  <div id="header"></div>
  <div class="contentTitle">Welcome to HDD Monitoring</div>
    <div class="pageContent">
	<div id="add-new-hdd">
	    
	    
	    <h3>Add new HDD for user : <?php echo $this->session->userdata('username'); ?> </h3>

	    <?php
	    parse_str($_SERVER['QUERY_STRING'], $_GET);
	    if(isset($_GET['status'])){
		if($_GET['status'] == "complete") {echo "<div class='update_alert' style='color:green; font-weight:bold;'>Update Successed!</div>";}
		elseif($_GET['status'] == "no_IP") {echo "<div class='update_alert' style='color:red; font-weight:bold;'>Please Insert IP!</div>";}
		elseif($_GET['status'] == "no_username") {echo "<div class='update_alert' style='color:red; font-weight:bold;'>Please Insert Username!</div>";}
		elseif($_GET['status'] == "no_password") {echo "<div class='update_alert' style='color:red; font-weight:bold;'>Please Insert Password!</div>";}
		elseif($_GET['status'] == "duplicate_IP") {echo "<div class='update_alert' style='color:red; font-weight:bold;'>Duplicate IP!</div>";}
	    }
	    ?>
	    <br/><br/>

	    <?php echo form_open('site/add_hdd');?>
	    <input type="hidden" name="id_user" id="id_user" value="<?php echo $id_user; ?>"/>
	    <table style="border:0;">
	    <tr>
		<td style="padding:10px;"><label for="konten1">IP : </label></td><td style="padding:10px;"><input type="text" name="IP" id="IP" value=""/></td>
	    </tr>
	    <tr>
		<td style="padding:10px;"><label for="konten1">Username : </label></td><td style="padding:10px;"><input type="text" name="username_hdd" id="username_hdd" value="" /></td>
	    </tr>
	    <tr>
		<td style="padding:10px;"> <label for="konten1">Password : </label></td><td style="padding:10px;"><input type="text" name="password_hdd" id="password_hdd" value=""/></td>
	    </tr>

	    </table>
	    <br/>
	    <label for="submit"><input type="submit" value="Add Now"/></label>

	    <?php form_close();?>

	    <br/><br/>
	    <a href="show_hdd_info"></a><br/>
	    <a href="admin">Back to home</a>
	    
	</div>
</div>
