<?php

namespace app\controller;

use app\core\Controller;

/**
 * Class SiteController.
 * 
 */

 class SiteController extends Controller
 {
    public function contactHandle()
    {
        return 'hadelling submitted data';
    }

    /**
     * Default contact page handler.
     *
     *
     * @return string
     **/
    public function contact( )
    {
        return $this->render('contact');
    }

    /**
     * Default contact page handler.
     *
     *
     * @return string
     **/
    public function home( )
    {
        $params= [
            'name'=>'The Ishwor khadka'
        ];
        return $this->render('home', $params);
    }
 }