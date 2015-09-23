<?php

require_once __DIR__ . "/AnalyzerInterface.php";
require_once __DIR__ . "/YahooMorphologicalAnalyzer.php";

class AnalyzerFactory
{
    public function create($data)
    {
        $analyzer = $this->_createAnalyzer($data);
        return $analyzer;
    }

    private function _createAnalyzer($data)
    {
        if ($data) {
            $d = new YahooMorphologicalAnalyzer($data);
            return $d;
        } else {
            die('Empty data.');
        }
    }
}
