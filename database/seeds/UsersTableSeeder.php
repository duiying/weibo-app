<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // times()指定要创建的模型数量，make()方法为模型创建一个集合
        $users = factory(User::class)->times(50)->make();
        // insert()用于批量插入，makeVisible()用于临时显示User模型指定的隐藏属性$hidden
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        // 更新id为1的用户
        $user = User::find(1);
        $user->name = 'wangyaxian';
        $user->email = 'wangyaxiandev@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
