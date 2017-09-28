<?php
/**
 * Session Class
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/8/2017
 * Time: 7:05 AM
 */
?>
<?php

    class Session
    {
        /**
         *
         */
        public static function init()
        {
            if (version_compare(phpversion(), '5.4.0', '<'))
            {
                if (session_id() == '')
                {
                    session_start();
                }
            }
            else
            {
                if (session_status() == PHP_SESSION_NONE)
                {
                    session_start();
                }
            }
        }

        /**
         * @param $key
         * @param $val
         */
        public static function set($key, $val)
        {
            $_SESSION[$key] = $val;
        }

        /**
         * @param $key
         * @return bool
         */
        public static function get($key)
        {
            if (isset($_SESSION[$key]))
            {
                return $_SESSION[$key];
            }
            else
            {
                return false;
            }
        }

        /**
         *
         */
        public static function checkAdminSession()
        {
            self::init();
            if (self::get("login")== false)
            {
                self::destroy();
                header("Location:../admin/login.php");
            }
        }


        /**
         *
         */
        public static function checkAdminLogin()
        {
            self::init();
            if (self::get("login")== true)
            {
                header("Location:../admin/index.php");
            }
        }

        /**
         *
         */
        public static function destroy()
        {
            session_destroy();
            header("Location:login.php");
        }


        /**
         *
         */
        public static function destroyAdminSession()
        {
            session_destroy();
            header("Location:../admin/login.php");
        }
    }
?>