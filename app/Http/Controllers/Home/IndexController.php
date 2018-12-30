<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //视图
    public function index(){
        //载入视图
        return view ("home.index.index");
    }

    //接收http请求内容
    public function post(Request $request){
        dump($request->all());//获取所有的表单数据
        dump($request->input('username'));
        /*接收指定参数  dump($request->email)
         isMethod('post') 请求方式是否是post   method 判断请求方式
        url()   path()获取uri
        server()获取当前服务器信息  $_SERVER超全局
        */
        dump($request->getHttpHost());  //获取域名
    }
    //响应内容
    public function response(Response $response){
        $data['userList'] = [
            ['id'=>1,'username'=>'小明1','sex'=>'男','age'=>18],
            ['id'=>2,'username'=>'小明2','sex'=>'男','age'=>18],
            ['id'=>3,'username'=>'小明3','sex'=>'男','age'=>18],
            ['id'=>4,'username'=>'小明4','sex'=>'男','age'=>18],
        ];
        return $response->setContent($data);
        // return $data 
    }
    // XML格式数据
    public function response1(Response $response){
        //组装一个xml格式的数据
        $xml =
        '<xml version="1.0" encoding="UTF-8">
            <book>
                <bookname name="锤子" price="13" authr="大锤"></bookname>
                <bookname name="代码艺术" price="15" authr="大锤"></bookname>
                <bookname name="查询艺术" price="19" authr="大锤"></bookname>
            </book>
        </xml>';
       return $response->setContent($xml)->header("Content-type","text/xml");
       
    }

    //Redirect::to(path, status, headers, secure)  Redirector
    public function redirect(Redirector $redirect){

    }

    public function setcookie(Request $response){
        // old表单获取一次性的session数据，设置flash（键值）；
        
    }
}
