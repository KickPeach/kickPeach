<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/11
 * Time: 22:32
 */

namespace App\Helpers;


class Helper
{
    public static function dd(...$vars)
    {
        foreach ($vars as $v) {
            var_dump($v);
        }
        die(1);
    }
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public static function env($key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) {
            return $default;
        }
        switch (strtolower($value)) {
            case 'true':
                return true;
            case 'false':
                return false;
            case 'empty':
                return '';
            case 'null':
                return;
        }
        if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[$valueLength - 1] === '"') {
            return substr($value, 1, -1);
        }
        return $value;
    }

    public static function getAllHeader()
    {
        $headers = [];
        foreach ($_SERVER as $name => $value)
        {
            if (substr($name, 0, 5) == 'HTTP_')
            {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }

    public static function getUserAgent()
    {
        $headers = self::getAllHeader();
        $userAgent = isset($headers['User-Agent']) ? $headers['User-Agent'] : (isset($headers['user-agent']) ? $headers['user-agent'] : '');

        if (empty($userAgent))
        {
            return null;
        }

        $ua = array();
        $ua['browser'] = $userAgent;
        $type = "";
        if (strpos($userAgent, 'MSIE') != false)
        {
            $ua['ua'] = 'IE';
            //$ua['version'] = self::findUserAgentByKey($userAgent, );
            $type = "MSIE";
        }
        else if (strpos($userAgent, 'Gecko/') != false)
        {
            $ua['ua'] = 'firefox';
            $type = 'Firefox/';
        }
        else if (strpos($userAgent, 'AppleWebKit/') != false)
        {
            if (strpos($userAgent, 'Chrome') != false)
            {
                $ua['ua'] = 'chrome';
                $type = 'Chrome/';
            }
            else
            {
                $ua['ua'] = 'safari';
                $type = 'Version/';
            }
        }
        else if (strpos($userAgent, 'Presto/') != false)
        {
            $ua['ua'] = 'opera';
            $type = 'Opera/';
        }
        else if (strpos($userAgent, 'Trident') != false)
        {
            $ua['ua'] = 'IE';
            $type = 'rv:';
        }
        else if (strpos($userAgent, 'MobileSafari') != false)
        {
            $ua['ua'] = 'MobileSafari';
            $type = 'MobileSafari/';
        }
        else
        {
            $ua['ua'] = 'unknown';
        }
        if ($type != '')
        {
            $ua['version'] = self::findUserAgentByKey($userAgent, $type);
        }
        return $ua;
    }

    public static  function findUserAgentByKey($ua, $key)
    {
        $ua .= " ";
        $len = strlen($key);
        $start = strpos($ua, $key);
        $pos = strpos($ua, ' ', $start + $len + 1);
        $version = substr($ua, $start + $len, $pos - $len - $start);
        return str_replace(array(';', ')'), '', $version);
    }

    public static function isAjaxRequest()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest';

    }

    public static function redirect($url)
    {
        header('Location: '.$url);
        exit();
    }

    private static function json($code, $msg, $data = null, $return = false)
    {
        $result = ['code' => $code, 'msg' => $msg, 'now' => date('Y-m-d H:i:s')];

        if ($data !== null)
            $result['data'] = $data;

        $json = json_encode($result);

        if($json === false && json_last_error() != JSON_ERROR_NONE) {
            throw new \Exception(json_last_error_msg());
        }

        if ($return) return $json;

        $ua = \App\Helpers\Helper::getUserAgent();

        if (isset($ua['ua']) && $ua['ua'] == 'IE' && !self::isAjaxRequest())
            header('Content-type: text/plain');
        else
            header('Content-type: application/json');

        echo $json;
        exit();
    }

    public static function success($data, $return = false)
    {
        return self::json(0, 'success', $data, $return);
    }

    public static function fail($code, $msg, $return = false)
    {
        return self::json($code, $msg, null, $return);
    }
}