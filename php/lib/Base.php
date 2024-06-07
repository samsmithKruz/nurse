<?php

namespace php\lib;

use DOMDocument;

class Base
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
        // print_r($this);exit();
    }
    public static function fieldExist($data, $field, $table)
    {
        $db = (new self())->db;
        $db->query("select $field from $table where $field=:data");
        $db->bind(":data", $data);
        $db->execute();
        return $db->rowCount() > 0;
    }
    public static function getUser($email)
    {
        $db = (new self())->db;
        $db->query("select * from users where email=:email");
        $db->bind(":email", $email);
        return $db->single();
    }
    public static function base64ToImage($base64String, $outputDir)
    {
        // Check if the output directory exists, if not, create it
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        // Split the base64 string to get the image type and the actual data
        list($type, $data) = explode(';', $base64String);
        list(, $data) = explode(',', $data);

        // Decode the base64 string
        $data = base64_decode($data);

        // Get the image extension
        preg_match('/^data:image\/(\w+);base64,/', $base64String, $matches);
        $extension = $matches[1];

        // Generate a unique name for the file
        $fileName = uniqid() . '.' . $extension;

        // Set the full path for the file
        // $filePath = $outputDir . DIRECTORY_SEPARATOR . $fileName;
        $filePath = $outputDir . "/" . $fileName;
        // Write the binary data to the file
        file_put_contents($filePath, $data);

        // Return the file path
        return $filePath;
    }
    public static function processHtmlContent($htmlContent, $outputDir)
    {
        // Load the HTML content into a DOMDocument
        $dom = new DOMDocument();
        @$dom->loadHTML('<div id="temp_div">' . $htmlContent . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Find all img tags
        $imgTags = $dom->getElementsByTagName('img');

        foreach ($imgTags as $imgTag) {
            $src = $imgTag->getAttribute('src');

            if (strpos($src, 'data:image') === 0) {
                // Convert base64 image to a file and get the new file path
                $filePath = self::base64ToImage($src, $outputDir);

                // Set the new src attribute to the file path
                $imgTag->setAttribute('src', $filePath);

                if ($imgTag->hasAttribute('width')) {
                    $imgTag->removeAttribute('width');
                }
                if ($imgTag->hasAttribute('height')) {
                    $imgTag->removeAttribute('height');
                }
                if ($imgTag->hasAttribute('style')) {
                    $imgTag->removeAttribute('style');
                }
            }
        }
        $innerHtml = '';
        foreach ($dom->getElementById("temp_div")->childNodes as $child) {
            $innerHtml .= $dom->saveHTML($child);
        }

        return $innerHtml;
    }
}
