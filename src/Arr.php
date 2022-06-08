<?php

namespace lllw\helper;
class Arr
{
    /** 移除数组中指定键的数据
     * @param $array
     * @param $keys
     * @return array
     */
    static function removeKey(&$array, $keys)
    {

        if (!is_array($keys)) {
            $keys = array(
                $keys
            );
        }
        return array_diff_key($array, array_flip($keys));
    }
}