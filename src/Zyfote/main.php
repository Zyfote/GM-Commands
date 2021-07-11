<?php

declare(strict_types=1);

namespace main;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use Zyfote\commands\gm;
use Zyfote\commands\gmc;
use Zyfote\commands\gms;
use Zyfote\commands\gmspc;

class main extends PluginBase implements Listener {

    public function onEnable()
    {
        $this->getServer()->getCommandMap()->register("gm", new gm($this));
        $this->getServer()->getCommandMap()->register("gms", new gms($this));
        $this->getServer()->getCommandMap()->register("gmc", new gmc($this));
        $this->getServer()->getCommandMap()->register("gmspc", new gmspc($this));
    }
}