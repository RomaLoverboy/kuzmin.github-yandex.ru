$( document ).ready(function() {

    $("#btn").click(
        function() {
            if ($('#phoneNumber').val() === '') {
                alert("Вы не ввели телефон!");
                //return false;
            } else {
                //$('.inputForm').toggleClass('error');
                let result = confirm("Подтвердить бронирование?");
                if (result === true) {
                    sendAjaxForm('result_form', 'form-regist', 'views/ajax/regist.php');
                   /* $('.form-regist')[0].reset();
                    $('.form-find-ticket')[0].reset();
                    $('.form-find-ticket-ext')[0].reset();

                    $('.registration').hide();
                    $('#extra-find').show();
                    $('.find-places').show();
                    $('.form-find-ticket-ext').hide();*/

                    $('body,html').animate({scrollTop: 0}, 400);
                    alert('Благодарим за бронирование!');
                    location.reload();
                }
            }
            return false;
        }
    );

    $('.city-list-from').slideUp();
    $('.city-list-to').slideUp();

    //dropDownCityList('-from', 'views/ajax/cityFrom.php', '');
    //dropDownCityList('-to',  'views/ajax/cityTo.php', '');

    $('#find-places').click(function () {
        $('.list-flight').show();
        findPlacesAjax('list-flight', 'form-find-ticket', 'views/ajax/findFlight.php');
        let dateFl = new Date($('#dateIn').val());
        $('#date-main-flight').text('Дата отправления: ' + dateFl.toDateString());

        if($(".form-find-ticket-ext").is(':visible') === true) {

            $('.list-flight-ext').show();
            let dateFl = new Date($('#dateInExt').val());
            $('#date-ext-flight').text('Дата отправления: ' + dateFl.toDateString());
            findPlacesAjax('list-flight-ext', 'form-find-ticket-ext', 'views/ajax/findFlightExt.php');

        }
        return false;
    });

    $('#extra-find').click(function () {
        $('.form-find-ticket-ext').show();
        $('.drop-down-list-from-ext').val($('.drop-down-list-to').val());
        $('.drop-down-list-to-ext').val($('.drop-down-list-from').val());
        $(this).hide();
    });

    $( ".carousel-inner :first-child").toggleClass('active');
    $( ".carousel-indicators :first-child").toggleClass('active');



});

function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url,
        type:     "POST",
        dataType: "html",
        data: $("."+ajax_form).serialize(),
    });
}


function dropDownListAjax(result_form, ajax_form, url, key) {
    $.ajax({
        url:     url,
        type:    "POST",
        dataType: "html",
        data: $("."+ajax_form).serialize(),

        success: function(response) {
            result = $.parseJSON(response);
            if (key === '-from') {
                getCity(result, key);
            }

            if (key === '-to') {
                getCity(result, key);
            }

            if (key === '-from-ext') {
                getCity(result, key);
            }

            if (key === '-to-ext') {
                getCity(result, key);
            }

        },
    });
}

function dropDownCityList(key, url, keyForm) {
    $('.drop-down-list' + key).keyup(function() {
        if($(this).val() !== ''){
            dropDownListAjax('test-helper', 'form-find-ticket' + keyForm, url, key);
            $('.city-list' + key).slideDown();
        } else if ($(this).val() === '') {
            $(".city-list" + key  + " li").remove();
            $('.city-list' + key).slideUp();
        }
    });

    $('.city-link' + key).click(function() {
        $(".city-list" + key + " li").remove();
    });
}

function getCity(result, key) {
    for(var i = 0; i < result.length; i++) {
        $('.city-list' + key).append($('<li>', {
            'html': '<a href="#" class="city-link' + key + '">' + result[i].name + '</a>'
        }));

        $('.city-link' + key).click(function() {
            var LinkText = $(this).html();
            $('.drop-down-list' + key).val(LinkText);
            $(".city-list" + key + " li").remove();
            $('.city-list' + key).slideUp();
            return false;
        });
    }
}

function findPlacesAjax(result_form, ajax_form, url) {
    $.ajax({
        url:     url,
        type:    "POST",
        dataType: "html",
        data: $("."+ajax_form).serialize(),

       success: function(response) {
            result = $.parseJSON(response);
            getPlaces(result, result_form)
        },
    });
}

function getPlaces(result, result_form) {

    if (result.info === 'null') {
        $('.' + result_form).html('Ничего не найдено(');
        return false;
    } else {

        $('.find-places').hide();

        $('html, body').animate({
            scrollTop: $(".list-flight").offset().top  // класс объекта к которому приезжаем
        }, 1000);

        /*$('.' + result_form).html(result.id);*/
        for (var i = 0; i < result.length; i++) {

            var idFlg = result[i].id;
            $('#id-flight').val(idFlg);
            $('#id-flight-ext').val(idFlg);

            $('.' + result_form).append('<div>' + result[i].tickets + '</div>');
            getTickets('form-regist', 'views/ajax/getTickets.php', $('.plc-itm'));

            $('.plc-itm').each(function () {
                var str = $(this).html();

                if(str[str.length - 1] === 'E') {
                    title = 'Эконом: 3000 руб.';
                } else if (str[str.length - 1] === 'B') {
                    title = 'Бизнес: 5000 руб.';
                }

                $(this).attr('title', title);
            });

            $('[data-toggle="tooltip"]').tooltip();

            let priceExt = null;

            $('.list-flight-ext .plc-itm').click(function () {
                let ticketNumber = $(this).html();
                $('#number-ticket-ext').val(ticketNumber);
                priceExt = Number(ticketNumber);

                if(ticketNumber[ticketNumber.length - 1] === 'E') {
                    priceExt = 3000;
                } else if (ticketNumber[ticketNumber.length - 1] === 'B') {
                    priceExt = 5000;
                }
                $(this).css('background-color', '#0f0f0f');
            });

            $('.list-flight .plc-itm').click(function () {

                $('.show-regist').show();
                let ticketNumber = $(this).html();
                $('#number-ticket').val(ticketNumber);

                if(ticketNumber[ticketNumber.length - 1] === 'E') {
                    priceMain = 3000;
                } else if (str[str.length - 1] === 'B') {
                    priceMain = 5000;
                }

                $(this).toggleClass('temporarily');

                price = priceExt + priceMain;

                $('.pay-ticket').html('Стоимость: ' + price + ' руб.');
                $('html, body').animate({
                    scrollTop: $(".registration").offset().top
                }, 1000);

                $('.show-regist').click(function () {
                    $('.list-flight').hide();
                    $('.list-flight-ext').hide();
                    $('.registration').show();
                    $(this).hide();
                });
            });

            $('.plc-itm').each(function (index, item) {
                if ($(item).html() === '') {
                    $(this).toggleClass('not-used');
                }
            });
        }
    }
}

function getTickets(ajax_form, url, tickets) {
    $.ajax({
        url:     url,
        type:    "POST",
        dataType: "html",
        data: $("."+ajax_form).serialize(),

        success: function(response) {
            result = $.parseJSON(response);
            for(var i = 0; i < result.length; i++) {
                tickets.each(function(index) {
                   if($(this).html() === result[i].place) {
                       $(this).css("color", "darkred");
                       $(this).toggleClass('booked');
                       $(this).parent().css('pointer-events', 'none');
                   }
                });
            }
        },
    });
}