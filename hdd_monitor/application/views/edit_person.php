<div id="haloo">
<?php
        echo "Edit Your Account : ".$this->session->userdata('username');
	$user = $user[0];
    ?>
    
    
    <h3>Edit User</h3>
    <?php echo form_open('site/edit_account');?>
    <input type="hidden" name="id_user" id="id_user" value="<?php echo $user->id_user; ?>"/>

    <label for="konten1">Nama : </label>
    <input type="text" name="name" id="name" value="<?php echo $user->name; ?>"/>
    <br/>
    <label for="konten1">Username : </label>
    <input type="text" name="username" id="username" value="<?php echo $user->username; ?>"/>
    <br/>
    <label for="konten1">New Username : </label>
    <input type="text" name="new_username" id="new_username" value=""/>
    <br/>
    <label for="konten1">Password : </label>
    <input type="text" name="password" id="password" value="<?php echo $user->password; ?>"/>
    <br/>
    <label for="konten1">New Password : </label>
    <input type="text" name="new_password" id="new_password" value=""/>
    <br/>
    <label for="konten1">IP server (Public) : </label>
    <input type="text" name="IP" id="IP" value="<?php echo $user->IP; ?>"/>
    <br/>
    
    <label for="submit"><input type="submit" value="Update Now"/></label>

    <?php form_close();?>

    
</div>
