<div id="haloo">
    <?php
        $username = $this->session->userdata('username');
	echo "Username anda : $username";
    ?>
    <h3>Checking Partition for : <?php echo $username ?></h3>
    <table border='1' cellspacing='0' cellpadding='5'>
        <tr>
	    <th>IP</th>
	    <th>partition</th>
	    <th>filetype</th>
	    <th>mount on</th>
	    <th>see statistic</th>
        </tr>
    <?php foreach ($query as $row) : ?>
	<tr>
	    <td><a href="view_statistic_from_IP_raw?IP=<?php echo $row->IP ?>" ><?php echo $row->IP ?></a></td>
	    <td>disini dropdown select utk partisi (sesuaikan partisi dari database)</td>
	    <td><?php echo $row->filetype ?></td>
	    <td><?php echo $row->mount_on ?></td>
	    <td>
		<form>
  		    <select name="month">
  			<option value="01">Jan</option>
  			<option value="02">Feb</option>
 			<option value="03">Mar</option>
  			<option value="04">Apr</option>
			<option value="05">May</option>
  			<option value="06">Jun</option>
 			<option value="07">Jul</option>
  			<option value="08">Aug</option>
			<option value="09">Sep</option>
  			<option value="10">Oct</option>
 			<option value="11">Nov</option>
  			<option value="12">Des</option>
		    </select>
		    disini dropdown select untuk tahun (sesuaikan tahun dari database)
		</form>
	    </td>
	</tr>
    <?php endforeach; ?>
    </table>
    <br/>
    <a href="edit_person_info">Account Setting</a> <br/>
    <a href="logout">logout</a>
    
</div>
