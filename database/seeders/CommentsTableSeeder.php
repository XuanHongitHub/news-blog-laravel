<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use Carbon\Carbon;
use DB;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('vi_VN');
        $newsIds = DB::table('news')->pluck('id')->toArray(); // Lấy danh sách ID hợp lệ từ bảng news
        $userIds = DB::table('users')->pluck('id')->toArray(); // Chuyển Collection thành mảng

        // Vòng lặp để tạo 100 bình luận
        for ($i = 0; $i < 100; $i++) {
            DB::table('comments')->insert([
                'comment_content' => $faker->text(255),
                'news_id' => $newsIds[array_rand($newsIds)],
                'comment_status' => rand(0, 1),
                'user_id' => $userIds[array_rand($userIds)],
                'parent_id' => rand(0, 10) > 8 ? rand(1, 100) : null,
                'created_at' => Carbon::now()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ]);
        }
    }
}
