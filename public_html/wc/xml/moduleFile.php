<?php

class ModuleFile
{
    private $autopilots;
    private $missionNavigationPoints;
    private $missionMapPoints;
    private $missionShipPoints;
    private $wingNames;
    private $systemNames;

    public function __construct()
    {
        $this->autopilots = new SplFixedArray(64);
        $this->missionNavigationPoints = new SplFixedArray(64);
        $this->missionMapPoints = new SplFixedArray(64);
        $this->missionShipPoints = new SplFixedArray(64);
        $this->wingNames = new SplFixedArray(64);
        $this->systemNames = new SplFixedArray(16);
    }

    function toXml()
    {
        $result = "<ModuleFile><AutopilotBlock>";
        $result .= appIt($this->autopilots);
        $result .= "</AutopilotBlock><MissionNavigationPointBlock>";
        $result .= appIt($this->missionNavigationPoints);
        $result .= "</MissionNavigationPointBlock><MissionMapPointBlock>";
        $result .= appIt($this->missionMapPoints);
        $result .= "</MissionMapPointBlock><MissionShipPointBlock>";
        $result .= appIt($this->missionShipPoints);
        $result .= "</MissionShipPointBlock><WingNameBlock>";
        $result .= appIt($this->wingNames);
        $result .= "</WingNameBlock><SystemNameBlock>";
        $result .= appIt($this->systemNames);
        $result .= "</SystemNameBlock></ModuleFile>";
        return $result;
    }
}

class Autopilot
{
    private $ships;

    public function __construct()
    {
        $this->ships = new SplFixedArray(12);
    }

    function addShip($index, $value)
    {
        $this->ships[$index] = $value;
    }

    function toXml()
    {
        $result = '<Autopilot Ships="';
        $temp = '';
        foreach ($this->ships as $ship) {
            $temp .= "$ship ";
        }
        $result .= trim($temp);
        $result .= '" />"';
    }

    function toEmptyXml() {
        return '<Autopilot Ships="0 -1 -1 -1 -1 -1 -1 -1 -1 -1 -1 0" />';
    }
}

class MissionNavigationPoint
{
    private $navigationPoint;

    public function __construct()
    {
        $this->navigationPoint = new SplFixedArray(16);
    }

    public function toXml()
    {

    }
}

class NavigationPoint
{
    private $name;
    private $format;
    private $pointX;
    private $pointY;
    private $pointZ;
    private $radius;
    private $shipClasses;
    private $ships;

    public function __construct($name, $format, $pointX, $pointY, $pointZ, $radius, $shipClasses, $ships)
    {
        $this->name = $name;
        $this->format = $format;
        $this->pointX = $pointX;
        $this->pointY = $pointY;
        $this->pointZ = $pointZ;
        $this->radius = $radius;
        $this->shipClasses = $shipClasses;
        $this->ships = $ships;
    }

    public function toXml()
    {

    }
}

class MissionMapPoint
{
    private $mapPoints;

    public function __construct()
    {
        $mapPoints = new SplFixedArray(16);
    }
}

class MapPoint
{
    private $format;
    private $targetIndex;

    public function __construct($format, $targetIndex)
    {
        $this->format = $format;
        $this->targetIndex = $targetIndex;
    }

    public function toXml()
    {

    }
}

class MissionShipPoint
{
    private $shipPoints;

    public function __construct()
    {
        $shipPoints = new SplFixedArray(32);
    }

    public function toXml()
    {

    }
}

class ShipPoint
{
    private $classIndex;
    private $allegiance;
    private $leadShipIndex;
    private $ordersIndex;
    private $location;
    private $orientation;
    private $speed;
    private $size;
    private $pilotCharacteristicsIndex;
    private $formationIndex;
    private $formationPositionNumber;
    private $primaryTargetShipIndex;
    private $secondaryTargetShipIndex;
    private $unknown1;
    private $unknown2;
    private $unknown3;
    private $unknown4;
    private $unknown5;
    private $unknown6;

    public function toXml()
    {

    }
}
