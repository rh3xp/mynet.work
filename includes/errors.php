<?php
session_start();
if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo "<h2>$error</h2>" ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>