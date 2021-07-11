<?php

namespace Zyfote\commands;

use main\main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use jojoe77777\FormAPI\SimpleForm;

class gm extends PluginCommand {

    private $plugin;

    public function __construct(main $plugin)
    {
        parent::__construct("gm", $plugin);
        $this->plugin = $plugin;
        $this->setDescription("§9Gamemode Plugin made by Zyfote / JoshyM44");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if (!$sender->hasPermission("gm.command")) {
            $sender->sendMessage("§cYou can't do this");
            return false;
        }
        $form = new SimpleForm(function(Player $sender, $data): void{
            switch ($data){
                case "1":
                    $sender->setGamemode(1);
                    $sender->sendMessage("§aGamemode set to Creative!");
                    break;
                case "2":
                    $sender->setGamemode(0);
                    $sender->sendMessage("§aGamemode set to Survival!");
                    break;
                case "3":
                    $sender->setGamemode(3);
                    $sender->sendMessage("§aGamemode set to Spectator Mode!");
                    break;
                case "4":
                    $sender->sendMessage("§cProcess Canceled!");
            }
        });
        $form->setTitle("Gamemode GUI");
        $form->addButton("Creative", -1, "", "1");
        $form->addButton("Survival", -1, "", "2");
        $form->addButton("Spectator", -1, "", "3");
        $form->addButton("Exit", -1, "", "4");
        $form->setContent("Pick your Gamemode!");
        $sender->sendForm($form);
        return true;
    }
}