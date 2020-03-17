<form method="post">
    <div class="row">
        <div class="col-sm-6">
            Имя:
            <input class="form-control" name="name" id="comment-name">
        </div>
        <div class="col-sm-6">
            E-mail (не публикуется):
            <input class="form-control" name="email" id="comment-email">
            <input type="hidden" value="" name="comment_parent_ID">
            <input type="hidden" value="" name="post_ID">
        </div>
    </div>
    Ваше замечание:
    <textarea class="form-control" name="text" id="comment-text"></textarea>
    <button type="sumbit" id="sumbit-comment" class="btn btn-primary pull-left mt-3">Отправить </button>
    <img src="<?php echo TEMPLATE_PATH ?>img/ajax-loader.gif" id="ajax-loader">
    <div id="comment-message" class="pull-left"></div>
</form>