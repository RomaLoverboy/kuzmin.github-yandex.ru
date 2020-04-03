<div class="col-md-12">
    <div class="find-places">
        <form action="" name="form-find-ticket" class="form-find-ticket" method="post">
            <div class="box-form">
                <input name="cityFrom" type="text" placeholder="Введите название города" class="form-control drop-down-list-from"/>
                <ul class="city-list-from"></ul>
                <input name="cityTo" type="text" placeholder="Введите название города" class="form-control drop-down-list-to"/>
                <ul class="city-list-to"></ul>
                <input class="form-control inputForm" type="date" name="dateIn" id="dateIn"/>

                <button class="btn btn-primary" type="input" id="find-places">Найти</button>
            </div>
        </form>
        <p><a name="find-tickets"></a></p>

        <span class="badge badge-pill badge-primary" id="extra-find">+обатный рейс</span>


        <form style="display:none" action="" name="form-find-ticket-ext" class="form-find-ticket-ext" method="post">
            <div class="box-form">
                <input name="cityFromExt" type="text" placeholder="Введите название города" class="form-control drop-down-list-from-ext"/>
                <ul class="city-list-from-ext"></ul>
                <input name="cityToExt" type="text" placeholder="Введите название города" class="form-control drop-down-list-to-ext"/>
                <ul class="city-list-to-ext"></ul>
                <input class="form-control inputForm" type="date" name="dateInExt" id="dateInExt"/>
            </div>
        </form>

    </div>

    <div style="display: none;" class="list-flight">
        <p><span><b>Основной рейс</b></span></p>
        <p><span id="date-main-flight"></span></p>
    </div>
    <div style="display: none;" class="list-flight-ext">
        <p><span><b>Обратный рейс</b></span></p>
        <p><span id="date-ext-flight"></span></p>
    </div>

    <button class="show-regist btn btn-primary">Забронировать</button>

    <div class="registration">
        <span><b><h2>Бронирование билета</h2></b></span>

        <form action="" method="post" name="regist" class="form-regist">
            <div class="form-group row">

                <label for="firstName" class="col-form-label">Имя</label>
                <input class="form-control inputForm" type="text" name="firstName" placeholder="Введите имя" id="firstName"/>

                <label for="lastName" class="col-form-label">Фамилия</label>
                <input class="form-control inputForm" type="text" id="lastName" name="lastName" placeholder="Введите фамилию"/>

                <label for="middleName" class="col-form-label">Отчество</label>
                <input class="form-control inputForm" type="text" id="middleName" name="middleName" placeholder="Введите отчество"/>

                <label for="phoneNumber" class="col-form-label">Номер телефона</label>
                <input class="form-control inputForm" type="tel" id="phoneNumber" name="phone" placeholder="Введите номер телефона"/>

                <label for="mail" class="col-form-label">Почта</label>
                <input class="form-control inputForm" type="email" id="mail" name="mail" placeholder="Введите адрес почты"/>

                <input class="inputForm" type="hidden" name="id-flg" id="id-flight"/>
                <input class="inputForm" type="hidden" name="id-flg-ext" id="id-flight-ext"/>
                <input class="inputForm" type="hidden" name="ticket" id="number-ticket"/>
                <input class="inputForm" type="hidden" name="ticket-ext" id="number-ticket-ext"/>
                <button class="btn btn-primary" type="input" id="btn">Забронировать</button>
                <div class="price"><i><span class="pay-ticket"></span></i></div>
            </div>
        </form>
    </div>
</div>