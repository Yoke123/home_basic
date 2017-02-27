<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php if (isset($this->blocks['block1'])): ?>
		<?=$this->blocks['block1'];?>
	<?php else: ?>
		<h1>common</h1>
	<?php endif;?>
	<?=$content?>
</body>
</html>