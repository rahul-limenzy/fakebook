<?php
include 'database.php';

//class to represent a user. child of database class.
class User extends Database
{
    protected $name;
    protected $email;
    protected $mobile;
    protected $gender;
    protected $password;
    protected $birthday;
    protected $dp;
    public $key;

    function __construct()
    {
        $this->dbConnect();   //set connection when an object is created.
    }

    function getData($values, $file = null)  //to get data from $_POST and $_FILES
    {
        $this->name = $values['name'];
        $this->email = $values['email'];
        $this->mobile = $values['mobile'];
        $this->gender = $values['gender'];
        $this->password = $values['password'];
        $this->birthday = $values['birthday'];
        if ($file != null)
            $this->dp = $file['dp']['name'];
    }

    function validate($edit = false)
    {
        $error = [];
        $result = [];
        //name - only alphabets, case-insensitive
        if (empty($this->name)) {
            $error['name'] = 'Please enter your name!';
        } elseif (!preg_match('/^[a-z ]+$/i', $this->name)) {
            $error['name'] = 'Invalid name!';
        }

        //email - unique, alphabets and some spcl characters
        $result = $this->dbSearchEmail($this->email);
        if (empty($this->email)) {
            $error['email'] = 'Please enter your email id!';
        } elseif (!preg_match('/[a-z0-9+.%_-]+@[a-z0-9+.%_-]+\.[a-z]+/i', $this->email)) {
            $error['email'] = 'Invalid email!';
        } elseif (!empty($result)) {
            if (true == $edit) {
                if ($this->email != $result['email']) {
                $error['email'] = "Email number already registered! 1111";
                } 
            }else {
                $error['email'] = "Email number already registered! 22222";
            }
        }

        //mobile - 10 digit number, unique
        $result = $this->dbSearchMobile($this->mobile);
        if (empty($this->mobile)) {
            $error['mobile'] = 'Please enter your mobile number!';
        } elseif (!is_numeric($this->mobile) || strlen($this->mobile) != 10) {
            $error['mobile'] = 'Must be a 10 digit number!';
        } elseif (!empty($result)) {
            if (true == $edit) {
                if ($this->mobile != $result['mobile']) {
                    $error['mobile'] = "Mobile number already registered! 33333";
                }
            } else {
                $error['mobile'] = "Mobile number already registered! 44444";
            }
        }

        //gender
        if (!isset($this->gender)) {
            $error['gender'] = 'Please select a gender!';
        }

        //password
        if ($edit) {
            if (!empty($this->password) && !(preg_match('/[a-z0-9!@#$%^&*()-=_+]+/i', $this->password) || strlen($this->password) <= 8)) {
                $error['pwd'] = 'password must be atleast 8 characters including atleast 1 alphabet, 1 number and 1 symbol!';
            }
        } elseif (!(preg_match('/[a-z0-9!@#$%^&*()-=_+]+/i', $this->password) || strlen($this->password) <= 8)) {
            $error['pwd'] = 'password must be  8 characters including atleast 1 alphabet, 1 number and 1 symbol!';
        }

        //birthday - age 15 to 50
        if (empty($this->birthday)) {
            $error['bday'] = 'Please select your birthday!';
        } elseif (strtotime($this->birthday) > strtotime('2005-01-01') || strtotime($this->birthday) < strtotime('1971-01-01')) {
            $error['bday'] = 'You must be between the age of 15 and 50 to sign-up!';
        }

        //profile picture - jpg or jpeg or png
        if ($this->dp != null) {
            if (exif_imagetype($_FILES['dp']['tmp_name']) != IMAGETYPE_JPEG && exif_imagetype($_FILES['dp']['tmp_name']) != IMAGETYPE_PNG) {
                $error['dp'] = 'Invalid file type! only JPEG or JPG or PNG supported.';
            }
        }

        return $error;
    }

    function saveData()        //function to save the user's details to Database
    {
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $this->dbInsert($this->name, $this->email, $this->mobile, $this->gender, $hashedPassword, $this->birthday, $this->dp);
        //passing child's values to parent's function
    }

    function updateData($id) // functions to update user's details in the DB
    {
        $this->dbUpdate($this->name, $this->mobile, $this->email, $this->gender, $this->password, $this->birthday, $this->dp, $id);
        return true;
        //passing child's values to parent's function
    }
}
$userObj = new User;
