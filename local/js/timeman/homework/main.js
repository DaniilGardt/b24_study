

//умеет понимать для какого события вне зависимости какой объект запустить свой обработчик
//BX.Timeman.WorktimeWindow = function() {};
/*BX.ready(function () {
    // Отключаем стандартный попап
    BX.removeAllCustomEvents('onTimeManWindowOpen');
});*/
BX.addCustomEvent('onTimeManWindowOpen', function () {




    let a = document.createElement('div')
    let popup = BX.PopupWindowManager.create("timeman-notify", null, {
            // создаём окно, идентификатор должен быть уникальный
            content:
                "<div><b>Управление рабочим днём:</div>", // здесь пишется содержимое окна
            autoHide: true, // прятать при клике вне окна
            closeIcon: {
                right: "10px", top: "10px" // описание отступа иконки закрытия
            },
            draggable: true,
            closeByEsc: true,
            overlay: {
                backgroundColor: 'BLACK', opacity: '80'
            },
            lightShadow: true,
            darkMode: false,
            events: {
                onPopupShow: function() {
                    console.log('Hello world!')
                },
                onPopupClose: function() {
                    console.log('Bye world!')
                },
            },
            buttons: [
                new BX.PopupWindowButton({
                    text: "Начать рабочий день",
                    className: "popup-window-button-accept", // стили
                    data: { sessid: BX.bitrix_sessid() },
                    events: { // обычные ивенты js
                        click: function(){
                            BX.ajax({
                                url: '/local/ajax/startday.php',
                                method: 'POST',
                                onsuccess: function(response) {
                                    response = response.trim(); // Убираем лишние пробелы/переводы строк

                                    if (response === 'success') {
                                        alert("День начат!");
                                        location.reload();
                                    } else {
                                        alert("Ошибка: " + response);
                                    }
                                }
                            });
                            this.popupWindow.close();
                        }
                    }
                }),
                new BX.PopupWindowButton({
                    text: "Закончить рабочий день",
                    className: "popup-window-button-accept", // стили
                    data: { sessid: BX.bitrix_sessid() },
                    events: { // обычные ивенты js
                        click: function(){
                            BX.ajax({
                                url: '/local/ajax/closeday.php',
                                method: 'POST',
                                onsuccess: function(response) {
                                    response = response.trim(); // Убираем лишние пробелы/переводы строк

                                    if (response === 'success') {
                                        alert("День завершен!");
                                        location.reload();
                                    } else {
                                        alert("Ошибка: " + response);
                                    }
                                }
                            });

                            this.popupWindow.close();
                        }
                    }
                }),
                new BX.PopupWindowButton({
                    text: "Отменить",
                    className: "webform-button-link-cancel",
                    events: {
                        click: function(){
                            this.popupWindow.close();
                        }
                    }
                }),
            ]
        }
    );
    popup.show();

    // 1. Закрываем стандартное окно
 /*   if (popup && typeof popup.close === 'function') {
        popup.close();
    }*/
})
