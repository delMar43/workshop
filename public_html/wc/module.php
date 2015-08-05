<?php
include '../tools.php';
include 'xml/moduleFile.php';

$moduleFile = new ModuleFile();

$moduleXml = $moduleFile->toXml();
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="us-ascii"?>' . $moduleXml);
echo $xml->asXml();
