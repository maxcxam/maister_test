<head>
    <script src="//api.bitrix24.com/api/v1/"></script>
</head>
<body>
@dump($result)
<select name="reason" id="reason" class="form-select">
    <option value="" disabled selected>Оберіть причину</option>
    <option value="master_reassigned">Перекріпити майстра (чи закріпити нового майстра)</option>
    <option value="upsell">Доппродана угода (менеджер ще допродав якусь послугу)</option>
    <option value="second_service">Друга послуга (під час першого звернення клієнту потрібен ремонт не однієї одиниці техніки)</option>
    <option value="second_contact">Друге звернення клієнта (клієнт звертався раніше, і зараз звернувся повторно за новою послугою)</option>
</select>
</body>
