<?php if( get_field('custom_page_title') ): ?>
  <div class="page-title">
    <h1><?php the_field('custom_page_title') ?></h1>
    <hr>
  </div>
<?php else: ?>
  <div class="page-title">
    <h1><?php the_title() ?></h1>
    <hr>
  </div>
<?php endif; ?>
