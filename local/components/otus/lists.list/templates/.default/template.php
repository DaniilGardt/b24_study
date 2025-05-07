<?php if (!empty($arResult['CURRENCIES'])): ?>
    <ul>
        <?php foreach ($arResult['CURRENCIES'] as $currency): ?>
            <li>
                Валюта: <?= htmlspecialchars($currency['CURRENCY']) ?><br />
                Сумма: <?= htmlspecialchars($currency['AMOUNT']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Данные о валютах отсутствуют.</p>
<?php endif; ?>