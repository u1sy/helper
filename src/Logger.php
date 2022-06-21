<?php

namespace lme\helper;

class Logger
{

    /**
     * 格式化输出日志
     * 1、JSON_UNESCAPED_UNICODE（中文不转为unicode，对应的数字256）
     * 2、JSON_UNESCAPED_SLASHES（不转义反斜杠，对应的数字64）
     * 3、JSON_PRETTY_PRINT 用空白字符格式化返回的数据
     * @param $data
     * @param $is_pretty
     * @return void
     */
    public static function Logg($data, $path = '', $file = 'log')
    {
        $date = date('Y-m-d');
        $path = rtrim($path, '/');
        $path = RUNTIME_PATH . "/{$path}";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $path = "{$path}/{$date}_{$file}";

        $ct = '[ ' . date("Y-m-d H:i:s", time()) . ' ]' . ' ' . $_SERVER["REMOTE_ADDR"] . ' ' . $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['REQUEST_URI'];

        if (is_array($data)) {
            $data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
        file_put_contents($path, $ct . PHP_EOL, FILE_APPEND);

        if (is_string($data)) {
            file_put_contents($path, $data . PHP_EOL . PHP_EOL, FILE_APPEND);
        } else {
            file_put_contents($path, var_export($data, true) . PHP_EOL . PHP_EOL, FILE_APPEND);
        }
    }

    /**
     * Log  打印日志
     * @param        $data
     * @param string $path 默认路径
     * @param string $file 文件名字
     */
    public static function Log($data, $path = "", $file = "log")
    {
        $date = date("Y-m-d");
        $path = rtrim($path, '/');
        $path = RUNTIME_PATH . "/{$path}";
        if (!file_exists($path)) {
            $r = mkdir($path, 0777, true);
        }
        $path = "{$path}/{$date}_{$file}";
        $w_data = ["time" => date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']), "data" => $data];
        file_put_contents($path, json_encode($w_data, 256) . PHP_EOL, 8);
    }

}