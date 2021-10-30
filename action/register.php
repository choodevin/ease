<?php

include_once '../Domain/Admin.php';
include_once '../Domain/Student.php';
include_once '../Domain/Validation.php';
include_once '../DataAccess/AdminDA.php';
include_once '../DataAccess/StudentDA.php';

session_start();

if (isset($_POST['staffSubmit'])) {
    $val = new Validation();
    $id = $val->test_input($_POST['adminid']);
    $pass = $val->test_input($_POST['pass']);
    $cpass = $val->test_input($_POST['cpass']);

    if (empty($id) || empty($pass) || empty($cpass)) {
        $_SESSION['error'] = 'Please fill in all the blanks';
        header("Location:../UI/Register.php");
    } else {
        if ($val->passwordIsValid($pass)) {
            if ($val->passwordIsValid($cpass)) {
                if ($pass == $cpass) {
                    $create = new AdminDA();
                    if ($create->checkID($id)) {
                        $ad = new Admin($id, $val->securePassword($pass));
                        $create->register($ad);
                        unset($_SESSION['status']);
                        $_SESSION['role'] = 'staff';
                        echo '<script>alert("Account Register Successfully");location.href = "../UI/Login.php";</script>';
                    } else {
                        $_SESSION['error'] = 'Account had been registered';
                        header("Location:../UI/Register.php");
                    }
                } else {
                    $_SESSION['error'] = 'Password and Confirm Password must match';
                    header("Location:../UI/Register.php");
                }
            } else {
                $_SESSION['error'] = 'Confirm Password invalid format';
                header("Location:../UI/Register.php");
            }
        } else {
            $_SESSION['error'] = 'Password invalid format';
            header("Location:../UI/Register.php");
        }
    }
} else if (isset($_POST['studentSubmit'])) {
    $val = new Validation();
    $id = $val->test_input($_POST['id']);
    $name = $val->test_input($_POST['name']);
    $email = $val->test_input($_POST['email']);
    $pass = $val->test_input($_POST['pass']);
    $cpass = $val->test_input($_POST['cpass']);
    $stud = $val->test_input($_POST['studid']);

    if (empty($name) || empty($pass) || empty($cpass) || empty($email) || empty($stud)) {
        $_SESSION['error'] = 'Please fill in all the blanks';
        header("Location:../UI/Register.php");
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($val->passwordIsValid($pass)) {
                if ($val->passwordIsValid($cpass)) {
                    if ($pass == $cpass) {
                        $create = new StudentDA();
                        if ($create->checkUsername($name)) {
                            if ($create->checkUniID($stud)) {
                                if ($create->checkStudID($stud)) {
                                    if ($create->checkEmail($email)) {
                                        $st = new Student($id, $name, $val->securePassword($pass), $email, $stud);
                                        $create->register($st);
                                        unset($_SESSION['status']);
                                        $_SESSION['role'] = 'student';
                                        echo '<script>alert("Account Register Successfully");location.href = "../UI/Login.php";</script>';
                                    } else {
                                        $_SESSION['error'] = 'Email had been used';
                                        header("Location:../UI/Register.php");
                                    }
                                } else {
                                    $_SESSION['error'] = 'Student ID had been registered';
                                    header("Location:../UI/Register.php");
                                }
                            } else {
                                $_SESSION['error'] = 'Invalid Student ID';
                                header("Location:../UI/Register.php");
                            }
                        } else {
                            $_SESSION['error'] = 'Username had been registered';
                            header("Location:../UI/Register.php");
                        }
                    } else {
                        $_SESSION['error'] = 'Password and Confirm Password must match';
                        header("Location:../UI/Register.php");
                    }
                } else {
                    $_SESSION['error'] = 'Confirm Password invalid format';
                    header("Location:../UI/Register.php");
                }
            } else {
                $_SESSION['error'] = 'Password invalid format';
                header("Location:../UI/Register.php");
            }
        } else {
            $_SESSION['error'] = 'Email invalid format';
            header("Location:../UI/Register.php");
        }
    }
} else {
    header("Location:../UI/HomePage.php");
}

    