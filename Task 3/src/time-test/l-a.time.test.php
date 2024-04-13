<?php

$dateLosAngeles = new DateTime("now", new DateTimeZone('America/Los_Angeles'));

echo '<p>' . 'Time in Los Angeles right now: ' . $dateLosAngeles->format('H:i:s'). '<p>';