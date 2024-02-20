<?php
require 'Hotel.php';

$html = file_get_contents('templates/index.html');

$variables = [];

$variables['hotels'] = [];
$variables['hotels'][] = new Hotel('Bellagio', 'Known for its elegant design, iconic fountains, and the Bellagio Conservatory & Botanical Gardens.');
$variables['hotels'][] = new Hotel('Caesars Palace', 'A luxury hotel and casino in Paradise, Nevada, United States.');
$variables['hotels'][] = new Hotel('The Cosmopolitan', 'A luxury resort casino and hotel on the Las Vegas Strip in Paradise, Nevada.');
$variables['hotels'][] = new Hotel('The Venetian', 'A luxury hotel and former casino in Paradise, Nevada, United States.');
$variables['hotels'][] = new Hotel('Wynn', 'A luxury resort and casino located on the Las Vegas Strip.');
$variables['hotels'][] = new Hotel('MGM Grand', 'A luxury resort and casino located on the Las Vegas Strip.');
$variables['hotels'][] = new Hotel('Paris', 'A luxury resort and casino located on the Las Vegas Strip.');
$variables['hotels'][] = new Hotel('Aria', 'A luxury resort and casino located on the Las Vegas Strip.');

$lines = explode("\n", $html);
$finalHtml = '';
$inLoop = false;
$loopHtml = '';
$loopArrayName = '';
$loopVariableName = '';

foreach ($lines as $line) {
    if (str_contains($line, '###for')) {
        $temp = substr($line, strpos($line, '###for ') + 6, strrpos($line, '###') - strpos($line, '###for ') - 6);
        $loopVariableName = substr($temp, 1, strpos($temp, ' in ') - 1);
        $loopArrayName = substr($temp, strpos($temp, ' in ') + 4);
        $inLoop = true;
        continue;
    }

    if (str_contains($line, '###endfor###')) {
        $inLoop = false;

        foreach ($variables[$loopArrayName] as $variable) {
            $tempHtml = $loopHtml;
            foreach ($variable as $key => $value) {
                $tempHtml = str_replace('###' . $loopVariableName . '.' . $key . '###', $value, $tempHtml);
            }
            $finalHtml .= preg_replace_callback('/(###)(.*)(###)/', function ($matches) use ($variables) {
                    return $variables[$matches[2]];
                }, $tempHtml) . "\n";
        }
        $loopHtml = '';
        continue;
    }

    if ($inLoop) {
        $loopHtml .= $line . "\n";
    } else {
        $finalHtml .= preg_replace_callback('/(###)(.*)(###)/', function ($matches) use ($variables) {
                return $variables[$matches[2]];
            }, $line) . "\n";
    }
}

echo $finalHtml;
