<?php

namespace Pix;

class URLParser {
    function TextToURL(string $Text) {
        $Text = strtolower($Text);
        $Text = str_replace(' ','-',$Text);
        return $Text;
    }

    function URLToID(string $URL) {
        $URL = explode('-',$URL);
        $URL = substr($URL[0], strrpos($URL[0], '/') + 1);
        return $URL;
    }
}