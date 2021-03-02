<?php

class Database  //class to manage database. parent of user class.
{
    protected $host = "localhost";    //servername
    protected $dbname = "fakebook";
    const user = "root";
    const password = '';

    protected $_db;



    protected function dbConnect() //connect to db
    {
        try {
            $this->_db = new PDO("mysql:host=$this->host; dbname=$this->dbname", self::user, self::password);
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $message = 'Connection failed!\n\n' . $e->getMessage() . '\n\n Please try again later.';
            echo "<script>alert('$message');</script>";   //alert if error
        }
    }

    function dbInsert($name, $email, $mobile, $gender, $password, $birthday, $image) // insert into DB
    {
        $sql = "INSERT INTO users (name, mobile, email, gender, password, birthday, image, created_at, updated_at)  VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute([$name, $mobile, $email, $gender, $password, $birthday, $image, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
    }

    function dbUpdate($name, $mobile, $email, $gender, $password, $birthday, $file, $id) //edit user details
    {
        if ($password == '' && $file != '') {
            $sql = "UPDATE users SET name = ?, mobile = ?, email = ?, gender = ?, birthday = ?, image = ?, updated_at = ? WHERE id = ?";
            $stmt = $this->_db->prepare($sql);
            $stmt->execute([$name, $mobile, $email, $gender, $birthday, $file, date("Y-m-d H:i:s"), $id]);
        } elseif ($password != '' && $file == '') {
            $sql = "UPDATE users SET name = ?, mobile = ?, email = ?, gender = ?, password = ?, birthday = ?, updated_at = ? WHERE id = ?";
            $stmt = $this->_db->prepare($sql);
            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute([$name, $mobile, $email, $gender, $hashedpassword, $birthday, date("Y-m-d H:i:s"), $id]);
        } elseif ($password == '' && $file == '') {
            $sql = "UPDATE users SET name = ?, mobile = ?, email = ?, gender = ?, birthday = ?, updated_at = ? WHERE id = ?";
            $stmt = $this->_db->prepare($sql);
            $stmt->execute([$name, $mobile, $email, $gender, $birthday, date("Y-m-d H:i:s"), $id]);
        }
        return true;
    }

    function dbSearchEmail($email) //search by email
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }

    function dbSearchMobile($mobile) //search by mobile
    {
        $sql = "SELECT * FROM users WHERE mobile = ?";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute([$mobile]);
        $result = $stmt->fetch();
        return $result;
    }

    function dbSearchId($id) // search by id
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    function dbFetchAll() //all users list
    {
        $sql = "SELECT * from users";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function dbSearch($key) //search in the list 
    {

        if (is_numeric($key)) {
            $sql = "SELECT * FROM users WHERE mobile LIKE ?";
        }
        if (preg_match('/[a-z0-9+.%_-]+@[a-z0-9+.%_-]+\.[a-z]+/i', $key)) {
            $sql = "SELECT * FROM users WHERE email LIKE ?";
        }
        if (preg_match('/^[a-z ]+$/i', $key)) {
            $sql = "SELECT * FROM users WHERE name LIKE ?";
        }

        $stmt = $this->_db->prepare($sql);
        $stmt->execute(['%' . $key . '%']);
        $result = $stmt->fetchAll();
        return $result;
    }

    function dbDeleteId($id) // delete by ID
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

    function dbInsertDetails($userID,$tenthGpa, $tenthYop, $plusTwoGpa, $plusTwoYop)
    {
        $sql = "INSERT INTO education (user_id, tenth_gpa, tenth_yop, plustwo_gpa, plustwo_yop, created_at, updated_at)  VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute([$userID,$tenthGpa, $tenthYop, $plusTwoGpa, $plusTwoYop]);
    }
}
