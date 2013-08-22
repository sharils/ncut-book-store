<?php
class Method
{
	public static function select($name, $args)
	{?>
		<select name="<?= $name ?>">
		<?php foreach($args as $key => $value): ?>
			<option value="<?= $key ?>"><?= $value ?></option>
		<?php endforeach; ?>
		</select>
	<?}
}