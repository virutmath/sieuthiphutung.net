<?php
class Categories_Seeder extends Seeder {
    public function run() {
        $this->db->truncate('categories');
        
        $listCat = file_get_contents('http://localhost:8035/tests/categories.txt');
        $listCat = json_decode($listCat,1);

        foreach($listCat as $catP) {
            $data = [
                'name'=>$catP['name'],
                'parent_id'=>0,
                'active'=>1,
                'has_child'=>1,
                'title'=>$catP['name'],
                'created_at'=>time(),
                'updated_at'=>time()
            ];
            $this->db->insert('categories',$data);
            $last_id = $this->db->insert_id();
            $child = [];
            foreach($catP['child'] as $item) {
                $child[] = [
                    'name'=>$item,
                    'parent_id'=>$last_id,
                    'has_child'=>0,
                    'active'=>1,
                    'title'=>$item,
                    'created_at'=>time(),
                    'updated_at'=>time()
                ];
            }
            $this->db->insert_batch('categories',$child);
        }
    }
}