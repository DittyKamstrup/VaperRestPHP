<?php
/**
 * Created by PhpStorm.
 * User: Ditte
 * Date: 07-01-2018
 * Time: 18:03
 */

require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../View');
$twig = new Twig_Environment($loader, array('auto_loader' => true));
$template = $twig->loadTemplate('alleVapers.html.twig');
$twig2 = new Twig_Environment($loader, array('auto_loader' => true));
$template2 = $twig->loadTemplate('VaperFraId.html.twig');

$uri = "http://vaperrestservice.azurewebsites.net/Service1.svc/vapers";
$json = file_get_contents($uri);
$Liste = json_decode($json);
$twigContent = array("Vapers" => $Liste);

$uri2 = "http://vaperrestservice.azurewebsites.net/Service1.svc/vapers/2";
$json2 = file_get_contents($uri2);
$SingleVap = json_decode($json2);
$twigContent2 = array("vap" => $SingleVap);

//print_r($twigContent);
echo $template->render($twigContent);
echo $template2->render($twigContent2);