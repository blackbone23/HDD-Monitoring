<div id="title">HDD Monitoring</div>

<div id="linkGroup">
    <div class="link"><a href="user">User</a><br/></div>
    <div class="link"><a href="add_user">Add User</a></div>
    <div class="link"><a href="logout">logout</a></div>
</div>

<div id="blueBox">
<div id="header"></div>
<div class="contentTitle">Welcome to HDD Monitoring</div>
<div class="pageContent">
<div id="edit-person-info">
<?php
$user = $user[0];
echo "Edit Account : ".$user->name;

?>
<h3>Edit User</h3>
<?php echo form_open('site/edit_user_type_proc');?>
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
	    <tr>
		<td style="padding:10px;"><label for="konten1">User type : </label></td><td style="padding:10px;">
     		<input type="radio" name="user_type" id="user_type" value="administrator" <?php if($user->user_type == "1") {echo 'checked="checked"';} ?> /> Administrator <input type="radio" name="user_type" id="user_type" value="user" <?php if($user->user_type == "2") {echo 'checked="checked"';} ?> /> User
		</td>
	    </tr>

	    </table>

<?php if(isset($_GET['status']) && $_GET['status'] == 'complete') {echo "<div style='color:green; font-weight:bold;'>Perubahan data berhasil</div>";}  ?>
<label for="submit"><input type="submit" value="Update Now"/></label>

<?php form_close();?>

<br/><br/>
<a href="show_hdd_info">HDD settings</a><br/>
<a href="admin">Back to home</a>
</div>
</div>

