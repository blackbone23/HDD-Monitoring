<div id="title">HDD Monitoring</div>

<div id="linkGroup">
    <div class="link"><a href="user">User</a><br/></div>
    <div class="link"><a href="logout">logout</a></div>
</div>

<div id="blueBox"> 
  <div id="header"></div>
  <div class="contentTitle">Welcome to HDD Monitoring</div>
    <div class="pageContent">
	<div id="view-user">
	    <?php
		$username = $this->session->userdata('username');
	    ?>
	    <h3>User Settings </h3>
	    <form action='edit_user'>
	    <table border='1' cellspacing='0' cellpadding='5'>
		<tr>
		    <th>Name</th>
		    <th>Username</th>
		    <th>Password</th>
		    <th>User Authentication</th>
		    <th>Action</th>
		</tr>
	
	    <?php 
	    
		foreach ($user_all as $row) : 

	    ?>
	
		<tr>
		    <td>
			<?php echo $row->name ?>
			<input type="hidden" name="name" id="name" value="<?php echo $row->name ?>" />
		    </td>
		    <td>
			<?php echo $row->username ?>
			<input type="hidden" name="username" id="username" value="<?php echo $row->username ?>" />
		    </td>
		    <td>
		   	<?php echo $row->password ?>
			<input type="hidden" name="password" id="password" value="<?php echo $row->password ?>" />
		    </td>
		    <td>
			<input type="radio" name="user_type['<?php echo $row->username ?>']" id="user_type" value="administrator" <?php if($row->user_type == "1") {echo 'checked="checked"';} ?> /> Administrator <input type="radio" name="user_type['<?php echo $row->username ?>']" id="user_type" value="user" <?php if($row->user_type == "2") {echo 'checked="checked"';} ?> /> User
		    </td>
		    <td>
			<input type="button" value="save" /> <input type="button" value="delete" />
		    </td>
		</tr>
	
	    <?php
		endforeach;
	    ?>
	   
	    </table>
	    
	    <br/>
	    <div id="bottom_nav">
		<input type="button" value="Back" onClick="window.history.back()">
	    </div>
	    </form>
	    
	</div>
</div>
