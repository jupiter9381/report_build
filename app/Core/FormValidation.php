<?php
namespace App\Core;

class FormValidation
{ 

    private $exception = [];

    public static function csrfToken()
    {
        //generate token
        if (empty($_SESSION['csrf_token'])) {
            if (function_exists('mcrypt_create_iv')) {
                $_SESSION['csrf_token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
            } else {
                $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32));
            }
        }
        return $_SESSION['csrf_token']; 
    }

    public function validate($data = [])
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($data['csrf_token'] != $_SESSION['csrf_token']) {
                $this->exception[] = "Invalid csrf token";
                return $this->exception;
            } else {

                $this->inputPost($data['hostname'],'Host Name',['required','alphaNumericDigit']);
                $this->inputPost($data['username'],'User Name',['required','alphaNumeric']);
                $this->inputPost($data['password'],'Password',['password']);
                $this->inputPost($data['database'],'Database Name',['required','alphaNumeric']);

                if (count($this->exception) > 0) {
                    return $this->exception;
                } else {
                    return true; 
                }
            }

        } else {
            $this->exception[] = "Invalid request!";
            return $this->exception;
        }
    } 

    // ----------------------------------------------------------
    // ----------------------------------------------------------
    // ----------------------------------------------------------
    // ----------------------------------------------------------


    public function inputPost($input = null, $title = null, $condition = null)
    { 

        if (in_array('required', $condition)) {
            if ($this->requiredField($input) === false) {
                $this->exception []= "{$title} field is required";
            }
        }

        if (in_array('password', $condition)) {
            if ($this->password($input) === false) {
                $this->exception []= "{$title} not contain any script tag"; 
            }
        }

        if (in_array('alphaNumeric', $condition)) {
            if ($this->alphaNumeric($input) === false) {
                $this->exception []= "{$title} only alphabet, numbers and underscores are allowed. first letter must be a character"; 
            }
        }   

        if (in_array('alphaNumericDigit', $condition)) {
            if ($this->alphaNumericDigit($input) === false) {
                $this->exception []= "{$title} only alphabet, numbers and underscores are allowed. first letter must be a character"; 
            }
        }   
    }


    //filter input data
    protected function filter($input = null)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }


    //if not empty return true else return exception
    protected function requiredField($input = null)
    {
        $input = trim($input);
        if (empty($input)) {
            return false;
        } else {
            return true;
        }
    }

    // check if name only contains letters and numbers
    protected function alphaNumericDigit($input = null)
    {
        if (preg_match("/^[A-Za-z0-9_.]+$/", $input)) { 
            //check first letter is number
            return true;
        } else {
            return false;
        }
    }


    // check if name only contains letters and numbers
    protected function alphaNumeric($input = null)
    {
        if (preg_match("/^[A-Za-z0-9_]+$/", $input)) { 
            //check first letter is number
            if (is_numeric(substr($input, 0, 1))) {
                return false;
            } else {
                //if first letter is character
                return true;
            }
        } else {
            return false;
        }
    }

    //chceck password is contain any script 
    protected function password($input = null, $title = null)
    {
        //check passwod containt <script> tag
        if (preg_match('<script>', $input)) {
            return false;
        } else {
            return true;
        }
    }

    public function checkFlag($filePath)
    {
        if (file_exists($filePath)) {
            $root=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
            $root.= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
            $root = str_replace('/install/', '', $root);
            header('location: '.$root); 
        }
    }
    
}

