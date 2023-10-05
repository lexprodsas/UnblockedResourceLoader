<?php

namespace UnblockedResourceLoader;

use Composer\Script\Event;

class Installer
{
    public static function postInstall(Event $event)
    {
        self::createSymlink($event);
    }

    public static function postUpdate(Event $event)
    {
        self::createSymlink($event);
    }

    private static function createSymlink(Event $event)
    {
        $extras = $event->getComposer()->getPackage()->getExtra();

        if (isset($extras['public-dir'])) {
            $publicDir = $extras['public-dir'];
            $vendorDir = __DIR__;

            // Debug: Afficher les chemins utilisés
            echo "Vendor Dir: $vendorDir\n";
            echo "Public Dir: $publicDir\n";

            if (is_link("$publicDir/unblocked-resource-loader")) {
                // Debug: Message si le lien existe déjà
                echo "Link already exists. Removing...\n";
                unlink("$publicDir/unblocked-resource-loader");
            }

            // Debug: Message avant la création du lien symbolique
            echo "Creating symlink...\n";
            symlink($vendorDir, "$publicDir/unblocked-resource-loader");

            // Debug: Vérifier si le lien symbolique a été créé
            if (is_link("$publicDir/unblocked-resource-loader")) {
                echo "Symlink created successfully.\n";
            } else {
                echo "Failed to create symlink.\n";
            }
        } else {
            // Debug: Message si 'public-dir' n'est pas défini
            echo "'public-dir' is not set in composer.json extra.\n";
        }
    }


}
