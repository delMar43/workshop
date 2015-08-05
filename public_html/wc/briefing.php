<?php

class BriefingFile
{
    private $funeralConversations;
    private $officeConversation;
    private $ceremonyConversation;
    private $missionConversationBlocks;

    public function toXml()
    {
        $this->funeralConversations = new SplFixedArray(7);
        $this->missionConversationBlocks = new SplFixedArray(52);
    }
}

class Conversation
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
}

class MissionConversationBlock
{
    private $conversations;

    public function __construct()
    {
        $this->conversations = new SplFixedArray(5);
    }


}