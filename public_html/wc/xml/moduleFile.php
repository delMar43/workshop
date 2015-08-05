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

    public function toXml()
    {
        $result = "<ModuleFile><AutopilotBlock>";
        $result .= appIt($this->autopilots, 'Autopilot');
        $result .= "</AutopilotBlock><MissionNavigationPointBlock>";
        $result .= appIt($this->missionNavigationPoints, 'MissionNavigationPoint');
        $result .= "</MissionNavigationPointBlock><MissionMapPointBlock>";
        $result .= appIt($this->missionMapPoints, 'MissionMapPoint');
        $result .= "</MissionMapPointBlock><MissionShipPointBlock>";
        $result .= appIt($this->missionShipPoints, 'MissionShipPoint');
        $result .= "</MissionShipPointBlock><WingNameBlock>";
        $result .= appIt($this->wingNames, 'WingName');
        $result .= "</WingNameBlock><SystemNameBlock>";
        $result .= appIt($this->systemNames, 'SystemName');
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

    public function addShip($index, $value)
    {
        $this->ships[$index] = $value;
    }

    public function toXml()
    {
        $result = '<Autopilot Ships="';
        $temp = '';
        foreach ($this->ships as $ship) {
            $temp .= "$ship ";
        }
        $result .= trim($temp);
        $result .= '" />"';
    }

    public static function toEmptyXml()
    {
        return '<Autopilot Ships="0 -1 -1 -1 -1 -1 -1 -1 -1 -1 -1 0" />';
    }
}

class MissionNavigationPoint
{
    private static $nrPoints = 16;
    private $navigationPoints;

    public function __construct()
    {
        $this->navigationPoints = new SplFixedArray(MissionNavigationPoint::$nrPoints);
    }

    public function toXml()
    {
        $result = "<MissionNavigationPoint>";
        $result .= appIt($this->navigationPoints, 'NavigationPoint');
        $result .= "</MissionNavigationPoint>";
        return $result;
    }

    public static function toEmptyXml()
    {
        $result = '<MissionNavigationPoint>';
        for ($idx = 0; $idx < MissionNavigationPoint::$nrPoints; $idx++) {
            $result .= NavigationPoint::toEmptyXml();
        }
        $result .= '</MissionNavigationPoint>';
        return $result;
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
        return "<NavigationPoint Name=\"$this->name\" Format=\"$this->format\" Point=\"$this->pointX,$this->pointY,$this->pointZ\" Radius=\"$this->radius\" ShipClasses=\"$this->shipClasses\" Ships=\"$this->ships\" />";
    }

    public static function toEmptyXml()
    {
        return '<NavigationPoint Name="" Format="0" Point="0,0,0" Radius="0" ShipClasses="-1 -1" Ships="-1 -1 -1 -1 -1 -1 -1 -1 -1 -1" />';
    }
}

class MissionMapPoint
{
    private static $nrPoints = 16;
    private $mapPoints;

    public function __construct()
    {
        $mapPoints = new SplFixedArray(MissionMapPoint::$nrPoints);
    }

    public function getXml()
    {
        $result = "<MissionMapPoint>";
        $result .= appIt($this->mapPoints, 'MapPoint');
        $result .= "</MissionMapPoint>";
        return $result;
    }

    public static function toEmptyXml()
    {
        $result = '<MissionMapPoint>';
        for ($idx = 0; $idx < MissionMapPoint::$nrPoints; $idx++) {
            $result .= MapPoint::toEmptyXml();
        }
        $result .= '</MissionMapPoint>';
        return $result;
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
        return "<MapPoint Format=\"$this->format\" TargetIndex=\"$this->targetIndex\" />";
    }

    public static function toEmptyXml()
    {
        return '<MapPoint Format="-1" TargetIndex="0" />';
    }
}

class MissionShipPoint
{
    private static $nrPoints = 32;
    private $shipPoints;

    public function __construct()
    {
        $shipPoints = new SplFixedArray(MissionShipPoint::$nrPoints);
    }

    public function toXml()
    {
        $result = "<MissionShipPoint>";
        $result .= appIt($this->shipPoints, 'ShipPoint');
        $result .= "</MissionShipPoint>";
        return $result;
    }

    public static function toEmptyXml()
    {
        $result = '<MissionShipPoint>';
        for ($idx = 0; $idx < MissionShipPoint::$nrPoints; $idx++) {
            $result .= ShipPoint::toEmptyXml();
        }
        $result .= '</MissionShipPoint>';
        return $result;
    }
}

class ShipPoint
{
    private $classIndex;
    private $allegiance;
    private $leadShipIndex;
    private $ordersIndex;
    private $locationX;
    private $locationY;
    private $locationZ;
    private $orientationX;
    private $orientationY;
    private $orientationZ;
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
        return "<ShipPoint ClassIndex=\"$this->classIndex\" Allegiance=\"$this->allegiance\" LeadShipIndex=\"$this->leadShipIndex\" OrdersIndex=\"$this->ordersIndex\" Location=\"$this->locationX,$this->locationY,$this->locationZ\" Orientation=\"$this->orientationX,$this->orientationY,$this->orientationZ\" Speed=\"$this->speed\" Size=\"$this->size\" PilotCharacteristicsIndex=\"$this->pilotCharacteristicsIndex\" FormationIndex=\"$this->formationIndex\" FormationPositionNumber=\"$this->formationPositionNumber\" PrimaryTargetShipIndex=\"$this->primaryTargetShipIndex\" SecondaryTargetShipIndex=\"$this->secondaryTargetShipIndex\" Unknown1=\"$this->unknown1\" Unknown2=\"$this->unknown2\" Unknown3=\"$this->unknown3\" Unknown4=\"$this->unknown4\" Unknown5=\"$this->unknown5\" Unknown6=\"$this->unknown6\" />";
    }

    public static function toEmptyXml()
    {
        return '<ShipPoint ClassIndex="-1" Allegiance="0" LeadShipIndex="-1" OrdersIndex="0" Location="0,0,0" Orientation="0,0,0" Speed="0" Size="0" PilotCharacteristicsIndex="0" FormationIndex="0" FormationPositionNumber="0" PrimaryTargetShipIndex="0" SecondaryTargetShipIndex="-1" Unknown1="0" Unknown2="0" Unknown3="0" Unknown4="0" Unknown5="0" Unknown6="0" />';
    }
}

class WingName
{
    private $value;

    public function toXml()
    {
        return "<WingName>$this->value</WingName>";
    }

    public static function toEmptyXml()
    {
        return '<WingName />';
    }
}

class SystemName
{
    private $value;

    public function toXml()
    {
        return "<SystemName>$this->value</SystemName>";
    }

    public static function toEmptyXml()
    {
        return '<SystemName />';
    }
}