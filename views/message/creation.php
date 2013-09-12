<div class ="col-lg-9 col-sm-9">
    <?php if (null !== Notice::get()): ?>
        <div class="alert alert-danger"><?=Notice::get()?></div>
    <?php endif; ?>
    <form action="<?= Router::toUrl("controllers/message/creation.php")?>" class="form-horizontal" method="post">
        <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label" for="receiver">收信人：</label>
            <div class="col-lg-10 col-sm-9">
                <input class="form-control" id="receiver" name="receiver" type="text" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label" for="content">內容：</label>
            <div class="col-lg-10 col-sm-9">
                <textarea class="form-control" id="content" cols="30" name="content" rows="3"></textarea>
            </div>
        </div>
        <div>
            <input class="btn btn-success" type="submit" value="送出"/>
        </div>
    </form>
</div>
