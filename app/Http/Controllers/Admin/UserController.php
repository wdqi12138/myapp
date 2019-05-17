<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\FormRequest;

use App\Model\Admin\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create',[
            'title'=>'后台的用户添加页面'

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
       $this->validate($request, [
            'user_name' => 'required|regex:/^\w{6,12}$/',
            'user_password' => 'required|regex:/^\S{8,16}$/',
            'repass'=>'same:user_password',
            'user_email'=> 'email',
            'user_phone'=>'required|regex:/^1[3456789]\d{9}$/'
            
        ],[
            'user_name.required' => '用户名不能为空',
            'user_name.regex' => '用户名格式不正确',
            'user_name.unique' => '用户名已经存在',
            'user_password.required'=>'密码不能为空',
            'user_password.regex'=>'密码格式不正确',
            // 'repass.required'=>'确认密码不能为空',
            'repass.same'=>'两次密码不一致',
            'user_email.email'=>'邮箱格式不正确',
            'user_phone.required'=>'手机号码不能为空',
            'user_phone.regex'=>'手机号码格式不正确',
        ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
