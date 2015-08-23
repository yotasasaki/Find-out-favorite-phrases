<?php

require_once __DIR__ . "/ReaderFactory.php";

class App
{
    public $filename;

    public function __construct()
    {
        $this->filename = "data_Line.txt";
    }

    public function run()
    {
        $data = $this->_getData();
        $this->_analyze($data);
    }

    private function _getFilename()
    {
        return $this->filename;
    }

    private function _getData()
    {
        $factory = new ReaderFactory();
        $data = $factory->create($this->_getFilename());

        return $data->getConvertedData();

    }

    private function _analyze($data)
    {
        var_dump($data);
    }
}

$app = new App();
$app->run(); 
