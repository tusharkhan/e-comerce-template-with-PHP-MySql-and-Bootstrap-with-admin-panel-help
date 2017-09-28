<?php
/**
 * All Category Product
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/25/2017
 * Time: 5:59 PM
 */
?>

<?php
    $filePath = realpath(dirname(__FILE__));
    include_once $filePath.'/../lib/Database.php';
    include_once $filePath.'/../helpers/Formate.php';

    class AllCategory
    {
        private $db;
        private $fm;
        public $address = "1234k Avenue, 4th block, <span>New York City.</span>";
        public $email = "info@example.com";
        public $phone = "+1234 567 567";
        public $websiteName = "Electronic Store";
        public $title = "Your stores. Your place.";

        /**
         * AllCategory constructor.
         */
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Formate();
        }


        /**
         * @return bool
         */
        public function loadAllProduct()
        {
            return $this->db->select("SELECT * FROM ecom_product ORDER BY proid DESC ");
        }


        /**
         * @param $id
         * @param $name
         * @param $email
         * @param $message
         * @param $review
         * @param $proid
         * @param $phone
         */
        public function inseertProductReviewByCustomerId($id, $name, $email, $message, $review, $proid, $phone)
        {
            $name    = $this->fm->validation($name);
            $email   = $this->fm->validation($email);
            $message = $this->fm->validation($message);
            $review  = $this->fm->validation($review);
            $phone   = $this->fm->validation($phone);

            $name    = mysqli_real_escape_string($this->db->link, $name);
            $email   = mysqli_real_escape_string($this->db->link, $email);
            $message = mysqli_real_escape_string($this->db->link, $message);
            $review  = mysqli_real_escape_string($this->db->link, $review);
            $phone   = mysqli_real_escape_string($this->db->link, $phone);


            if (empty($name) || empty($email) || empty($message) || empty($review) || empty($phone) )
            {
                echo "<div class='alert alert-warning alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> Fields Should not be Empty.
                      </div>";
            }
            else
            {
                $date = date('y-m-d');
                $this->db->insert("INSERT INTO ecom_product_review(cmrid, proid, name, email, phone, review, rate, date) VALUES ('$id', '$proid','$name', '$email', '$phone', '$message', '$review', '$date')");

                echo "<div class='alert alert-warning alert-dismissable'>
                         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Success! </strong> Review Added.";
                echo "</div>";

            }
        }

        /**
         * @param $name
         * @param $title
         * @param $email
         * @param $address
         * @param $phone
         */
        public function insertWebsiteInfo($name, $title, $email, $address, $phone)
        {
            $name    = $this->fm->validation($name);
            $title   = $this->fm->validation($title);
            $email   = $this->fm->validation($email);
            $address = $this->fm->validation($address);
            $phone   = $this->fm->validation($phone);

            $name    = mysqli_real_escape_string($this->db->link, $name);
            $title   = mysqli_real_escape_string($this->db->link, $title);
            $email   = mysqli_real_escape_string($this->db->link, $email);
            $address = mysqli_real_escape_string($this->db->link, $address);
            $phone   = mysqli_real_escape_string($this->db->link, $phone);


            if (!empty($name))
            {
                $this->websiteName = $name;
            }

            if (!empty($title))
            {
                $this->title = $title;
            }

            if (!empty($email))
            {
                $this->email = $email;
            }

            if (!empty($address))
            {
                $this->address = $address;
            }

            if (!empty($phone))
            {
                $this->phone = $phone;
            }

            echo "<div class='alert alert-success alert-dismissable'>
                     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                     <strong>Success! </strong> Website Updated.";
            echo "</div>";
        }

        public function websiteInformation()
        {
            return $res =  $this->db->select("SELECT * FROM ecom_website ORDER BY id");
        }


        /**
         * @param $name
         * @param $link
         * @param $icon
         */
        public function insertSocialIcon($name, $link, $icon)
        {
            if (empty($name) || empty($link) || empty($icon))
            {
                echo "<div class='alert alert-warning alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> Fields Should not be Empty.
                      </div>";
            }
            else
            {
                $result = $this->db->insert("INSERT INTO ecom_social_media(name, link, icon) VALUES ('$name', '$link', '$icon')");
                if ($result)
                {
                    echo "<div class='alert alert-success alert-dismissable'>
                     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                     <strong>Success! </strong> Social Link Added.";
                    echo "</div>";
                }
            }
        }

        /**
         * @return bool
         */
        public function allSocialMediaLinks()
        {
            return $this->db->select("SELECT * FROM ecom_social_media ORDER BY id");
        }
    }//Main Class
?>