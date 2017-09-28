<?php
/**
 * Message Class
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/19/2017
 * Time: 11:53 AM
 */
?>

<?php
    $filePath = realpath(dirname(__FILE__));
    include_once $filePath.'/../lib/Database.php';
    include_once $filePath.'/../helpers/Formate.php';
    class Message
    {
        private $db;
        private $fm;

        /**
         * Message constructor.
         */
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Formate();
        }

        /**
         * @param $subject
         * @param $message
         * @param $userId
         */
        public function insertMessage($subject, $message, $userId, $email)
        {
            $subject = $this->fm->validation($subject);
            $message = $this->fm->validation(trim($message));
            $userId  = $this->fm->validation($userId);

            $subject = mysqli_real_escape_string($this->db->link, $subject);
            $message = mysqli_real_escape_string($this->db->link, $message);
            $userId = mysqli_real_escape_string($this->db->link, $userId);
            $date = date('y-m-d');

            $insert = $this->db->insert("INSERT INTO ecom_customer_message(userid, subject, message, messagedate, useremail) VALUES ('$userId','$subject','$message','$date',  '$email')");

            if ($insert != false)
            {
                echo "<div class='alert alert-info alert-dismissable'>
                         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Success! </strong> Message Send to Admin Thank You.";
                echo "</div>";
            }
        }


        /**
         * @return bool
         */
        public function getAllMessage()
        {
            return $this->db->select("SELECT * FROM ecom_customer_message ORDER BY messageid");
        }

        public function insertAdminMessage($email, $subject, $message)
        {
            $email   = $this->fm->validation($email);
            $subject = $this->fm->validation($subject);
            $message = $this->fm->validation($message);

            $email   = mysqli_real_escape_string($this->db->link, $email);
            $subject = mysqli_real_escape_string($this->db->link, $subject);
            $message = mysqli_real_escape_string($this->db->link, $message);

            if (empty($email) || empty($subject) || empty($message))
            {
                echo "<div class='col-md-12'>
                            <div class='alert alert-warning alert-dismissible fade in' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                </button>
                                <strong>Sorry! </strong> Field Must not be Empty.
                            </div>
                        </div>";
            }
            else
            {
                $date = date('y-m-d');
                $this->db->insert("INSERT INTO ecom_admin_message(email, subject, message, date) VALUES ('$email', '$subject', '$message', '$date')");
                echo "<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Success !</strong> Message has been send to"; echo $email;
                  echo "</div>";
            }
        }

        public function getAllAdminMessageByEmail($email)
        {
            return $this->db->select("SELECT * FROM ecom_admin_message WHERE email = '$email' ");
        }
    }//Main Class
?>