<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//defineI(第一个参数的上引入一个模型类,第二个参数是闭包函数)
$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;
    //Laravel 中默认使用的时间处理类就是 Carbon ;
    //可以同now() 方法获取当前的日期和时间。如果你不指定参数，它会使用 PHP 配置中的时区：
    //toDateTimeString()要想获取字符串类型的日期
    //如:echo Carbon::now()->toDateTimeString(); //2016-10-14 20:22:50
    $now = Carbon::now()->toDateTimeString();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,

        //bcrype跨平台加密工具
        'password' => $password?:$password = bcrypt('password'), // secret
        //随机生产十位数的支字符串
        'remember_token' => str_random(10),

        //sentence() 是 faker 提供的 API ，随机生成『小段落』文本
        'introduction' => $faker->sentence(),
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
