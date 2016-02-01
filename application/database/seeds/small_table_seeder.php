<?php

class small_table_seeder extends Seeder
{
    public function run()
    {
        $this->addBrand();
        $this->addOriginal();
    }

    function addBrand()
    {
        $this->db->truncate('brands');
        $data = [
            [
                'name' => 'BMW',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name' => 'Mercedes-Benz',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name' => 'Audi',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name' => 'GM',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name' => 'Isuzu',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name' => 'Hyundai',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name' => 'Bentley',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name' => 'Toyota',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name' => 'Mitsubishi',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name' => 'Ford',
                'created_at' => time(),
                'updated_at' => time()
            ]
        ];
        $this->db->insert_batch('brands', $data);
    }

    function addOriginal()
    {
        $this->db->truncate('originals');
        $data = [
            [
                'name'=>'Germany',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name'=>'Finland',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name'=>'Japan',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name'=>'England',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name'=>'China',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name'=>'Vietnam',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name'=>'France',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name'=>'Australia',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name'=>'USA',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name'=>'Korea',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name'=>'Thailand',
                'created_at' => time(),
                'updated_at' => time()
            ],
            [
                'name'=>'Singapore',
                'created_at' => time(),
                'updated_at' => time()
            ]
        ];
        $this->db->insert_batch('originals',$data);
    }
}