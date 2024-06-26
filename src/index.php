<?php
namespace DucklingDesigns\WebtAdvFluidTemplaingEngine;
require_once '../vendor/autoload.php';

use DucklingDesigns\WebtAdvFluidTemplaingEngine\Model\Hotel;

use TYPO3Fluid\Fluid\View\TemplateView;

$view = new TemplateView();

$paths = $view->getTemplatePaths();
$paths->setTemplateRootPaths([
    __DIR__ . '/../Resources/Templates/'
]);
$paths->setLayoutRootPaths([
    __DIR__ . '/../Resources/Layouts/'
]);
$paths->setPartialRootPaths([
    __DIR__ . '/../Resources/Partials/'
]);

$hotels = array(
    new Hotel('Wynn', 'Schön aber teuer, auf jeden Fall fürs Frühstück hin'),
    new Hotel('Mandalay Bay', 'Ganz oben am Strip, gut und nicht so teuer'),
    new Hotel('Excalibur', 'Gehen Sie nicht ins Excalibur, ist zum Wohnen nicht so nice angeblich'),
);

$view->assign('hotels', $hotels);

echo $view->render('Default');
