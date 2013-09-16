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
        <input class="form-control" name="year" type="text" value="<?=$_GET['year']?>" />
    </div>
    <div class="col-lg-3 col-sm-3">
        <label>學期</label>
        <?php Method::select('semester', Parameter::before('semester'), 0, $_GET['semester']); ?>
    </div>
    <div class=" col-lg-4 col-sm-4">
        <label>學制</label>
        <?php Method::select('system', Parameter::before('system'), 0, $_GET['system']); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-sm-4">
        <label>科系</label>
        <?php Method::select('department', Parameter::before('department'), 0, $_GET['department']); ?>
    </div>
    <div class="col-lg-2 col-sm-2">
        <label>年級</label>
        <?php Method::select('grade', Parameter::before('grade'), 1, $_GET['grade']); ?>
    </div>
    <div class="col-lg-2 col-sm-2">
        <label>班級</label>
        <?php Method::select('group', Parameter::before('group', ['' => 'ALL']), NULL, $_GET['group']); ?>
    </div>
    <div class="form-group col-lg-3 col-sm-3">
        </br>
        <input class="btn btn-success" type="submit" value="搜尋"/>
    </div>
</div>
