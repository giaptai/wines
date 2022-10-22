<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Category::factory()->count(3)->create();
        Category::factory()->create(
            [
                'name' => 'Vang đỏ',
                'description'=>'Rượu vang đỏ hay còn gọi là vang đỏ hay rượu nho đỏ là một dạng phổ biến của rượu vang được làm từ những loại nho đậm màu. 
                Vang đỏ thường có màu đậm pha trộn giữa màu đỏ, đen và tím. 
                Quá trình làm rượu vang đỏ thì vỏ nho cũng được nghiền nát cùng với ruột để tạo ra nước ép rồi lên men thành rượu.',
            ]
        );
        Category::factory()->create(
            [
                'name' => 'Vang trắng',
                'description'=> 'Rượu vang trắng có màu nhạt hơn nó được gọi là màu trắng nhưng không hoàn toàn là màu trắng mà còn có màu vàng, vàng rơm, v.v.. vì màu sắc của rượu trắng phụ thuộc vào màu của vỏ nho.',
            ]
        );
        Category::factory()->create(
            [
                'name' => 'Vang ngọt',
                'description'=> 'Vang ngọt là từ dùng để chỉ rượu vang có chứa lượng đường trong khoảng từ 45g/L hoặc hơn. Rượu vang ngọt cũng là loại rượu vang trái ngược với vang dry (vang không ngọt). Nồng độ cồn trung bình của vang ngọt là vào khoảng từ 15% đến 22%.',
            ]
        );
    }
}
