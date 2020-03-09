<div id="phone_form">
    <form method="post" id="phoneForm">
        <div class="error-message-phone alert alert-danger concealed"></div>
        Имя
        <input type="text" class="form-control form-control-sm"
               name="name" id="user_name"/>
        Номер телефона
        <input type="text" class="form-control form-control-sm"
               name="phone" id="user_phone"/>
        <input type="text" class="form-control d-none" name="url" id="InputUrl"
               placeholder="url">
        <input type="hidden" class="form-control" name="email">
        <input type="hidden" class="form-control" name="text">
        <input type="hidden" class="form-control" name="subject" value="Заказ обратного звонка">
        <br/>
        <input type="submit"
               class="btn btn-primary" id="call-btn" value="Отправить"/>
    </form>
    <div class="mt-3 small">Заполняя данную форму, Вы соглашаетесь
        на обработку персональных данных.</div>
</div>