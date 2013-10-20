<?php require_once 'controllers/announce/modify.php';?>
<div class ="col-9 center">
    <div class="alert alert-info"><?= htmlspecialchars('內容可透過</br>做斷行！')?></div>
    <form action="<?= Router::toUrl("controllers/announce/create_or_update.php")?>" class="form-horizontal" method="post">
        <input name="id" type="hidden" value="<?= htmlspecialchars($id)?>"/>
        <table class="table center">
            <th>新增公告</th>
            <tr>
                <td>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label" for="title">標題：</label>
                        <div class="col-lg-10 col-sm-9">
                            <input class="form-control" id="title" name="title" type="text" value="<?= htmlspecialchars($title)?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label" for="message">內容：</label>
                        <div class="col-lg-10 col-sm-9">
                            <textarea class="form-control" id="message" cols="30" name="message" rows="3">
                                <?= htmlspecialchars($message) ?>
                            </textarea>
                        </div>
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" value="送出"/>
                        <a class="btn btn-success" href="<?= Router::toUrl("home/announce")?>">
                            返回
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
