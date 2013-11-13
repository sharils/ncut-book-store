<div class ="col-9 center">
    <?php if (null !== Notice::get()): ?>
        <div class="alert alert-danger"><?=Notice::get()?></div>
    <?php endif; ?>
    <form action="<?= Router::toUrl('controllers/upload/upload.php')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label">匯入種類</label>
            <div class="btn-group col-sm-10" data-toggle="buttons">
              <label class="btn btn-default">
                <input id="option1" name="type" type="radio" value="Course">課程
              </label>
              <label class="btn btn-default">
                <input id="option2" name="type" type="radio" value="Teacher">老師
              </label>
              <label class="btn btn-default">
                <input id="option3" name="type" type="radio" value="Student">學生
              </label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">檔案匯入</label>
            <div class="col-sm-9">
                <input type="file" name="file"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <span class="alert alert-danger message">匯入檔案種類需為Excel檔(副檔名.xls)！</span>
            </div>
        </div>
        <input class="btn btn-success" type="submit" value="匯入">



    </form>
</div>
