<?php

namespace UnblockedResourceLoader;

class UnblockedResourceLoader
{
    // Constants for the URL types
    public const URL_TYPE_HREF = 'href';
    public const URL_TYPE_IMAGE = 'image';

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

    private function handleRequest(array $urlParts)
    {
        $type = $urlParts[0];
        $ndd = $urlParts[1];
        $extension = $urlParts[2];
        // Joindre le reste des éléments en une chaîne pour former l'URI
        $uri = implode('/', array_slice($urlParts, 3));

        if ($type === self::URL_TYPE_HREF) {
            $this->redirectToUrl($ndd, $extension, $uri);
        } elseif ($type === self::URL_TYPE_IMAGE) {
            $this->loadImage($ndd, $extension, $uri);
        }
    }

    public function execute()
    {
        try {
            $urlParts = explode('/', $_GET['url']);
            $this->handleRequest($urlParts);
        } catch (\Exception $e) {
            error_log($e->getMessage() . "\n", 3, "error_log.txt");
            exit;
        }
    }
}
