<?php
/**
 * Admin Login Class
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/9/2017
 * Time: 4:45 AM
 */
?>
<?php
    $filePath = realpath(dirname(__FILE__));
    include $filePath.'/../lib/Session.php';
    include_once $filePath.'/../lib/Database.php';
    include_once $filePath.'/../helpers/Formate.php';

    Session::checkAdminLogin();

    class AdminLogin
    {
        private $db;
        private $fm;


        /**
         * AdminLogin constructor.
         */
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Formate();
        }

        public function adminLogin($email, $pass)
        {
            $adminEmail = $this->fm->validation($email);
            $adminPass  = $this->fm->validation($pass);

            $adminEmail = mysqli_real_escape_string($this->db->link, $adminEmail);
            $adminPass  = mysqli_real_escape_string($this->db->link, $adminPass);

            if ( empty($adminEmail) || empty($adminPass) )
            {
                echo "<div class='alert alert-danger alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> Fields Should not be Empty.
                        </div>";
            }
            else
            {
                $query = "SELECT * FROM ecom_admin WHERE adminemail= '$adminEmail' AND adminpass = '$adminPass' ";

                $result = $this->db->select($query);

                if ($result)
                {
                    $value = $result->fetch_assoc();
                    Session::set("login", true);
                    Session::set("adminId", $value['id']);
                    Session::set("adminEmail", $value['adminemail']);
                    Session::set("adminFname", $value['adminfastname']);
                    Session::set("adminImage", $value['level']);
                    header("Loaction: ../admin/index.php");
                }
                else
                {
                    echo "<div class='alert alert-danger alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> E-mail or Password not Matched.
                        </div>";
                }
            }
        }

        /**
         * @param $fName
         * @param $fName
         * @param $email
         * @param $password
         * @param $image
         */
        public function registerAdmin($fName, $lName, $email, $password, $image)
        {
            $fName    = $this->fm->validation($fName);
            $lName    = $this->fm->validation($lName);
            $email    = $this->fm->validation($email);
            $password = $this->fm->validation($password);

            $fName    = mysqli_real_escape_string($this->db->link, $fName);
            $lName    = mysqli_real_escape_string($this->db->link, $lName);
            $email    = mysqli_real_escape_string($this->db->link, $email);
            $password = md5(mysqli_real_escape_string($this->db->link, $password));

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $image['image']['name'];
            $file_size = $image['image']['size'];
            $file_temp = $image['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if ( empty($file_name) || empty($fName) || empty($fName) || empty($email) || empty($password))
            {
                echo "<div class='alert alert-danger alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Warning !</strong> Fields Should not be Empty.
                      </div>";
            }
            else
            {
                move_uploaded_file($file_temp, $uploaded_image);
                $this->db->insert("INSERT INTO ecom_admin(adminfastname, adminlastname, adminemail, level, adminpass) VALUES ('$fName', '$lName','$email', '$uploaded_image' ,'$password')");
            }
        }
    }//Main Class
?>