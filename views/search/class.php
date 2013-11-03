<?php
    if (empty($_GET)){
        $_GET = [
            'year' => '',
            'semester' => '',
            'system' => '',
            'department' => '',
            'grade' => '',
            'group' => ''
        ];
    }
?>

<div class="row">
    <div class="col-lg-2 col-sm-2">
        <label>年度</label>
        <input class="form-control" name="year" type="text" value="<?= htmlspecialchars($_GET['year']) ?>" />
    </div>
    <div class="col">
        <label>學期</label>
        <?php Method::select('semester', Parameter::before('semester'), 2, htmlspecialchars($_GET['semester'])); ?>
    </div>
    <div class="col">
        <label>學制</label>
        <?php Method::select('system', Parameter::before('system'), 0, htmlspecialchars($_GET['system'])); ?>
    </div>
    <div class="col">
        <label>科系</label>
        <?php Method::select('department', Parameter::before('department'), 0, htmlspecialchars($_GET['department'])); ?>
    </div>
    <div class="col">
        <label>年級</label>
        <?php Method::select('grade', Parameter::before('grade'), 2, htmlspecialchars($_GET['grade'])); ?>
    </div>
    <div class="col">
        <label>班級</label>
        <?php Method::select('group', Parameter::before('group', ['' => 'All　']), NULL, htmlspecialchars($_GET['group'])); ?>
    </div>
    <div class="col">
        </br>
        <input class="btn btn-success" type="submit" value="搜尋"/>
    </div>
</div>
