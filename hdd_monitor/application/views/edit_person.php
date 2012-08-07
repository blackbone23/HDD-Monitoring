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
<div id="edit-person-info">
<?php
echo "Edit Your Account : ".$this->session->userdata('username');
$user = $user[0];
?>
<h3>Edit User</h3>
<?php 

if(isset($_GET['email_valid']) && $_GET['email_valid'] == "false" ) {echo "<div style='font-weight:bold; color:red;'>Email tidak valid!</div>" ;} 
elseif(isset($_GET['edit_person']) && $_GET['edit_person'] == "success" ) {echo "<div style='font-weight:bold; color:green;'>Edit user berhasil!</div>" ;} 
?>
<?php echo form_open('site/edit_account');?>
<input type="hidden" name="id_user" id="id_user" value="<?php echo $user->id_user; ?>"/>

<table style="border:0;">
	    <tr>
		<td style="padding:10px;"><label for="konten1">Nama : </label></td><td style="padding:10px;"><input type="text" name="name" id="name" value="<?php echo $user->name; ?>"/></td>
	    </tr>
	    <tr>
		<td style="padding:10px;"><label for="konten1">Username : </label></td><td style="padding:10px;"><input type="text" name="username" id="username" value="<?php echo $user->username; ?>" readonly="readonly" /></td>
	    </tr>
	    <tr>
		<td style="padding:10px;"><label for="konten1">New Username : </label></td><td style="padding:10px;"><input type="text" name="new_username" id="new_username" value=""/></td>
	    </tr>
	    <tr>
		<td style="padding:10px;"><label for="konten1">Password : </label></td><td style="padding:10px;"><input type="text" name="password" id="password" value="<?php echo $user->password; ?>" readonly="readonly" /></td>
	    </tr>
	    <tr>
		<td style="padding:10px;"><label for="konten1">New Password : </label></td><td style="padding:10px;"><input type="text" name="new_password" id="new_password" value=""/></td>
	    </tr>
	    <tr>
		<td style="padding:10px;"><label for="konten1">Email : </label></td><td style="padding:10px;"><input type="text" name="email" id="email" value="<?php echo $user->email; ?>"/></td>
	    </tr>

	    </table>

<label for="submit"><input type="submit" value="Update Now"/></label>

<?php form_close();?>

<br/><br/>
<a href="show_hdd_info"></a><br/>
<a href="admin">Back to home</a>
</div>
</div>

