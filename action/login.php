<?php

include_once '../DataAccess/AdminDA.php';
include_once '../DataAccess/StudentDA.php';
include_once '../DataAccess/SocietyDA.php';
include_once '../Domain/Validation.php';

session_start();

if (isset($_POST['staffSubmit'])) {
    $val = new Validation();
    $aID = $val->test_input($_POST['adminid']);
    $apass = $val->test_input($_POST['adminpass']);

    if (empty($aID) || empty($apass)) {
        $_SESSION['error'] = "Please enter your id and password";
        header("Location:../UI/Login.php");
    } else {
        $db = new AdminDA();
        $result = $db->login($aID);
        if (empty($result)) {
            $_SESSION['error'] = "Invalid ID or Password";
            header("Location:../UI/Login.php");
        } else {
            if ($val->comparePass($apass,$result->password)) {
                $_SESSION['result'] = $result;
                $_SESSION['current'] = "Admin";
                unset($_SESSION['role']);
                echo'<script>alert("Login Successfully");location.href = "../UI/HomePage.php";</script>';
            } else {
                $_SESSION['error'] = "Invalid ID or Password";
                header("Location:../UI/Login.php");
            }
        }
    }
} else if (isset($_POST['societySubmit'])) {
    $val = new Validation();
    $scID = "SOC" . $val->test_input($_POST['societyid']);
    $scpass = $val->test_input($_POST['societypass']);

    if (empty($scID) || empty($scpass)) {
        $_SESSION['error'] = "Please enter your id and password";
        header("Location:../UI/Login.php");
    } else {
        $db = new SocietyDA();
        $result = $db->login($scID);
        if (empty($result)) {
            $_SESSION['error'] = 'Invalid ID or Password';
            header("Location:../UI/Login.php");
        } else {
            if ($val->comparePass($scpass, $result->societyPass)) {
                $_SESSION['result'] = $result;
                $_SESSION['current'] = "Society";
                unset($_SESSION['role']);
                echo'<script>alert("Login Successfully");location.href = "../UI/EventOrganizerHome.php";</script>';
            } else {
                $_SESSION['error'] = "Invalid ID or Password";
                header("Location:../UI/Login.php");
            }
        }
    }
} else if (isset($_POST['studentSubmit'])) {
    $val = new Validation();
    $stID = $val->test_input($_POST['userid']);
    $stpass = $val->test_input($_POST['studentpass']);

    if (empty($stID) || empty($stpass)) {
        $_SESSION['error'] = "Please enter your id and password";
        header("Location:../UI/Login.php");
    } else {
        $db = new StudentDA();
        $result = $db->login($stID);
        if (empty($result)) {
            $_SESSION['error'] = 'Invalid ID or Password';
            header("Location:../UI/Login.php");
        } else {
            if ($val->comparePass($stpass, $result->password)) {
                $_SESSION['result'] = $result;
                $_SESSION['current'] = "Student";
                unset($_SESSION['role']);
                echo'<script>alert("Login Successfully");location.href = "../UI/HomePage.php";</script>';
            } else {
                $_SESSION['error'] = "Invalid ID or Password";
                header("Location:../UI/Login.php");
            }
        }
    }
} else {
    header("Location:../UI/HomePage.php");
}



    