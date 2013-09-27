<?php
    if (empty($_GET)){
        $_GET = [
            'name' => '',
            'isbn' => '',
            'author' => ''
        ];
    }
?>

<div class="col-lg-4 col-sm-4">
    <label>書名</label>
    <input class="form-control" name="name" type="text" value="<?=htmlspecialchars($_GET['name'])?>" />
</div>
<div class="col-lg-4 col-sm-4">
    <label>ISBN</label>
    <input class="form-control" name="isbn" type="text"  value="<?=htmlspecialchars($_GET['isbn'])?>" />
</div>
<div class="col-lg-2 col-sm-2">
    <label>作者</label>
    <input class="form-control" name="author" type="text" value="<?=htmlspecialchars($_GET['author'])?>" />
</div>
<div class="col-lg-1 col-sm-1">
    </br>
    <input class="btn btn-success" type="submit" value="搜尋"/>
</div>
