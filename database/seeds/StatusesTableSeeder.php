<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 只为1、2、3用户生成微博数据
        $userIds = [1, 2, 3];
        // Faker实例
        $faker = app(Faker\Generator::class);

        $statuses = factory(Status::class)->times(100)->make()->each(function ($status) use ($faker, $userIds) {
            // randomElement取出用户ID数组中任意一个元素
            $status->user_id = $faker->randomElement($userIds);
        });
        Status::insert($statuses->toArray());
    }
}
