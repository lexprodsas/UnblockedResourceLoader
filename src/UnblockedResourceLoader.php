<?php

namespace UnblockedResourceLoader;

class UnblockedResourceLoader
{
    private function read_file($file)
    {
        return @file_get_contents($file);
    }

    private function image($file_path, $mime_type_or_return = 'image/png')
    {
        $image_content = @file_get_contents($file_path);

        if ($image_content === FALSE) {
            return FALSE;
        }

        if ($mime_type_or_return === TRUE) {
            return $image_content;
        }

        header('Content-Length: ' . strlen($image_content));
        header('Content-Type: ' . $mime_type_or_return);
        header('Content-Disposition: inline; filename="' . basename($file_path) . '";');
        exit($image_content);
    }

    private function loadImage($ndd, $extension, $uri)
    {
        $url = "http://www.$ndd.$extension/$uri";
        $this->image($url);
    }

    private function redirectToUrl($ndd, $extension, $uri)
    {
        $url = "http://$ndd.$extension/$uri";

        if (isset($_GET['url'])) {
            unset($_GET['url']);
        }

        $gets = http_build_query($_GET);

        if (!empty($gets)) {
            $url .= "?$gets";
        }

        header("Location: $url");
        exit;
    }

    public function execute()
    {
        try {
            $a_url = explode('/', $_GET['url']);

            if ($a_url[0] === 'href') {
                $this->redirectToUrl($a_url[1], $a_url[2], $a_url[3]);
            } elseif ($a_url[0] === 'image') {
                $this->loadImage($a_url[1], $a_url[2], $a_url[3]);
            }
        } catch (\Exception $e) {
            error_log($e->getMessage() . "\n", 3, "error_log.txt");
            exit;
        }
    }
}
require 'vendor/autoload.php';

