<?php
class Method
{
    public static function select($name, $args, $postion = NULL)
    {
        ?>
        <select class="form-control" name="<?= $name ?>">
        <?php foreach($args as $key => $value): ?>
            <?php $value = ($postion === NULL) ? $value : $value[$postion]; ?>
            <option value="<?= $key ?>"><?= $value ?></option>
        <?php endforeach; ?>
        </select>
        <?php
    }
}
