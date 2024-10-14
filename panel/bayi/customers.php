<?php include('_include/_header.php'); ?>
<?php if ((isset($i)) && (!empty($i))) {
    if (file_exists('_view/_'.$page.'.'.$i.'.php')) { include('_view/_'.$page.'.'.$i.'.php'); }
 } else {
    include('_view/_404.php');
 } ?>
<?php include('_include/_footer.php'); ?>
