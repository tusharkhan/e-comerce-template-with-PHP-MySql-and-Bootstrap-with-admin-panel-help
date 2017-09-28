<?php
/**
 * Brand Class
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/10/2017
 * Time: 2:52 AM
 */
?>
<?php
$filePath = realpath(dirname(__FILE__));
include_once $filePath.'/../lib/Database.php';
include_once $filePath.'/../helpers/Formate.php';

    class Brand
    {
        private $db;
        private $fm;


        /**
         * Brand constructor.
         */
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Formate();
        }


        /**
         * @param $brand
         */
        public function addBrand($brand)
        {
            if (empty($brand))
            {
                echo "<div class='alert alert-danger alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> Fields Should not be Empty.
                      </div>";
            }
            else
            {
                $brand = $this->fm->validation($brand);
                $brand = mysqli_real_escape_string($this->db->link, $brand);

                $this->db->insert("INSERT INTO ecom_brand(brand) VALUES ('$brand')");

                echo "<div class='alert alert-success alert-dismissable'>
                         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Success! </strong>"; echo $brand; echo " Inserted a successfully.";
                echo "</div>";
            }
        }


        /**
         * @return bool
         */
        public function allBrand()
        {
            return $this->db->select("SELECT * FROM ecom_brand ORDER BY id");
        }


        /**
         * @param $id
         * @return bool
         */
        public function brandById($id)
        {
            return $this->db->select("SELECT * FROM ecom_brand WHERE id = '$id'");
        }


        public function updateBrand($id, $value)
        {
            if (empty($value))
            {
                echo "<div class='alert alert-danger alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> Fields Should not be Empty.
                      </div>";
            }
            else
            {
                $value = $this->fm->validation($value);
                $value = mysqli_real_escape_string($this->db->link, $value);


                $updateQuery = "UPDATE ecom_brand SET brand = '$value' WHERE id = '$id'";
                $this->db->update($updateQuery);
                echo "<div class='alert alert-success alert-dismissable'>
                         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Success! </strong>"; echo $value; echo " Updated successfully.";
                echo "</div>";
            }
        }


        public function deleteBrandById($id)
        {
            $this->db->delete("DELETE FROM ecom_brand WHERE id = '$id'");

            echo "<div class='alert alert-success alert-dismissable'>
                         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Success! </strong> Delete successfully.";
            echo "</div>";
        }
    }//Main Class
?>