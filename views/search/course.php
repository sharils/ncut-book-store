<?php
    if (empty($_GET)){
        $_GET = [
            'year' => '',
            'semester' => '',
            'type' => '',
            'name' => '',
            'teacher' => ''
        ];
    }
?>

<div class="col-lg-2 col-sm-2">
    <label>年度</label>
    <input class="form-control" name="year" type="text" value="<?=htmlspecialchars($_GET['year'])?>" />
</div>
<div class="col">
    <label>學期</label>
    <?php Method::select('semester', Parameter::before('semester'), 2, htmlspecialchars($_GET['semester'])); ?>
</div>
<div class="col-lg-2 col-sm-2">
    <label>必選修</label>
    <?php Method::select('type', Parameter::before('type', ['' => 'All　']), NULL, htmlspecialchars($_GET['type'])); ?>
</div>
<div class="col-lg-3 col-sm-3">
    <label>課程名稱</label>
    <input class="form-control" name="name" type="text" value="<?=htmlspecialchars($_GET['name'])?>" />
</div>
<div class="col-lg-2 col-sm-2">
    <label for="teacher">老師</label>
    <input class="form-control" name="teacher" type="text" value="<?=htmlspecialchars($_GET['teacher'])?>" />
</div>
<div class="form-group col-lg-1 col-sm-1">
    </br>
    <input class="btn btn-primary" type="submit" value="搜尋"/>
</div>

