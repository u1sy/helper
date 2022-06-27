<?php

namespace lme\helper;
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


    /**
     * @param array $array
     * @param int|null $amount
     * @return array|mixed
     */
    public static function random(array $array, int $amount = null)
    {
        if (is_null($amount)) {
            return $array[array_rand($array)];
        }

        $keys = array_rand($array, $amount);

        $results = [];

        foreach ((array) $keys as $key) {
            $results[] = $array[$key];
        }

        return $results;
    }
}