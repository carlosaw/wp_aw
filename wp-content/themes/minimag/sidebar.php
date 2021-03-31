<div class="col-sm-4 sidebar">
  <sidebar>
    <?php 
      if(is_active_sidebar('am_sidebar')) {
        dynamic_sidebar('am_sidebar');
      }
    ?>
  </sidebar>
</div>