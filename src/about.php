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

$aboutText = array(
    "Hallo das ist ein Test",
);

$view->assign('about', $aboutText);

echo $view->render('About');
