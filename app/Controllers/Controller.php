<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/1/4
 * Time: 11:20
 */

namespace App\Controllers;
use App\App;
use Kickpeach\Framework\Routing\Controller as BasicController;


abstract class Controller extends BasicController
{
    //所有控制器都可以通过mdc访问服务
    protected $mdc;

    public function __construct(App $app)
    {
        parent::__construct($app);
        $this->mdc = $app->getMdc();
    }

    //模板渲染
    protected function render($tpl,$data=[]){
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../../public/views');
        $twig = new \Twig_Environment($loader,[
            'cache'=>$this->app->config('view.cache'),
            'debug'=>$this->app->config('debug')
        ]);

        return $twig->load($tpl)->render($data);
    }

}