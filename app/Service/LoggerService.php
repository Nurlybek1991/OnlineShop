<?php

namespace Service;

class LoggerService
{
    public function error($exception): false|int
    {
        $file = './../Storage/error.txt';
        $data = date('d.m.Y h:i:s');
        $message = $exception->getMessage() . '. Внимание на строку ' . $exception->getLine() . ' в файле ' . $exception->getFile();

        return file_put_contents($file, $data . "\n" . $message . ";\n", FILE_APPEND);
    }

}