<?php

require_once __DIR__ . "/AnalyzerInterface.php";

class SimpleTextAnalyzer implements AnalyzerInterface
{
    /**
     * Source data
     *
     * @access private
     */
    private $data;

    /**
     * @param string data
     * @throws Exception
     */
    public function __construct($data)
    {
        if (!$data) {
            throw new RuntimeException('file ' . $filename . ' not found.');
        }
        $this->data = $data;
    }

    public function analyze()
    {
        $url = "http://jlp.yahooapis.jp/MAService/V1/parse?appid=".APPID."&results=ma";
        $url .= "&sentence=".urlencode($this->data);
        $xml  = simplexml_load_file($url);
        foreach ($xml->ma_result->word_list->word as $cur){
            echo htmlspecialchars($cur->surface)." | ";
            echo htmlspecialchars($cur->pos)." | ";
        }
    }
}
