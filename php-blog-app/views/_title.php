<?php 
    $about = count(getFilms()).' movies listed in '.count($categories).' categories';
?>

<h1 class="mb-4"> <?php echo $baslig ?></h1>
<p class="text-muted"> <?php echo $about ?></p>