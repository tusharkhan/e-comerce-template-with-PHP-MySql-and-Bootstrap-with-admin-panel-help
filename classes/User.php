<?php
/**
 * User Class
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/12/2017
 * Time: 2:00 AM
 */
?>
<?php
    $filePath = realpath(dirname(__FILE__));
    include_once $filePath.'/../lib/Database.php';
    include_once $filePath.'/../helpers/Formate.php';
    class User
    {
        private $db;
        private $fm;

        /**
         * Cart constructor.
         */
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Formate();
        }

        /**
         * @param $name
         * @param $email
         * @param $phone
         * @param $pass
         * @param $rePass
         */
        public function registerUser($name, $email, $phone, $pass, $rePass)
        {
            $name   = $this->fm->validation($name);
            $email  = $this->fm->validation($email);
            $phone  = $this->fm->validation($phone);
            $pass   = $this->fm->validation($pass);
            $rePass = $this->fm->validation($rePass);

            $name   = mysqli_real_escape_string($this->db->link, $name);
            $email  = mysqli_real_escape_string($this->db->link, $email);
            $phone  = mysqli_real_escape_string($this->db->link, $phone);
            $pass   = mysqli_real_escape_string($this->db->link, $pass);
            $rePass = mysqli_real_escape_string($this->db->link, $rePass);

            $date = date('y-m-d');

            if (empty($name) || empty($email) || empty($phone) || empty($pass) || empty($rePass) )
            {
                echo "<div class='alert alert-danger alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> Fields Should not be Empty.
                      </div>";
            }
            else
            {
                if (!empty($pass) && !empty($rePass))
                {
                    if (strcmp(md5($pass), md5($rePass)) != 0)
                    {
                        echo "<div class='alert alert-danger alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> Password did not Matched.
                      </div>";
                    }
                    else
                    {
                        $mailCheck = $this->db->select("SELECT * FROM ecom_customer WHERE email = '$email' ");

                        if ($mailCheck != false)
                        {
                            echo "<div class='alert alert-danger alert-dismissable'>
                                      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                      <strong>Warning !</strong> E-mail Already Exist.
                                  </div>";
                        }
                        else
                        {
                            $pass   = md5($pass);

                            $this->db->insert("INSERT INTO ecom_customer( name,  email,  image,  pass,  date, phone) VALUES ('$name', '$email', 'NULL','$pass', '$date', '$phone')");
                        }
                    }
                }
            }//Main Else
        }

        /**
         * @param $email
         * @param $pass
         */
        public function loginUser($email, $pass)
        {
            $email = $this->fm->validation($email);
            $pass  = md5($this->fm->validation($pass));

            $email = mysqli_real_escape_string($this->db->link, $email);
            $pass  = mysqli_real_escape_string($this->db->link, $pass);

            if (empty($email)  || empty($pass))
            {
                echo "<div class='alert alert-danger alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> Fields Should not be Empty.
                      </div>";
            }
            else
            {
                $result = $this->db->select("SELECT * FROM ecom_customer WHERE email = '$email' AND pass = '$pass' ");

                if ($result != false)
                {
                    $value = $result->fetch_assoc();
                    Session::set("userLogin", true);
                    Session::set("userId", $value['userid']);
                    Session::set("userEmail", $value['email']);
                    echo "<script>window.location = 'profile.php'</script>";
                }
                else
                {
                    echo "<div class='alert alert-danger alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> Password or E-mail did not Matched.
                      </div>";
                }
            }
        }

        /**
         * @param $id
         * @return bool
         */
        public function userInfoById($id)
        {
            return $this->db->select("SELECT * FROM ecom_customer WHERE userid = '$id' ");
        }

        public function updateUserInfoById($id, $data, $image)
        {
            $name    = $this->fm->validation($data['name']);
            $email   = $this->fm->validation($data['email']);
            $zip     = $this->fm->validation($data['zip']);
            $phone   = $this->fm->validation($data['phone']);
            $country = $this->fm->validation($data['country']);
            $city    = $this->fm->validation($data['city']);

            $name    = mysqli_real_escape_string($this->db->link, $name);
            $email   = mysqli_real_escape_string($this->db->link, $email);
            $zip     = mysqli_real_escape_string($this->db->link, $zip);
            $phone   = mysqli_real_escape_string($this->db->link, $phone);
            $country = mysqli_real_escape_string($this->db->link, $country);
            $city    = mysqli_real_escape_string($this->db->link, $city);

            if (empty($name) || empty($email) || empty($zip) || empty($phone) || empty($country) || empty($city) )
            {
                echo "<div class='alert alert-danger alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> Filds Must not be Empty.
                      </div>";
            }
            else
            {
                //Name
                if (!empty($name))
                {
                    $this->db->update("UPDATE ecom_customer SET name = '$name' WHERE userid = '$id' ");
                }

                //Email
                if (!empty($email))
                {
                    $this->db->update("UPDATE ecom_customer SET email = '$email' WHERE userid = '$id' ");
                }

                //Zip
                if (!empty($zip))
                {
                    $this->db->update("UPDATE ecom_customer SET zip = '$zip' WHERE userid = '$id' ");
                }

                //Phone
                if (!empty($phone))
                {
                    $this->db->update("UPDATE ecom_customer SET phone = '$phone' WHERE userid = '$id' ");
                }

                //Country
                if (!empty($country))
                {
                    $this->db->update("UPDATE ecom_customer SET country = '$country' WHERE userid = '$id' ");
                }

                //City
                if(!empty($city))
                {
                    $this->db->update("UPDATE ecom_customer SET city = '$city' WHERE userid = '$id' ");
                }

                //Image
                if (!empty($image))
                {
                    $file_name = $image['image']['name'];
                    $file_temp = $image['image']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "uploads/".$unique_image;

                    move_uploaded_file($file_temp, $uploaded_image);

                    $this->db->update("UPDATE ecom_customer SET image = '$uploaded_image' WHERE userid = '$id' ");
                }
            }
            echo "<div class='alert alert-info alert-dismissable'>
                         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Success! </strong> Update successfully.";
            echo "</div>";
        }
    }
?>