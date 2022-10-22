<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Brand::factory()->count(3)->create();

        Brand::factory()->create(
            [
                'name' => 'Gruaud-Larose',
                'description' => 'Dòng vang Pháp này mang trong mình truyền thống sản xuất rượu vang lâu đời kéo dài hơn 300 năm.
                                Là thương hiệu bậc thầy pha trộn loại rượu vang đỏ ruby, Château Gruaud-Larose được mệnh danh là “rượu của các vị vua và vua của các loại rượu”.',
            ],
        );
        Brand::factory()->create(
            [
                'name' => 'Hennessy',
                'description' => 'Được thành lập năm 1975 tại Cognac - Pháp, Hennessy hay Jas Hennessy là công ty sản xuất và kinh doanh rượu, với lịch sử hoạt động lâu đời với lượng tiêu thụ mỗi năm tầm khoảng 50 triệu chai rượu trên toàn thế giới.
                                Rượu Hennessy hay còn được gọi là rượu Cognac vì được sản xuất tại thành phố Cognac của vùng Charentes, Pháp, đây cũng là loại rượu nặng được chế biến từ nho với nhiều niên hạn và cách thức pha trộn khác nhau.',
            ],
        );
        Brand::factory()->create(
            [
                'name' => 'Concha Y Toro',
                'description' => 'Concha y Toro được biết đến như nhà sản xuất và xuất khẩu rượu vang nổi tiếng nhất châu Mỹ Latinh và là một trong 10 công ty thương hiệu rượu vang nổi tiếng lớn nhất thế giới. Sản lượng  bán ra mỗi năm của thương hiệu vang Chile này hơn 33 triệu thùng và phân phối trên 135 quốc gia.',
            ],
        );
    }
}
