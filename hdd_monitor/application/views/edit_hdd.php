<div id="title">HDD Monitoring</div>

<div id="linkGroup">
    <div class="link"><a href="view_hdd_status_now">Monitoring</a></div>
    <div class="link"><a href="reporting">Reporting</a></div>
    <div class="link"><a href="show_hdd_info">HDD settings</a></div>
    <div class="link"><a href="logout">logout</a></div>
</div>

<div id="blueBox"> 
  <div id="header"></div>
  <div class="contentTitle">Welcome to HDD Monitoring</div>
    <div class="pageContent">
	<div id="edit-hdd">
	    
	    
	    <h3>HDD settings for user : <?php echo $this->session->userdata('username'); ?> </h3>

	    <?php
	    parse_str($_SERVER['QUERY_STRING'], $_GET);
	    if(isset($_GET['status'])){
		if($_GET['status'] == "no_update") {echo "<div class='update_alert'>No Update found!</div>";}
		if($_GET['status'] == "complete") {echo "<div class='update_alert'>Update Successed!</div>";}
	    }
	    ?>

	    <br/><br/>

	    <?php echo form_open('site/edit_hdd');?>
	    <input type="hidden" name="id_user" id="id_user" value="<?php echo $query_hdd_edit->id_user; ?>"/>
	    <input type="hidden" name="id_harddisk" id="id_harddisk" value="<?php echo $query_hdd_edit->id_harddisk; ?>"/>
	    <input type="hidden" name="current_IP" id="current_IP" value="<?php echo $_GET['IP']; ?>"/>
	    <table style="border:0;">
	    <tr>
		<td style="padding:10px;"><label for="konten1">IP : </label></td><td style="padding:10px;"><input type="text" name="IP" id="IP" value="<?php echo $query_hdd_edit->IP; ?>"/></td>
	    </tr>
	    <tr>
		<td style="padding:10px;"><label for="konten1">Username : </label></td><td style="padding:10px;"><input type="text" name="username_hdd" id="username_hdd" value="<?php echo $query_hdd_edit->username_hdd; ?>" readonly="readonly" /></td>
	    </tr>
	    <tr>
		<td style="padding:10px;"><label for="konten1">New Username : </label></td><td style="padding:10px;"><input type="text" name="new_hdd_username" id="new_hdd_username" value=""/></td>
	    </tr>
	    <tr>
		<td style="padding:10px;"> <label for="konten1">Password : </label></td><td style="padding:10px;"><input type="text" name="password_hdd" id="password_hdd" value="<?php echo $query_hdd_edit->password_hdd; ?>" readonly="readonly" /></td>
	    </tr>
	    <tr>
		<td style="padding:10px;"><label for="konten1">New Password : </label></td><td style="padding:10px;"><input type="text" name="new_hdd_password" id="new_hdd_password" value=""/></td>
	    </tr>

	    </table>
	    <br/>
	    <label for="submit"><input type="submit" value="Update Now"/></label>

	    <?php form_close();?>

	    <br/><br/>
	    <a href="show_hdd_info">HDD settings</a><br/>
	    <a href="admin">Back to home</a>
	    
	</div>
</div>
