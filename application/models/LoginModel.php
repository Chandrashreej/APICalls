<?php
//helps to get the access the access the files within framework
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * creation of login class that extends CI_Controller
 */
class LoginModel extends CI_Model
{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function execute($email,$data,$password)
    {
        $validation_error = '';
        //query for selecting the row of that particular email
        $query = "SELECT * FROM register WHERE email = '$email'";
        //to get the pdo object to call pdo methods
        $statement = $this->db->conn_id->prepare($query);

        //calling pdo execute method
        if($statement->execute($data))
        {
            //calling pdo fetchAll method
            $result = $statement->fetchAll();

            //calling pdo rowCount method
            if($statement->rowCount() > 0)
            {
                //looping over the row and verifying password
                foreach($result as $row)
                {
                    if(password_verify($password, $row["password"]))
                    {
                        $_SESSION["name"] = $row["name"];
                    }
                    else
                    {
                        $validation_error = 'Wrong Password';
                    }
                }
            }
            else
            {
                //if rowCount not greater than zero means wrong email
                $validation_error = 'Wrong Email';
            }
        }
        return $validation_error;
    }
}