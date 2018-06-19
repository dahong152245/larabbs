<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
   public function __construct()
   {
        //除了此处指定的动作以外，所有其他动作都必须登录用户才能访问，类似于黑名单的过滤机制, __construct当创建对象的时候回自动调用该方法
       $this->middleware('auth',['except'=>['show']]);
   }

    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
    public function edit(User $user)
    {
        //authorize 方法，它可以被用于快速授权一个指定的行为，当无权限运行该行为时会抛出 HttpException
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }
    public function update(UserRequest $request,ImageUploadHandler $uploader,User $user)
    {
        $this->authorize('update',$user);
        //我们可直接通过 请求对象（Request） 来获取用户上传的文件 使用的dd的调试方法
        // 第一种方法
       //dd($request->file('avatar'));
        // 第二种方法，可读性更高
        //$file = $request->avatar;
        $data = $request->all();

        if($request->avatar){
            //save第一个参数指的是需要上传的文件信息,第二个文件夹文件名 ,第三个文件的前缀名字
            $result=$uploader->save($request->avatar,'avatar',$user->id,362);
            if($request){
                //将返回的path图片地址存储在avatar
                $data['avatar'] = $result['path'];
            }
        }
        //dump($data)下数据 得到的是包含了存储地址的"avarar=>http://hong.larabbs.com/uploads/images/avatar/201806/19/3_1529383269_cbAkWOBYY1.png"的数组数据

        //开始更新数据
       $user->update($data);
       return redirect()->route('users.show',$user->id)->with('success','个人资料更新成功');
    }
}
