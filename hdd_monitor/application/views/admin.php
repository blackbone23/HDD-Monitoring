<div id="haloo">
    <?php
        echo "Haloo <br/>";
        echo "Username anda : ".$this->session->userdata('username');
        var_dump($rowrecord);
    ?>
    <h3>Tambah data</h3>
    <?php echo form_open('site/tambah_data');?>
    <label for="konten1">Konten1 : </label>
    <input type="text" name="content1" id="content1"/>
    
    <label for="konten2">Konten2 : </label>
    <input type="text" name="content2" id="content2"/>
    
    <label for="submit"><input type="submit" value="submit"/></label>
    <?php form_close();?>
    
</div>
