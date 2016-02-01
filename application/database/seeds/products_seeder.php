<?php

/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 1/25/2016
 * Time: 8:29 PM
 */
class Products_Seeder extends Seeder
{
    public function run() {
        $this->db->truncate('products');
        $data = [];
        $product_fake = json_decode(file_get_contents(__DIR__.'/products.txt'),1);
        $array_note = [
            'Sản phẩm chính hãng cao cấp',
            'Thời gian sử dụng lâu dài',
            'Mang lại hiệu quả kinh tế và sử dụng cao nhất',
            'Nhập khẩu chính hãng',
            'Không bị rò rỉ thấm nứt',
            'Mang lại sự an toàn cao'
        ];
        foreach($product_fake as $product) {
            $product['code'] = uniqid();
            $product['category_id'] = rand(1,30);
            $product['original_id'] = rand(1,10);
            $product['brand_id'] = rand(1,10);
            $note = array_rand($array_note,3);
            $product['note'] = $array_note[$note[0]] . '|' . $array_note[$note[1]] . '|' . $array_note[$note[2]];
            $product['status'] = 1;
            $product['price'] = str_replace(',','',$product['price']);
            $product['description'] = trim(htmlentities($product['description']));
            $product['created_at'] = time();
            $product['updated_at'] = time();
            $data[] = $product;
        }
        //insert
        $this->db->insert_batch('products',$data);
    }
}