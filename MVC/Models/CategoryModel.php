<?php
    class CategoryModel extends BaseModel{
        const TABLE = 'typeofproduct';
        public function getAll($select = ['*']){
         return $this->all(self::TABLE,$select);
        }
        public function findById($id){
            return $this->findCategory(self::TABLE,$id);
        }
        public function store($data){
            $this->create(self::TABLE,$data);
        }
        public function updateData($id,$data){
            $this->update(self::TABLE,$id,$data);
        }
        public function destroy($id){
            $this->delete(self::TABLE,$id);
        }
    }
?>