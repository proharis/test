<?php
session_start();
$_SESSION['ename'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
class customException extends Exception
{
    public function errorMessage()
    {
        //error message
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
            . ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}

$email = $_POST['email'];

try {
    //check if
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        //throw exception if email is not valid
        throw new customException($email);
    } else {
        echo "your email is " . $email;
    }
    //check for "example" in mail address
    if (strpos($email, "example") !== FALSE) {
        throw new Exception("$email is an example e-mail");
    }
} catch (customException $e) {
    echo $e->errorMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}