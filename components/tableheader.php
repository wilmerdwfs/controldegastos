<div class="containerTabla">
<table id="myTable">
<tr>
<?php 
   $cab  =  explode(",",$cab);
      foreach ($cab as $dato) { ?>
         <th><?php echo $dato ?></th>
<?php } ?>
</tr>
</div>