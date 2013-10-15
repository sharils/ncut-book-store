<?php
class Method
{
    public static function select($name, $args, $postion = NULL, $save_value = NULL, $disabled = TRUE)
    {
        ?>
        <select class="form-control" <?=$disabled?> name="<?= $name ?>">
        <?php foreach($args as $key => $value): ?>
            <?php $value = ($postion === NULL) ? $value : $value[$postion]; ?>
            <?php $selected = ($save_value === $key) ? 'selected' : '';?>
            <?php $key = (in_array($key, self::$mask)) ? $key+1 : $key?>
            <option value="<?= $key ?>" <?= $selected ?>><?= $value ?></option>
        <?php endforeach; ?>
        </select>
        <?php
    }
}
