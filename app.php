<?php

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/ReaderFactory.php";
require_once __DIR__ . "/AnalyzerFactory.php";

class App
{
    public $filename;

    public function __construct()
    {
        $this->filename = "data_Line.txt";
    }

    public function run()
    {
        $data = $this->_readData();
        $this->_analyze($data);
    }

    private function _getFilename()
    {
        return $this->filename;
    }

    private function _readData()
    {
        $factory = new ReaderFactory();
        $data = $factory->create($this->_getFilename());
        return $data->getConvertedData();
    }

    private function _analyze($data)
    {
        $factory = new AnalyzerFactory($data);
        $data = $factory->create($data);
        var_dump($data->analyze());
    }
}

$app = new App();
$app->run(); 
