<div id="title">HDD Monitoring</div>

<div id="linkGroup">
    <?php if($user_type == "1") {?>
    <div class="link"><a href="user">User</a><br/></div>
    <div class="link"><a href="add_user">Add User</a></div>
    <?php } else { ?>
    <div class="link"><a href="view_hdd_status_now">Monitoring</a></div>
    <div class="link"><a href="reporting">Reporting</a></div>
    <div class="link"><a href="show_hdd_info">Modifiying</a></div>
    <?php } ?>
    <div class="link"><a href="logout">logout</a></div>
</div>

<div id="blueBox"> 
  <div id="header"></div>
  <div class="contentTitle">Welcome to HDD Monitoring</div>
    <div class="pageContent">
	<div id="hdd-list">
	    <p align='justify'>Selamat datang di HDD Monitoring v.1.0,</p>
	    <p align='justify'>Disini anda dapat melakukan monitoring harddisk anda secara terpusat. Melakukan pantauan harddisk saat ini, dan melihat grafik perkembangan kapasitas harddisk anda setiap harinya.</p>
	    <p>
	    <?php
		$username = $this->session->userdata('username');
		echo "Username anda : $username";
	    ?>
	    </p>
	    <div class='images'>    
	    <img src="<?php echo base_url(); ?>images/green-business-graph.jpg" title="pantau harddisk anda melalui grafik" alt="graph" width="250"/> 
	    <img src="<?php echo base_url(); ?>images/World-Wide-Web.jpg" title="pantau harddisk anda melalui grafik" alt="graph" width="250"/>
  	    </div>
	</div>
</div>
