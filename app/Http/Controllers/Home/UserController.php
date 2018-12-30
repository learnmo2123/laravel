<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    //添加数据
    public function insert(){
    	$data = [
    		'username'=>'test',
    		'password'=>md5('123'),  //加密之后的数据字段会很长，注意mysql的字段
    		'age'=>13,
    		'nickname'=>'learnmo',
    		'sex'=>0
    	];
    	$sql = "insert into user(username,password,age,nickname,sex) values(:username,:password,:age,:nickname,:sex)";
    	$status = DB::insert($sql,$data);
    	dump($status);  //true
    }
    //查询数据
    public function select(){
    	$sql = "select *from user";
    	$data = DB::select($sql);
    	dump($data);
    }
    //修改数据
    public function update(){
        $data = [
            'id'=>1,
            'nickname'=>'程愫'
        ];
        $sql = "update user set nickname=:nickname where id=:id";
        $status = DB::update($sql,$data);
        dump($status);  // 1
    }
    //删除数据
    public function delete(){
        $data = [
            'id'=>1
        ];
        $sql = "delete from user where id=:id";
        $status = DB::delete($sql,$data);
        dump($status);
    }
    //以上DB操作都是采用 PHP的PDO预处理技术操作数据库

    /*使用DB构造器执行数据库操作*/
    //单条数据添加  dbInserGetId
    public function dbInsertGetId(){
        $data = [
            'username'=>'admin',
            'password' =>md5('123'),  
            'age'=>16,
            'nickname'=>'LEARNMO',
            'sex'=>1
        ];
        $res = DB::table('user')->insertGetId($data);//添加单条数据
        dd($res);  //2  返回的是插入数据库的id
    }
    //批量添加数据
    public function dbInsert(){
        $data = [
            ['username'=>'admin',
            'password'=>md5('123'),  
            'age'=>16,
            'nickname'=>'LEARNMO1',
            'sex'=>1],
            ['username'=>'admin2',
            'password'=>md5('123'),  
            'age'=>14,
            'nickname'=>'LEARNMO2',
            'sex'=>1],
            ['username'=>'admin3',
            'password'=>md5('123'),  
            'age'=>15,
            'nickname'=>'LEARNMO3',
            'sex'=>0]
        ];
        $res = DB::table('user')->insert($data);
        dd($res);// true
    }

    //构造器查询操作
    public  function dbselect(){
        $data = DB::table('user')->get();
        dump($data);
    }

    //查询一条数据
    public function dbSelectOne(){
        $data = DB::table('user')->first();  //默认查询表中的第一条数据
        dump($data);
    }

    //根据id查询数据
    public function dbSelectById(){
        $data = DB::table('user')->where('id',5)->first();
        dump($data);
    }

    //查询出指定列的数据
    public function dbSelectColumns(){
        $data = DB::table('user')->select('username','nickname','age')->get();
        dump($data);
    }

    //更新数据
    public function dbUpdate(){
        $data = [
            'nickname'=>'李时珍',
            'age'=>23
        ];
        $res = DB::table('user')->where('id',5)->update($data);  //where(等号可以省略)
        dump($res); //   1
    }

    //删除数据
    public function dbDelete(){
        $res = DB::table('user')->delete(4);
        dump($res);  //   1   
    }

    //联表查询 join   内连接 inner join
    public function dbJoin(){
        $data = DB::table('user')
            ->join('user as u','u.id','=','user.id')
            ->where('user.id',3)
            ->select('user.*','u.password','u.nickname')
            ->get();
        dump($data); //重复字段不显示
    }
}
