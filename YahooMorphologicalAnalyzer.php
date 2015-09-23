<?php

require_once __DIR__ . "/AnalyzerInterface.php";

class YahooMorphologicalAnalyzer implements AnalyzerInterface
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

    /**
     * @see http://developer.yahoo.co.jp/webapi/jlp/ma/v1/parse.html
     */
    public function analyze()
    {
        //$url = "http://jlp.yahooapis.jp/MAService/V1/parse?appid=".APPID."&results=ma";
        $url = "http://jlp.yahooapis.jp/MAService/V1/parse?appid=".APPID."&results=uniq";
        $url .= "&filter=9";
        $url .= "&sentence=".$this->data;
        $xml  = simplexml_load_file(urlencode($url));
        //foreach ($xml->ma_result->word_list->word as $cur){
        foreach ($xml->uniq_result->word_list->word as $cur){
            echo htmlspecialchars($cur->surface)." | ";
            echo htmlspecialchars($cur->pos)." | ";
            echo htmlspecialchars($cur->count)." | ";
            echo "\r\n";
        }
    }
}
