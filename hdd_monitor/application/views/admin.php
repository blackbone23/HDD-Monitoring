<div id="haloo">
    <?php
        $username = $this->session->userdata('username');
	echo "Username anda : $username";
    ?>
    <h3>Checking Partition for : <?php echo $username ?></h3>
    <table border='1' cellspacing='0' cellpadding='5'>
        <tr>
	    <th>IP</th>
	    <th>device</th>
	    <th>filetype</th>
	    <th>mount on</th>
        </tr>
    <?php foreach ($query as $row) : ?>
	<tr>
	    <td><a href="view_statistic?IP=<?php echo $row->IP ?>" ><?php echo $row->IP ?></a></td>
	    <td><?php echo $row->device ?></td>
	    <td><?php echo $row->filetype ?></td>
	    <td><?php echo $row->mount_on ?></td>
	</tr>
    <?php endforeach; ?>
    </table>
    
</div>
