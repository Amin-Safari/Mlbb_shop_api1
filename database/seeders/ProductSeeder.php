<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // ایجاد 20 محصول معمولی
        Product::factory()->count(15)->create();

        // ایجاد 5 محصول محبوب
        Product::factory()->count(5)->popular()->create();

        // ایجاد محصولات با تخفیف بالا
        Product::factory()->count(3)->popular()->withHighDiscount()->create();

        // ایجاد محصولات گران قیمت
        Product::factory()->count(2)->expensive()->create();

        // ایجاد محصولات ارزان قیمت
        Product::factory()->count(2)->cheap()->create();
    }
}
