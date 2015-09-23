<?php

require_once __DIR__ . "/ReaderInterface.php";

class LineTextReader implements ReaderInterface
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
            '/\d{2}\:\d{2}/',
            '/frinendname/',
            '/myname/',
            '/20\d{2}\/\d{2}\/\d{2}\(.*\)/',
            '/\(.*\)/',
            '/\[.*\]/',
            '/\"/',
            '/\d/'
        );

        $replacements = array(
            '',
            '',
            '',
            '',
            '',
            '',
            '',
        );

        $data = preg_replace($patterns, $replacements, $this->data);
echo $data;
        return $data;
    }
}
