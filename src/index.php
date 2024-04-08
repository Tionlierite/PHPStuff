<?php

$dateLosAngeles = new DateTime("now", new DateTimeZone('America/Los_Angeles'));
$dateNovosibirsk = new DateTime("now", new DateTimeZone('Asia/Novosibirsk'));

echo '<p>' . 'Time in Los Angeles right now: ' . $dateLosAngeles->format('H:i:s'). '<p>';

echo '<p>' . 'Time in Novosibirsk right now: ' . $dateNovosibirsk->format('H:i:s'). '<p>';