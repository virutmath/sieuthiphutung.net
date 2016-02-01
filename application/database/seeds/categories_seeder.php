<?php
class Categories_Seeder extends Seeder {
    public function run() {
        $this->db->truncate('categories');
        $data = [
            'name'=>'Hệ thống gầm - Hệ thống phanh',
            'parent_id'=>0,
            'active'=>1,
            'title'=>'gầm phanh',
            'created_at'=>time(),
            'updated_at'=>time()
        ];
        $this->db->insert('categories',$data);
        $data = [
            'name'=>'Nội thất, chất lỏng, phụ kiện',
            'parent_id'=>0,
            'active'=>1,
            'title'=>'gầm phanh',
            'created_at'=>time(),
            'updated_at'=>time()
        ];
        $this->db->insert('categories',$data);
        $data = [
            'name'=>'Hệ thống điện, điều hòa',
            'parent_id'=>0,
            'active'=>1,
            'title'=>'gầm phanh',
            'created_at'=>time(),
            'updated_at'=>time()
        ];
        $this->db->insert('categories',$data);
        $data = [
            'name'=>'Thân vỏ, gương, đèn kính',
            'parent_id'=>0,
            'active'=>1,
            'title'=>'gầm phanh',
            'created_at'=>time(),
            'updated_at'=>time()
        ];
        $this->db->insert('categories',$data);
        $data = [
            'name'=>'Hệ thống động cơ hộp số',
            'parent_id'=>0,
            'active'=>1,
            'title'=>'gầm phanh',
            'created_at'=>time(),
            'updated_at'=>time()
        ];
        $this->db->insert('categories',$data);
        $data = [
            'name'=>'Hệ thống truyền động, hệ thống lái',
            'parent_id'=>0,
            'active'=>1,
            'title'=>'gầm phanh',
            'created_at'=>time(),
            'updated_at'=>time()
        ];
        $this->db->insert('categories',$data);
        $data = [
            'name'=>'Hệ thống nhiên liệu, làm mát',
            'parent_id'=>0,
            'active'=>1,
            'title'=>'gầm phanh',
            'created_at'=>time(),
            'updated_at'=>time()
        ];
        $this->db->insert('categories',$data);
    }
}