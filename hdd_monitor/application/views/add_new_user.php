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
echo "Edit Your Account : ".$this->session->userdata('username');
?>
<h3>Edit User</h3>
<?php 
    if(isset($_GET['status']) && $_GET['status'] == 'not_complete') { 
	echo "<div style='color:red; c'>lengkapi data diri</div>";
    }
    elseif(isset($_GET['status']) && $_GET['status'] == 'complete') { 
	echo "<div style='color:green; font-weight:bold;'>user ".$_GET['user']." telah ditambahkan</div>";
    }
    elseif(isset($_GET['status']) && $_GET['status'] == 'duplicate') { 
	echo "<div style='color:green; font-weight:bold;'>user ".$_GET['user']." sudah ada</div>";
    }
    elseif(isset($_GET['email_valid']) && $_GET['email_valid'] == "false" ) {
	echo "<div style='font-weight:bold; color:red;'>Email tidak valid!</div>" ;
    }	 

?>
<?php echo form_open('site/add_account');?>
<table>
    <tr>
    	<td><label for="konten1">Nama : </label></td><td><input type="text" name="name" id="name" value=""/></td>
    </tr>
    <tr>
	<td><label for="konten1">Username : </label></td><td><input type="text" name="username" id="username" value="" /></td>
    </tr>
    <tr>
	<td><label for="konten1">Password : </label></td><td><input type="text" name="password" id="password" value="" /></td>
    </tr>
    <tr>
	<td><label for="konten1">Email : </label></td><td><input type="text" name="email" id="email" value=""/></td>
    </tr>
</table>

<label for="submit"><input type="submit" value="Add User"/></label>

<?php form_close();?>

<br/><br/>
<a href="show_hdd_info">HDD settings</a><br/>
<a href="admin">Back to home</a>
</div>
</div>

