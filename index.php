    
<?php

use Apps\Template;
use Apps\Core;

define('DOT', '.');
require_once(DOT . "/bootstrap.php");
require_once(DOT . "/_public/adminroutes.php");

$Route = new Apps\Route;

//Home page//
$Route->add('/', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");

    $Template->assign("title", "");
    $Template->assign("haspage", false);
    $Template->assign("menukey", "home");

    $Template->render("home");
}, 'GET');

//Get All Events
$Route->add("/pages/events", function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");

    $Template->assign("haspage", true);
    $Template->assign("menukey", "pages.events");
    $Template->assign("title", "Events");

    $sql = "SELECT * FROM events ORDER BY id DESC";
    $Events = mysqli_query($Core->dbCon, $sql);
    $Template->assign("Events", $Events);

    $Template->render("pages.events");
}, 'GET');

//Get Details of Each Blog
$Route->add("/pages/{id}/blog-details", function ($id) {

    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");

    $Template->assign("haspage", true);
    $Template->assign("menukey", "pages.blog-details");
    $Template->assign("title", "Blog Details");

    $sql = "SELECT * FROM blog_posts WHERE id='$id'";
    $full_blog = mysqli_query($Core->dbCon, $sql);
    $BlogDetails = mysqli_fetch_object($full_blog);

    $Template->assign("BlogDetails", $BlogDetails);

    $Template->render("pages.blog-details");
}, 'GET');


//Event Registration
$Route->add("/pages/{id}/registration", function ($id) {

    $Core = new Core;
    $Template = new Template;

    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");

    $Template->assign("haspage", true);
    $Template->assign("menukey", "pages.registration");
    $Template->assign("title", "Registration Page");

    $sql = "SELECT * FROM events WHERE id='$id'";
    $register = mysqli_query($Core->dbCon, $sql);
    $Registrations = mysqli_fetch_object($register);

    $Template->assign("Registrations", $Registrations);

    $Template->render("pages.registration");
}, 'GET');
//Event Registration Page Ends//

//Other pages//
$Route->add("/pages/{shortname}", function ($shortname) {

    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");

    $Template->assign("haspage", true);
    $Template->assign("menukey", $shortname);

    if ($shortname == "about-us") {
        $Template->assign("title", "Who we Are!");
    } elseif ($shortname == "contact-us") {
        $Template->assign("title", "Reach Us.");
    } else {
        $Template->assign("title", "Greenfield Executive Education");
    }
    $Template->render("pages.{$shortname}");
}, 'GET');

//Collect Newsletter Email
// $Route->add("/newsletter", function () {
//     $Core = new Apps\Core;
//     $Template = new Apps\Template();

//     $data = $Core->post($_POST);

//     $newsletterEmail = $data->newsletterEmail;

//     $newEmail = (int)$Core->NewsletterEmail($newsletterEmail);

//     if ($newEmail) {
//         $Template->setError("Congratulations! You have successfully subscribed to our Email Newsletter. <br />We'll send the best tips to stay healthy into your Email.", "Success", "/");
//         $Template->redirect("/");
//     }

//     $Template->setError("This Email already receives our Newsletter.", "Success", "/");
//     $Template->redirect("/");
// }, 'POST');

//Post New Blog by Admin
// $Route->add("/pages/mail", function () {
//     $Core = new Apps\Core;

//     $subject = "New Registration for ";
//     $message = "<h2>A new Registration by </h2>
//                     <p> Here are the details of the new registration <br />
//                      Name:  <br />
//                      Email:  <br />
//                      Phone Number:  <br />
//                      Company:  <br />
//                      Position:  <br />
//                      You can use these information to contact 
//                      </p>
//                     ";
//     $Core->sendMail("Lillian", "New Event Registration", $subject, $message);
// }, 'POST' );

//Collect Nomination Form
$Route->add("/nomination_form", function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template();

    $data = $Core->post($_POST);

    $fullName = $data->fullName;
    $company = $data->company;
    $email = $data->email;
    $phoneNumber = $data->phoneNumber;
    $message = $data->message;

    $nominated = (int)$Core->NominationForm($fullName, $company, $email, $phoneNumber, $message);

    if ($nominated) {
        $Template->setError("We've received your nomination. Thank you.", "success", "/");
        $Template->redirect("/");
    }
    $Template->setError("That wasn't successful, please retry later.", "warning", "/pages/nominate");
    $Template->redirect("/pages/nominate");
}, 'POST');

//Collect Event Registrations by id.
$Route->add("/event_registration", function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->post($_POST);

    $event_id = $data->event_id;
    $sureName = $data->sureName;
    $otherNames = $data->otherNames;
    $email = $data->email;
    $mobileNumber = $data->mobileNumber;
    $jobTitle = $data->jobTitle;
    $company = $data->company;
    $businessNumber = $data->businessNumber;
    $homeAddress = $data->homeAddress;
    $country = $data->country;

    $registered = (int)$Core->EventRegistration($event_id, $sureName, $otherNames, $email, $mobileNumber, $jobTitle, $company, $businessNumber, $homeAddress, $country);

    if ($registered) {

        $eventSql = "SELECT * FROM `events` WHERE id = $event_id";
        $sql = mysqli_query($Core->db, $eventSql);
        $eventName = mysqli_fetch_object($sql);

        $subject = "New Registration for <?= $eventName->evetName ?>";
        $message = "<h2>A new Registration by {$sureName}</h2>
                    <p> Here are the details of the new registration <br />
                     Name: {$sureName}, {$otherNames} <br />
                     Email: {$email} <br />
                     Phone Number: {$mobileNumber} <br />
                     Company: {$company} <br />
                     Position: {$jobTitle} <br />
                     You can use these information to contact {$sureName}
                     </p>
                    ";
        $Core->sendMail("Lillian", "New Event Registration", $subject, $message);

        $Template->setError("You have successfully registered", "success", "/pages/events");
        $Template->redirect("/pages/events");
    }

    $Template->setError("The email you entered have already registered for this event", "warning", "/pages/events");
    $Template->redirect("/pages/events");
}, 'POST');

// AJAX Routes
$Route->add("/ajax/getpost", function () {
    $Core = new Core;
    $id = $Core->data->id;
    $events = $Core->GetEventByID($id);
    $events = json_encode($events);
    $Core->debug($events);
}, "POST");

//Logout session//
$Route->add("/admin/logout", function () {
    $Template = new Apps\Template;
    $Template->expire();
    $Template->redirect("/admin");
}, 'GET');
//Logout sessions ends//

$Route->run('/');
