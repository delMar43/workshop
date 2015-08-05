<?php

class CampFile
{

    private $stellarBackground;
    public $seriesBranch;
    private $barSeatingArrangement;

    public function __construct()
    {
        $this->stellarBackground = new SplFixedArray(52);
        $this->seriesBranch = new SplFixedArray(13);
        $this->barSeatingArrangement = new SplFixedArray(52);
    }

    public function addStellarBackground($index, $imageIndex, $rotationX, $rotationY, $rotationZ)
    {
        $this->stellarBackground[$index] = new StellarBackground($imageIndex, $rotationX, $rotationY, $rotationZ);
    }

    public function addBarSeatingArrangement($index, $left, $right)
    {
        $this->barSeatingArrangement[$index] = new BarSeatingArrangement($left, $right);
    }

    public function toXml()
    {
        $result = "<CampFile><StellarBackgroundBlock>";
        $result .= appIt($this->stellarBackground, 'StellarBackground');
        $result .= "</StellarBackgroundBlock><SeriesBranchBlock>";
        $result .= appIt($this->seriesBranch, 'SeriesBranch');
        $result .= "</SeriesBranchBlock><BarSeatingArrangementBlock>";
        $result .= appIt($this->barSeatingArrangement, 'BarSeatingArrangement');
        $result .= "</BarSeatingArrangementBlock></CampFile>";
        return $result;
    }

}

class StellarBackground
{
    private $imageIndex;
    private $rotationX;
    private $rotationY;
    private $rotationZ;

    public function __construct($imageIndex, $rotationX, $rotationY, $rotationZ)
    {
        $this->imageIndex = $imageIndex;
        $this->rotationX = $rotationX;
        $this->rotationY = $rotationY;
        $this->rotationZ = $rotationZ;
    }

    public function toXml()
    {
        return "<StellarBackground ImageIndex=\"$this->imageIndex\" Rotation=\"$this->rotationX,$this->rotationY,$this->rotationZ\" />";
    }

    public static function toEmptyXml() {
        return "<StellarBackground ImageIndex=\"-1\" Rotation=\"0,0,0\" />";
    }
}

class SeriesBranch
{
    public $wingmanPilotIndex;
    public $cutsceneIndex;
    public $missionsActive;
    public $successScore;
    public $successSeriesIndex;
    public $successShipIndex;
    public $failureSeriesIndex;
    public $failureShipIndex;

    private $missionScorings;

    public function __construct()
    {
        $this->missionScorings = new SplFixedArray(4);
    }

    public function addMissionScoring($index, $missionScoring)
    {
        $this->missionScorings[$index] = $missionScoring;
    }

    public function toXml()
    {
        $result = "<SeriesBranch WingmanPilotIndex=\"$this->wingmanPilotIndex\" CutsceneIndex=\"$this->cutsceneIndex\" MissionsActive=\"$this->missionsActive\" SuccessScore=\"$this->successScore\" SuccessSeriesIndex=\"$this->successSeriesIndex\" SuccessShipIndex=\"$this->successShipIndex\" FailureSeriesIndex=\"$this->failureSeriesIndex\" FailureShipIndex=\"$this->failureShipIndex\" >";
        $result .= appIt($this->missionScorings, 'MissionScoring');
        $result .= "</SeriesBranch>";
        return $result;
    }

    public static function toEmptyXml() {
        //TODO: empty has to be checked from SM1 or SM2 because the main campaign has no empty series
        $result = "<SeriesBranch WingmanPilotIndex=\"-1\" CutsceneIndex=\"-1\" MissionsActive=\"-1\" SuccessScore=\"-1\" SuccessSeriesIndex=\"-1\" SuccessShipIndex=\"-1\" FailureSeriesIndex=\"-1\" FailureShipIndex=\"-1\" >";
        for ($idx=0; $idx < 4; $idx++) {
            $result .= MissionScoring::toEmptyXml();
        }
        $result .= "</SeriesBranch>";
        return $result;
    }
}

class MissionScoring
{
    public $militaryDecorationIndex;
    public $militaryDecorationScore;
    public $navigationPointScoring;

    public function __construct()
    {
        $this->navigationPointScoring = new SplFixedArray(16);
    }

    public function toXml() {
      $result = "<MissionScoring MilitaryDecorationIndex=\"$this->militaryDecorationIndex\" MilitaryDecorationScore=\"$this->militaryDecorationScore\" ";
      $result .= "NavigationPointScoring=\"";
      foreach ($this->navigationPointScoring as $nps) {
        $result .= "$nps ";
      }
      $result .= "\" />";
      return $result;
    }

    public static function toEmptyXml() {
        return "<MissionScoring MilitaryDecorationIndex=\"0\" MilitaryDecorationScore=\"0\" NavigationPointScoring=\"0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0\" />";
    }
}

class BarSeatingArrangement
{
    private $leftSeatPilotIndex;
    private $rightSeatPilotIndex;

    public function __construct($left, $right)
    {
        $this->leftSeatPilotIndex = $left;
        $this->rightSeatPilotIndex = $right;
    }

    public function toXml()
    {
        return "<BarSeatingArrangement LeftSeatPilotIndex=\"$this->leftSeatPilotIndex\" RightSeatPilotIndex=\"$this->rightSeatPilotIndex\" />";
    }

    public static function toEmptyXml() {
        return "<BarSeatingArrangement LeftSeatPilotIndex=\"-1\" RightSeatPilotIndex=\"-1\" />";
    }
}
