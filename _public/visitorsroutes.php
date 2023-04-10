<?php

use Apps\Template;

//User Login Page
$Route->add("/visitors/pages/login", function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template();

    $Template->assign("haspage", true);
    $Template->assign("menukey", "user.login");
    $Template->assign("title", "Users");

    $Template->render("visitors.pages.login");
}, 'GET');

//User Registration Page
$Route->add("/visitors/pages/register", function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template();

    $Template->assign("haspage", true);
    $Template->assign("menukey", "user.register");
    $Template->assign("title", "Users");

    $Template->render("visitors.pages.register");
}, 'GET');

//Other User Pages
$Route->add("/visitors/pages/{shortname}", function ($shortname) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/visitors/pages/login");

    $Template->addheader("visitors.layouts.header");
    $Template->addfooter("visitors.layouts.footer");

    $Template->assign("haspage", true);
    $Template->assign("menukey", "$shortname");

    if ($shortname == "visitors-home") {
        $Template->assign("title", "Homepage");
    } else {
        $Template->assign("title", "AULmed");
    }

    $accid = $Template->storage("accid");

    $userSql = "SELECT * FROM `users` WHERE id='{$accid}'";
    $uerResult = mysqli_query($Core->dbCon, $userSql);
    $User = mysqli_fetch_object($uerResult);

    $Template->assign("User", $User);

    $Template->render("visitors.pages.{$shortname}");
}, 'GET');

//Create New User
$Route->add("/user_register", function () {

    $Core = new Apps\Core;
    $Templet = new Apps\Template();

    $data = $Core->post($_POST);

    $fullName = $data->fullName;
    $email = $data->email;
    $password = $data->password;

    $user = (int)$Core->CreateNewUser($fullName, $email, $password);

    if ($user) {
        $Templet->setError("Your Account was Created Successfully. Please Login", "success", "/visitors/pages/login");
        $Templet->redirect("/visitors/pages/login");
    }

    $Templet->setError("The email you entered is already in Use.", "success", "/visitors/pages/register");
    $Templet->redirect("/visitors/pages/register");
}, 'POST');

//Create New User Testimonial
$Route->add("/review", function () {

    $Core = new Apps\Core;
    $Templet = new Apps\Template();

    $data = $Core->post($_POST);

    $fullName = $data->fullName;
    $email = $data->email;
    $jobDescription = $data->jobDescription;
    $review = $data->review;
    $approved = $data->approved;

    $picture = "";

    //Picture Upload
    $picture_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['picture']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/revie_pictures/");

        if ($Uploader->processed) {
            $picture_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $picture = $picture_path_to_db;

    $reviewSql = "INSERT INTO `pending_testimonial` (`fullName`, `email`, `jobDescription`, `review`, `approved`, `picture`) VALUES ('$fullName', '$email', '$jobDescription', '$review', '$approved', '$picture')";

    $review = mysqli_query($Core->dbCon, $reviewSql);

    if ($review) {
        $Templet->setError("Your review has been sent, pending admin approval.", "success", "/visitors/pages/home");
        $Templet->redirect("/visitors/pages/home");
    }

    $Templet->setError("Something went wrong, and your review did not send.", "success", "/visitors/pages/home");
    $Templet->redirect("/visitors/pages/home");
}, 'POST');

//Create User Login
$Route->add("/user_login", function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->data;

    $email = $data->email;
    $password = $data->password;

    $userLogin = $Core->UserLogin($email, $password);

    if ($userLogin->id) {
        $Template->authorize($userLogin->id);
        $Template->redirect("/");
    }
    $Template->setError("The email or password you entered is incorrect", "success", "/visitors/pages/login");
    $Template->redirect("/visitors/pages/login");
}, 'POST');


//Logout session//
$Route->add("/user/logout", function () {
    $Template = new Apps\Template;
    $Template->expire();
    $Template->redirect("/");
}, 'GET');
//Logout sessions ends//
