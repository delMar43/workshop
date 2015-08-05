<?php
include '../tools.php';
include 'xml/briefingFile.php';

$briefingFile = new BriefingFile();

$briefingXml = $briefingFile->toXml();
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="us-ascii"?>' . $briefingXml);

header("Content-type: text/xml; charset=utf-8");

echo $xml->asXml();
