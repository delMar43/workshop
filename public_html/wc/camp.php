<?php

include '../tools.php';
include 'xml/campFile.php';

$campFile = new CampFile();
$campFile->addStellarBackground(0, 2, 0, 0, 0);
$campFile->addBarSeatingArrangement(0, 5, 4);
$campFile->addBarSeatingArrangement(1, 0, 1);

/*series branch block */
$block = new SeriesBranch();
$block->wingmanPilotIndex = 0;
$block->cutsceneIndex = -1;
$block->missionsActive = 2;
$block->successScore = 10;
$block->successSeriesIndex = 2;
$block->successShipIndex = 2;
$block->failureSeriesIndex = 3;
$block->failureShipIndex = 0;

$missionScoring = new MissionScoring();
$missionScoring->militaryDecorationIndex = 0;
$missionScoring->militaryDecorationScore = 2000;
$missionScoring->navigationPointScoring = array(2, 1, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
//echo $missionScoring->toXml();

$block->addMissionScoring(0, $missionScoring);

//$campFile->seriesBranch[] = $block;

$campXml = $campFile->toXml();
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="us-ascii"?>' . $campXml);
$result = $xml->asXml();
//error_log($result, 0);
//echo strlen($result);
//header('Content-Length: '.strlen($result));
header("Content-type: text/xml; charset=utf-8");

echo $result;
