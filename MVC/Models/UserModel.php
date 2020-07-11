
<?php
    class UserModel extends BaseModel{
        const TABLE = 'users';

        public function getAll($select = ['*']){
         return $this->all(self::TABLE,$select);
        }
        public function findById($id){
            return $this->findProduct(self::TABLE,$id);
        }
        public function getByAdmin($userID){
        $sql = "SELECT * FROM " . self::TABLE . " WHERE isAdmin = ${userID}";
        return $this->PDO($sql);
        }
        
        // public function delete(){
        //     return __METHOD__;
        // }

        public function store($data){
            $this->create(self::TABLE,$data);
        }

        public function updateData($id,$data){
            $this->updateUser(self::TABLE,$id,$data);
        }
        public function destroy($id){
            $this->deleteUser(self::TABLE,$id);
        }
    }
?>