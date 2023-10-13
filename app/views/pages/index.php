<?php app_get_header('header'); ?>


<h1 id="index_id"><?php echo $data['title']; ?></h1>
<h4><?php echo $data['description']; ?></h4>

<?php 
 
  foreach( $data['id'] as $collect ) {

    echo $collect->post_title . '<br />';
    
  }

?>

<?php app_get_footer('footer'); ?>