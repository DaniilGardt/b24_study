<?php

namespace UserTypes;

use Bitrix\Main\Loader;

Loader::includeModule("iblock");

class CUserTypeHomework
{
    public static function GetUserTypeDescription()
    {
        return [
            "PROPERTY_TYPE" => "S",
            "USER_TYPE" => "homework",
            "DESCRIPTION" => "Процедуры (popup)",
            "GetPropertyFieldHtml" => [__CLASS__, "GetPropertyFieldHtml"],
            "ConvertToDB" => [__CLASS__, "ConvertToDB"],
            "ConvertFromDB" => [__CLASS__, "ConvertFromDB"],
        ];
    }

    public static function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
    {
        // ID текущего врача
        $doctorId = $_REQUEST["ID"] ?? null;
        if (!$doctorId) return 'ID не найден';

        // Получаем привязанные процедуры врача
        $res = CIBlockElement::GetProperty(19, $doctorId, [], ['CODE' => 'PROC_IDS']);
        $html = '';

        // Строим кликабельные ссылки
        while ($prop = $res->Fetch()) {
            $procId = (int)$prop['VALUE'];
            $procedure = CIBlockElement::GetByID($procId)->GetNext();
            if (!$procedure) continue;

            $name = htmlspecialcharsbx($procedure['NAME']);
            $html .= <<<HTML
<div style="margin-bottom: 5px;">
    <a href="#" onclick="return openHomeworkPopup({$procId}, '{$name}');" style="color: #0066cc; text-decoration: underline;">{$name}</a>
</div>
HTML;
        }

        // JS popup (тот же)
        $html .= <<<HTML
<script>
function openHomeworkPopup(procId, procName) {
    const popup = BX.PopupWindowManager.create("homework_popup_" + procId, null, {
        autoHide: true,
        closeByEsc: true,
        titleBar: "Запись на " + procName,
        content: `
            <div style="padding:10px">
                <label>ФИО: <input type="text" id="homework_fio" /></label><br><br>
                <label>Дата: <input type="date" id="homework_date" /></label><br><br>
                <button onclick="submitHomework(\${procId})">Записаться</button>
            </div>
        `,
        buttons: []
    });
    popup.show();
    return false;
}

function submitHomework(procId) {
    const fio = BX("homework_fio").value;
    const date = BX("homework_date").value;

    BX.ajax({
        url: "/local/ajax/save_to_iblock.php",
        method: "POST",
        dataType: "json",
        data: {
            proc_id: procId,
            fio: fio,
            date: date,
            sessid: BX.bitrix_sessid()
        },
        onsuccess: function(response) {
            if (response.status === "ok") {
                alert("Запись успешно создана");
                BX.PopupWindowManager.getCurrentPopup().close();
            } else {
                alert("Ошибка: " + response.message);
            }
        }
    });
}
</script>
HTML;

        return $html;
    }


    public static function ConvertToDB($arProperty, $value)
    {
        return ['VALUE' => $value['VALUE']];
    }

    public static function ConvertFromDB($arProperty, $value)
    {
        return ['VALUE' => $value['VALUE']];
    }
}
