<?php

namespace Core\Controller;

class Controller
{

    public function encodeChars($data)
    {
        $encoded = [];
        foreach ($data as $key => $element) {

            $encoded[$key] = htmlspecialchars($element);
        }
        return $encoded;
    }

    public function render($content = null)
    {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        if (empty($content)) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
            $content = 'Cannot GET ' . $_SERVER['REQUEST_URI'];;
            die($content);
        } else {
            $json = json_encode($content, JSON_PRETTY_PRINT);
            die($json);
        }
    }
}
