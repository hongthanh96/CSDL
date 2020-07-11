<?php
    class Database{
        const USERNAME = 'root';
        const PASSWORD = 'hongthanh24486644';
        const DSN = 'mysql:host=localhost;dbname=case_study';
        protected $connect;
        public function connect(){
           $this->connect  = new PDO(self::DSN,self::USERNAME,self::PASSWORD);
           return $this->connect;
        }
    }
?>