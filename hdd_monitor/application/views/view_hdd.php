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
	<div id="view-hdd-info">
	    <br/>
	    <h3>HDD settings for user : <?php echo $this->session->userdata('username'); ?> </h3>
	<?php 
	if(empty($query_hdd_show)) {
	    echo "No record found"."<br/>";
	} else {
	?>
	    <table border='1' cellspacing='0' cellpadding='10'>
		<tr>
		    <th>No.</th>
		    <th>IP</th>
		    <th>Username Harddisk</th>
		    <th>Password harddisk</th>
		    <th>Edit Settings</th>
		</tr>
	    <?php $i = '0'; ?>
	    <?php foreach ($query_hdd_show as $row) : ?>
		<?php ++$i ?>
		<tr>
		    <td><?php echo $i ?></td>
		    <td><?php echo $row->IP ?></td>
		    <td><?php echo $row->username_hdd ?></td>
		    <td><?php echo $row->password_hdd ?></td>
		    <td><a href="edit_hdd_info?IP=<?php echo $row->IP ?>">Edit</a>  <a href="delete_hdd?IP=<?php echo $row->IP ?>">Delete</a></td>
		</tr>	
	    <?php endforeach; ?>
	    </table>
	    <br/>
	    <?php echo "Total HDD : $i" ?>
	    <br/>
	<?php 
	}
	?>
	    <a href="add_new_hdd">add new hdd</a> <br/>
	    <a href="admin">back</a>

	    
	</div>
</div>
