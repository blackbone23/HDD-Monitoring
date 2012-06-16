<div id="title">HDD Monitoring</div>

<div id="linkGroup">
    <div class="link"><a href="index.html">Home</a></div>
    <div class="link"><a href="index.html">About</a></div>
    <div class="link"><a href="index.html">Portfolio</a></div>
    <div class="link"><a href="index.html">Contact</a></div>
</div>

<div id="blueBox"> 
  <div id="header"></div>
  <div class="contentTitle">Welcome to HDD Monitoring</div>
    <div class="pageContent">
      <div id="form_login">
	    <h2>Login Member</h2>

	    <div align="center">
		<?php echo form_open('hdd_monitor/validate_login'); ?>
		    <table>
			<tr>
			<td><label>Username :</label></td><td><input type="text" name="username" id="username" /></td>
			</tr>
			<tr>
			<td><label>Password :</label></td><td><input type="password" name="password" id="password" /></td>
			</tr>
		    </table>
		    <input type="submit" name="submit" value="Login to Member Area" />
		<?php echo form_close(); ?>

	    </div>
	</div>
    </div>
            
