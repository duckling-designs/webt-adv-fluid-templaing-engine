<?php

$username = "Erich Fasching";

$template = file_get_contents('./templates/index.html');
$template = str_replace('###username###', $username, $template);

echo $template;


###blah###
$meinarray['blah'] = 5;
preg_replace();