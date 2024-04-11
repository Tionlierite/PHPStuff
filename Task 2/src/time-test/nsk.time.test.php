<?php

$dateNovosibirsk = new DateTime("now", new DateTimeZone('Asia/Novosibirsk'));

echo '<p>' . 'Time in Novosibirsk right now: ' . $dateNovosibirsk->format('H:i:s'). '<p>';