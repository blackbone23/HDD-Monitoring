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
	<div id="view-user">
	    <?php
		$username = $this->session->userdata('username');
	    ?>
	    <h3>User Settings </h3>
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
		    </td>
		    <td>
			<?php echo $row->username ?>
		    </td>
		    <td>
		   	<?php echo $row->password ?>
		    </td>
		    <td>
			<?php echo ($row->user_type == '1') ? "Administrator" : "User";  ?>
			
		    </td>
		    <td>
			<input type="submit" value="edit" onClick="window.location='edit_user_type?id_user=<?php echo $row->id_user ?>'" /> <input type="button" value="delete" onClick="window.location='delete_user?id_user=<?php echo $row->id_user ?>'" />
		    </td>
		</tr>
	
	    <?php
		endforeach;
	    ?>
	   
	    </table>
	    
	    <br/>
	    <div id="bottom_nav">
		<?php if(isset($_GET['status']) && $_GET['status'] == "complete") { echo"<div style='color:green; font-weight:bold;'>User berhasil di delete</div>"; } ?>
		
	    </div>
	    <br/><br/>
	</div>
</div>
