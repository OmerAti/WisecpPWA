<p>
    <?php
        if($fields){
            foreach($fields AS $field){
                ?>
                <?php echo $field['name']; ?>: <strong><?php echo isset($field["value"]) ? $field["value"] : ''; ?></strong><br>
                <?php
            }
        }
    ?>
</p>
