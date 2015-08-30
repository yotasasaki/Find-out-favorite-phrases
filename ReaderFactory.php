<?php

//require_once __DIR__ . "/ReaderInterface.php";
require_once __DIR__ . "/LineTextReader.php";

class ReaderFactory
{
    public function create($filename)
    {
        $reader = $this->_createReader($filename);
        return $reader;
    }

    private function _createReader($filename)
    {
        If ($this->_isLineFile($filename)) {
            $r = new LineTextReader($filename);
            return $r;
        } else {
            die('This file is not supported : ' . $filename);
        }
    }

    private function _isLineFile($filename)
    {
        return stripos($filename, '_Line.txt');
    }
}
