<?php
/**
 * Formate Class
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/8/2017
 * Time: 7:01 AM
 */
?>
<?php

    class Formate
    {
        /**
         * @param $date
         * @return false|string
         */
        public function formatDate($date)
        {
            return date('F j, Y, g:i a', strtotime($date));
        }

        /**
         * @param $text
         * @param int $limit
         * @return bool|string
         */
        public function textShorten($text, $limit = 400)
        {
            $text = $text. " ";
            $text = substr($text, 0, $limit);
            $text = substr($text, 0, strrpos($text, ' '));
            $text = $text.".....";
            return $text;
        }

        /**
         * @param $data
         * @return string
         */
        public function validation($data)
        {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        /**
         * @return string
         */
        public function title()
        {
            $path = $_SERVER['SCRIPT_FILENAME'];
            $title = basename($path, '.php');
            //$title = str_replace('_', ' ', $title);
            if ($title == 'index')
            {
                $title = 'home';
            }
            elseif ($title == 'contact')
            {
                $title = 'contact';
            }
            return $title = ucfirst($title);
        }
    }//Main Class
?>