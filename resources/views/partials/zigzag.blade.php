<?php 
	$length = count($titles);
  $reg_or_rev = 'regular';
	for ($n = 0; $n < $length; $n++) {
  if ($n == 0 || $n % 2 == 0) {
    $reg_or_rev = 'regular';
  } else {
    $reg_or_rev = 'reverse';
  }
?>

<div class="offering <?php echo $reg_or_rev; ?>">
  <div class="offering-image">
    <img src="<?php echo $images[$n]['url']; ?>" alt="<?php echo $images[$n]['alt']; ?>">
  </div>

  <div class="offering-description">
    <h5>
      <?php echo $titles[$n]; ?>
    </h5>
    <p>
      <?php echo $descriptions[$n]; ?>
    </p>
    <a href="<?php echo $links[$n]['url'] ?>" class="offering-learn-more">
      <button>
        <?php echo $links[$n]['title']; ?>
      </button>
    </a>
  </div>
</div>


<?php } ?>