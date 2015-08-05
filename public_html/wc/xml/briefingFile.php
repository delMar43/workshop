<?php

class BriefingFile
{
    private $funeralConversations;
    private $officeConversation;
    private $ceremonyConversation;
    private $missionConversationBlocks;

    public function __construct()
    {
        $this->funeralConversations = new SplFixedArray(7);
        $this->officeConversation = new Conversation();
        $this->ceremonyConversation = new Conversation();
        $this->missionConversationBlocks = new SplFixedArray(52);
    }

    public function toXml()
    {
        $result = '<BriefingFile><FuneralConversationBlock>';
        $result .= appIt($this->funeralConversations, 'Conversation');
        $result .= '</FuneralConversationBlock><OfficeConversationBlock>';
        $result .= $this->officeConversation->toXml();
        $result .= '</OfficeConversationBlock><CeremonyConversationBlock>';
        $result .= $this->ceremonyConversation->toXml();
        $result .= '</CeremonyConversationBlock><UnknownConversationBlock/>';
        $result .= appIt($this->missionConversationBlocks, 'MissionConversationBlock');
        $result .= '</BriefingFile>';
        return $result;
    }
}

class Conversation
{
    public $conversationLines = array();

    public function toXml()
    {
        $result = '<Conversation>';
        foreach ($this->conversationLines as $key => $value) {
            $result .= $value->toXml();
        }
        $result .= '<DialogSetting BackgroundImageIndex="2" ForegroundImageIndex="-2" TextColorIndex="10" Delay="80" /></Conversation>'; //todo: might now work, ForegroundImageIndex is interesting here

        return $result;
    }

    public static function toEmptyXml()
    {
        return '<Conversation/>';
    }
}

class ConversationLine
{
    private $backgroundImageIndex;
    private $foregroundImageIndex;
    private $textColorIndex;
    private $delay;
    private $commands;
    private $facialExpressions;
    private $libSyncText;
    private $text;

    public function toXml()
    {
        $result = "<DialogSetting BackgroundImageIndex=\"$this->backgroundImageIndex\" ForegroundImageIndex=\"$this->foregroundImageIndex\" TextColorIndex=\"$this->textColorIndex\" Delay=\"$this->delay\" />";
        $result .= "<Dialog Commands=\"$this->commands\" FacialExpressions=\"$this->facialExpressions\" LipSyncText=\"$this->libSyncText\">$this->text</Dialog>";
        return $result;
    }

    public static function toEmptyXml()
    {
        return '<DialogSetting/><Dialog/>';
    }
}

class MissionConversationBlock
{
    private static $nrConversations = 5;
    private $conversations;

    public function __construct()
    {
        $this->conversations = new SplFixedArray(MissionConversationBlock::$nrConversations);
    }

    public function toXml()
    {
        $result = '<MissionConversationBlock>';
        $result .= appIt($this->conversations, 'Conversation');
        $result .= '</MissionConversationBlock>';
        return $result;
    }

    public static function toEmptyXml()
    {
        return '<MissionConversationBlock/>';
    }
}