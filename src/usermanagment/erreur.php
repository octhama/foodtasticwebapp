<?php  if (count($erreurs) > 0) : ?>
  <div class="error">
  	<?php foreach ($erreurs as $erreur) : ?>
  	  <p><?php echo $erreur ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>