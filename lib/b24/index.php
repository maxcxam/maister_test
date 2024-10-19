<?php

require_once ('CRest.php');

$result = App\B24\CRest::call(
    'crm.company.list',
    [
        'select' => ["ID", "TITLE"],
        'filter' => []
    ]
);

echo "<table>";
foreach ($result['result'] as $master) {
    echo "<tr><td>{$master['TITLE']}</td><td><button type='submit'>З</button></td></tr>";
}
echo "</table>";
