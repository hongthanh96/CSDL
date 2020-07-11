
<?php
    class ProductModel extends BaseModel{
        const TABLE = 'products';
        public function getAll($select = ['*']){
         return $this->all(self::TABLE,$select);
        }
        public function findById($id){
            return $this->findProduct(self::TABLE,$id);
        }
        public function getByCategoryID($categoryId){
        $sql = "SELECT * FROM " . self::TABLE . " WHERE typeofproduct_type_ID = ${categoryId}";
        return $this->PDO($sql);
        }

        public function getHot($id){
        $sql = "SELECT * FROM " . self::TABLE . " WHERE isHot = ${id}";
        return $this->PDO($sql);
        }

        public function getNew($id){
            $sql = "SELECT * FROM " . self::TABLE . " WHERE isNew = ${id}";
            return $this->PDO($sql);
            }
        
        // public function delete(){
        //     return __METHOD__;
        // }

        public function search($name){
        $sql = "SELECT * FROM " . self::TABLE . " WHERE name LIKE '${name}'";

            return $this->PDO($sql);
        }
        public function store($data){
            $this->create(self::TABLE,$data);
        }

        public function updateData($id,$data){
            $this->updateProduct(self::TABLE,$id,$data);
        }

        public function destroy($id){
            $this->deleteProduct(self::TABLE,$id);
        }
    }
?>