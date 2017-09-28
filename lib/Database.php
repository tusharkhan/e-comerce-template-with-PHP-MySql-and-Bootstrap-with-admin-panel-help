<?php
/** Database Connection Class
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/8/2017
 * Time: 6:54 AM
 */
?>
<?php
    $filePath = realpath(dirname(__FILE__));
    include $filePath.'/../config/config.php';
    class Database
    {
        private $host   = DB_HOST;
        private $user   = DB_USER;
        private $pass   = DB_PASS;
        private $dbname = DB_NAME;

        public $link;
        public $error;

        /**
         * Database constructor.
         */
        public function __construct()
        {
            $this->connectDB();
        }

        /**
         * @return bool
         */
        private function connectDB()
        {
            $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
            if(!$this->link)
            {
                $this->error ="Connection fail".$this->link->connect_error;
                return false;
            }
        }


        /**
         * @param $query
         * @return bool
         */
        public function select($query){
            $result = $this->link->query($query) or die($this->link->error.__LINE__);
            if($result->num_rows > 0)
            {
                return $result;
            }
            else
            {
                return false;
            }
        }


        /**
         * @param $query
         * @return bool
         */
        public function insert($query)
        {
            $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
            if($insert_row)
            {
                return $insert_row;
            }
            else
            {
                return false;
            }
        }


        /**
         * @param $query
         * @return bool
         */
        public function update($query){
            $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
            if($update_row)
            {
                return $update_row;
            }
            else
            {
                return false;
            }
        }


        /**
         * @param $query
         * @return bool
         */
        public function delete($query)
        {
            $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
            if($delete_row)
            {
                return $delete_row;
            }
            else
            {
                return false;
            }
        }
    }//Main Class
?>