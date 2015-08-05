<?php
include '../tools.php';
include 'xml/moduleFile.php';

$moduleFile = new ModuleFile();

$moduleXml = $moduleFile->toXml();
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="us-ascii"?>' . $moduleXml);

header("Content-type: text/xml; charset=utf-8");

echo $xml->asXml();
