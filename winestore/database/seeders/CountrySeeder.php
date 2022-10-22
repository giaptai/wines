<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Country::factory()->count(3)->create();
        Country::factory()->create(
            [
                'name'=>'Pháp',
                'description'=>'Rượu vang là loại đồ uống có cồn phổ biến tại Pháp, nghề trồng nho và làm rượu vang cũng là một phần quan trọng của nền nông nghiệp Pháp. 
                Với nhiều nhãn hiệu rượu vang nổi tiếng, Pháp là nước giữ thị phần nhiều nhất trong lĩnh vực xuất khẩu rượu vang trên thế giới và tạo nên thương hiệu truyền thống trứ danh.',
            ]
        );
        Country::factory()->create(
            [
                'name'=>'Ý',
                'description'=>'Nước Ý nổi tiếng với đa dạng chủng loại rượu vang trắng, đỏ, hồng và vang sủi. Hãy cùng khám phá rượu vang Ý từ nhiều thương hiệu uy tín, nhiều vùng sản xuất nổi tiếng, nhiều lựa chọn từ vang bình dân đến vang cao cấp đắt tiền.',
            ]
        );
        Country::factory()->create(
            [
                'name'=>'Chile',
                'description'=>'Rượu vang Chile khởi đầu muộn hơn so với các quốc gia khác, nhưng quốc gia Nam Mỹ này đã tạo nên những thành công vang dội, trở thành nước top đầu trong lĩnh vực xuất khẩu vang, với những hương vị được thế giới ca tụng.
                Đến nay, Chile đứng thứ 7 thế giới về sản lượng rượu vang và thứ 5 thế giới về xuất khẩu rượu vang; có khoảng 250 nhà máy sản xuất và xuất khẩu',
            ]
        );
    }
}
