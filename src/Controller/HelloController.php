<?php
namespace App\Controller;
 
use App\Controller\AppController;
 
class HelloController extends AppController
{
    public function index()
    {
        $this->autoRender = false;
        echo "<html><head></head><body>";
        echo "<h1>Hello!</h1>";
        echo "<p>これは、サンプルで作成したページです。</p>";
        echo "</body></html>";
    }
}