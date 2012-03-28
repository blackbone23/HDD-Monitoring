<div id="form_login">
    <h2>Login Member</h2>

    <div align="center">
        <?php
            echo form_open('login/validate_login');
            echo form_input('username', 'Username')."<br/>";
            echo form_input('password', 'Password')."<br>";
            echo form_submit('submit', 'Login to Member Area');
            echo anchor('login/signup', 'Not Member? Sign Up');
            echo form_close();
        ?>
    </div>
</div>