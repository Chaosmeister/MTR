<?php

namespace Kanboard\Plugin\MoveToReleaseProject;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->hook->attach("template:task:sidebar:after-duplicate-task", "MoveToReleaseProject:movetorelease");
    }

    public function getPluginName()
    {
        return 'EnableAttachmentRenaming';
    }

    public function getPluginDescription()
    {
        return 'Add a Button to move a task to the release board';
    }

    public function getPluginAuthor()
    {
        return 'Tomas Dittmann';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }
    
    public function getPluginHomepage()
    {
        return "https://github.com/Chaosmeister/MTRP";
    }
    
    public function getCompatibleVersion()
    {
        return '>=1.2.36';
    }
}
