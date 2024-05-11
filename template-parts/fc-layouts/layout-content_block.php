<?php
  $content = get_sub_field('content');
  $col_class = get_sub_field('col_classes');
  $content_width = get_sub_field('content_width');
  $row_class = 'row '. get_sub_field('row_class') ;
  ?>
<div class="<?php echo $row_class; ?>">
  <div class="<?php echo $content_width; ?>">
    <?php echo $content; ?>
  </div>
</div>
