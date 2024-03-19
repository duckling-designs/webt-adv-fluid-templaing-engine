<?php
namespace DucklingDesigns\WebtAdvFluidTemplaingEngine;
require_once '../vendor/autoload.php';

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

$view->assign('foobar', 'Single template 🔥');

echo $view->render('Default');
