<div id="haloo">
    <?php
        echo "Haloo <br/>";
        echo "Username anda : ".$this->session->userdata('username');
	echo exec("php execution.php");
	$string = read_file('./../foo');
	var_dump(explode("\n", $string));	
    ?>
</div>
