<?php

namespace LexProdSAS\UnblockedResourceLoader;

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

        // Check that 'public-dir' is defined in the 'extra' section of the project's composer.json file.
        if (isset($extras['public-dir'])) {
            $publicDir = $extras['public-dir'];

            $vendorDir = __DIR__;  // The path to the folder where this script is located

            // Delete the symbolic link if it already exists
            if (is_link("$publicDir/unblocked-resource-loader")) {
                unlink("$publicDir/unblocked-resource-loader");
            }

            // Create a new symbolic link
            symlink($vendorDir, "$publicDir/unblocked-resource-loader");
        }
    }

}
