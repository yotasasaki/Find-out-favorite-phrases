# Summary

This tool analyze plain text and rank phrases in descending order, using YAHOO Morphological Analysis API.

(But now, it works for only LINE talk text log.)

Refs: http://developer.yahoo.co.jp/webapi/jlp/ma/v1/parse.html

# Usage

Put LINE talk text log at root dir as a  `data_Line.txt`

Refs: http://www.ipodwave.com/app/line_talk_history.htm

Put `config.php` and write APPID, SECRET.

```
 <?php
  
  define('APPID','****');
  define('SECRET','****');
``` 

Run
`$ php app.php`
