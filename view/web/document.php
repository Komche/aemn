<?php 
    $title = "AEMN| Documentation";
    ob_start();
?>
<main>

</main>
<?php
    $content = ob_get_clean();
    require('template.php');
?>