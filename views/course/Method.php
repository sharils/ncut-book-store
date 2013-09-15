<?php
class Method
{
    public static function select($name, $args, $postion = NULL, $save_value = NULL, $disabled = TRUE)
    {
        ?>
        <select class="form-control" <?=$disabled?> name="<?= $name ?>">
        <?php foreach($args as $key => $value): ?>
            <?php $value = ($postion === NULL) ? $value : $value[$postion]; ?>
            <?php $selected = ($save_value === $key) ? 'selected' : ''?>
            <option value="<?= $key ?>" <?= $selected ?>><?= $value ?></option>
        <?php endforeach; ?>
        </select>
        <?php
    }
}
