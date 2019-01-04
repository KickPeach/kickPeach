<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/1/2
 * Time: 19:44
 */

namespace App\Exceptions;

use Kickpeach\Framework\Foundation\Exceptions\HttpException;
use Kickpeach\Framework\Foundation\Exceptions\Handler as ExceptionsHandler;
use App\Helpers\Log;

class Handler extends ExceptionsHandler
{
    protected $debug;

    public function __construct($debug =false,$collapseDir = '', $cfVersion = 'KickPeach/1.0')
    {
        $this->debug = $debug;
        parent::__construct($collapseDir, $cfVersion);
    }

    /**
     * 错误的日志记录
     */
    protected function report($e)
    {
        $content = $this->getLogOfException($e);

        Log::error($content);
    }

    /**
     * @param $e
     * 渲染错误页面
     */
    protected function renderWebException($e)
    {
        if ($this->debug){
            parent::renderWebException($e);
        }else{
            $this->renderError($e);
        }
    }

    protected function renderError($e)
    {
        $statusCode = 500;
        if ($e instanceof HttpException){
            $statusCode = $e->getStatusCode();
        }

        if (!headers_sent()){
            header("HTTP/1.0 {$statusCode} " . 'Internal Server Error');
        }
        echo <<<EOF
<style type="text/css">
*{ padding: 0; margin: 0; }
body{padding: 24px 48px; background: #fff; font-family: "微软雅黑"; color: #333;}
h1{ font-size: 90px; font-weight: normal;}
p{ line-height: 1.8em; font-size: 24px }
</style>
<h1>:(</h1>
<p>哦豁，服务器开小差了.</p>
EOF;
    }


}