<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    public function up()
    {
        $categories = [
            [
                'name'        => '分享',
                'description' => '分享创造，分享发现',
            ],
            [
                'name'        => '教程',
                'description' => '开发技巧、推荐扩展包等',
            ],
            [
                'name'        => '问答',
                'description' => '请保持友善，互帮互助',
            ],
            [
                'name'        => '公告',
                'description' => '站点公告',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
    //insert into categories(name,description) values('分享','分享创造，分享发现');
//insert into categories(name,description) values('教程','开发技巧、推荐扩展包等');
//insert into categories(name,description) values('问答','请保持友善，互帮互助');
//insert into categories(name,description) values('公告','站点公告');
    public function down()
    {
        DB::table('categories')->truncate();
    }
}