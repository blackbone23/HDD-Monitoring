<div id="haloo">
<?php
        echo "View Statistic for user : ".$this->session->userdata('username');
    ?>
    <br/>
    <br/>
    <a href="admin">< previous</a>
    <br/>
    <h3>Statistic for IP : <?php echo $IP ?></h3>
    
    <table border='1' cellspacing='0' cellpadding='10'>
        <tr>
	    <th>No.</th>
	    <th>date</th>
	    <th>time</th>
	    <th>IP</th>
	    <th>device</th>
	    <th>filetype</th>
	    <th>mount on</th>
	    <th>used</th>
	    <th>free</th>
	    <th>total</th>
	    <th>Percent Usage</th>
        </tr>
    <?php $i = '0'; ?>
    <?php foreach ($query as $row) : ?>
	<?php ++$i ?>
	<tr>
	    <td><?php echo $i ?></td>
	    <td><?php echo $row->date ?></td>
	    <td><?php echo $row->time ?></td>
	    <td><?php echo $row->IP ?></td>
	    <td><?php echo $row->device ?></td>
	    <td><?php echo $row->filetype ?></td>
	    <td><?php echo $row->mount_on ?></td>
	    <td><?php echo $row->used ?></td>
	    <td><?php echo $row->free ?></td>
	    <td><?php echo $row->total ?></td>
	    <td><?php echo $row->percent ?></td>
	</tr>	
    <?php endforeach; ?>
    </table>
    <br/>
    <?php echo "Total Row : $i" ?>
    <br/>
    <a href="admin">back</a>

    
</div>
