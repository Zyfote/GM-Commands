<?php

declare(strict_types=1);

namespace Zyfote\commands;

use main\main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;

class gmc extends PluginCommand {
    private $plugin;

    public function __construct(main $plugin)
    {
        parent::__construct("gmc", $plugin);
        $this->plugin = $plugin;
        $this->setDescription("§9Gamemode Plugin made by Zyfote / JoshyM44");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$sender->hasPermission("gmc.command")) {
            $sender->sendMessage("§9You don't have permission to use this!");
            return;
        }
        if (!$sender instanceof Player) {
            $sender->sendMessage("§Be in-game to run this command!");
            return;
        }
        $sender->setGamemode(1);
    }
}