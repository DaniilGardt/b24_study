
//умеет понимать для какого события вне зависимости какой объект запустить свой обработчик
/*
BX.addCustomEvent('onTimeManWindowOpen', function () {
    let a = document.createElement('div')
    let popup = BX.PopupWindowManager.create("timeman-notify", a, {
        // создаём окно, идентификатор должен быть уникальный
            content: "Hello World!", // здесь пишется содержимое окна
            autoHide: true, // прятать при клике вне окна
            closeIcon: {
                right: "20px", top: "10px" // описание отступа иконки закрытия
            },
            draggable: true,
            closeByEsc: true,
            overlay: {
                backgroundColor: 'red', opacity: '80'
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
                    text: "Показать секрет",
                    className: "popup-window-button-accept", // стили
                    events: {
                        click: function(){
                            alert('секрет')
                        }
                    }
                }),
                new BX.PopupWindowButton({
                    text: "Скрыть попап",
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

})
*/
