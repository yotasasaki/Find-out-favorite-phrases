<?php

require_once __DIR__ . "/ReaderInterface.php";

class LineTextReader implements Reader
{
    /**
     * File name
     *
     * @access private
     */
    private $filename;

    /**
     * @param strin File name
     * @throws Exception
     */
    public function __construct($filename)
    {
        if (!is_readable($filename)) {
            throw new RuntimeException('file ' . $filename . ' not found.');
        }
        //$this->fimename = $filename;
        $this->filename = 'data_Line.txt';

        $this->_read();

    }

    private function _read()
    {
        $this->data = file_get_contents($this->filename);
    }

    public function getConvertedData()
    {
        $patterns = array(
            '/\d{2}:\d{2}.*friendsname/',
            '/\d{2}:\d{2}.*myname/',
            '/20\d{2}\/\d{2}\/\d{2}\(.*\)/',
            '/\(.*\)/',
            '/\[.*\]/'
        );

        $replacements = array(
            '',
            '',
            '',
            '',
            '',
        );

        $data = preg_replace($patterns, $replacements, $this->data);

        return $data;
    }
}
