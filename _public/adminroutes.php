<?php

use Apps\Template;

//Create Admin Login Page
$Route->add("/admin/pages/login", function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template();

    $Template->assign("haspage", true);
    $Template->assign("menukey", "admin.login");
    $Template->assign("title", "Admin");

    $Template->render("admin.pages.login");
}, 'GET');

$Route->add("/admin", function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template();

    $Template->assign("haspage", true);
    $Template->assign("menukey", "admin.login");
    $Template->assign("title", "Admin");

    $Template->render("admin.pages.login");
}, 'GET');

//Get All Blogs
$Route->add("/admin/pages/all-blogs", function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template(auth_url);

    $Template->assign("haspage", true);
    $Template->assign("menukey", "admin.all-blogs");
    $Template->assign("title", "Admin");

    $Template->addheader("admin.layouts.header");
    $Template->addfooter("admin.layouts.footer");

    $blogSql = "SELECT * FROM `blog_posts` ORDER BY id DESC";
    $Blogs = mysqli_query($Core->dbCon, $blogSql);
    $Template->assign("Blogs", $Blogs);

    $Template->render("admin.pages.all-blogs");
}, 'GET');

//Get All Campaigns
$Route->add("/admin/pages/all-campaigns", function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template(auth_url);

    $Template->assign("haspage", true);
    $Template->assign("menukey", "admin.all-campaigns");
    $Template->assign("title", "Admin");

    $Template->addheader("admin.layouts.header");
    $Template->addfooter("admin.layouts.footer");

    $campaignSql = "SELECT * FROM `campaigns` ORDER BY id DESC";
    $Campaigns = mysqli_query($Core->dbCon, $campaignSql);
    $Template->assign("Campaigns", $Campaigns);

    $Template->render("admin.pages.all-campaigns");
}, 'GET');

//Render Blog Update page
$Route->add("/admin/pages/{id}/update-blog", function ($id) {

    $Core = new Apps\Core;
    $Template = new Apps\Template(auth_url);

    $Template->assign("haspage", true);
    $Template->assign("menukey", "admin.update-blog");
    $Template->assign("title", "Update-Blog");

    $Template->addheader("admin.layouts.header");
    $Template->addfooter("admin.layouts.footer");

    $blogSql = "SELECT * FROM `blog_posts` WHERE id = $id";
    $updateBlog = mysqli_query($Core->dbCon, $blogSql);
    $newBlogUpdate = mysqli_fetch_object($updateBlog);

    $Template->assign("newBlogUpdate", $newBlogUpdate);

    $Template->render("admin.pages.update-blog");
}, 'GET');

//Render Campaign Update page
$Route->add("/admin/pages/{id}/update-campaign", function ($id) {

    $Core = new Apps\Core;
    $Template = new Apps\Template(auth_url);

    $Template->assign("haspage", true);
    $Template->assign("menukey", "admin.update-campaign");
    $Template->assign("title", "Update-Campaign");

    $Template->addheader("admin.layouts.header");
    $Template->addfooter("admin.layouts.footer");

    $campaignSql = "SELECT * FROM `campaigns` WHERE id = $id";
    $updateCampaign = mysqli_query($Core->dbCon, $campaignSql);
    $newUpdate = mysqli_fetch_object($updateCampaign);

    $Template->assign("newUpdate", $newUpdate);

    $Template->render("admin.pages.update-campaign");
}, 'GET');

//Get All User Reviews
$Route->add("/admin/pages/all-reviews", function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template(auth_url);

    $Template->assign("haspage", true);
    $Template->assign("menukey", "admin.all-reviews");
    $Template->assign("title", "Admin");

    $Template->addheader("admin.layouts.header");
    $Template->addfooter("admin.layouts.footer");

    $reviewSql = "SELECT * FROM pending_testimonial ORDER BY id DESC";
    $Reviews = mysqli_query($Core->dbCon, $reviewSql);
    $Template->assign("Reviews", $Reviews);

    $Template->render("admin.pages.all-reviews");
}, 'GET');

//Other Admin Pages
$Route->add("/admin/pages/{shortname}", function ($shortname) {

    $Core = new Apps\Core;
    $Template = new Apps\Template();

    $Template->addheader("admin.layouts.header");
    $Template->addfooter("admin.layouts.footer");

    $Template->assign("haspage", true);
    $Template->assign("menukey", "$shortname");

    if ($shortname == "admin-home") {
        $Template->assign("title", "Admin Homepage");
    } elseif ($shortname == "new-blog") {
        $Template->assign("title", "Create New Event");
    } else {
        $Template->assign("title", "Greenfield Admin Page");
    }

    $Template->render("admin.pages.{$shortname}");
}, 'GET');

//Approve User Review
$Route->add("/pages/admin/{id}/approved", function ($id) {

    $Core = new Apps\Core;
    $Template = new Apps\Template(auth_url);

    $updateSql = "UPDATE `pending_testimonial` SET `approved`='1' WHERE `id` = '$id'";
    $updated = mysqli_query($Core->dbCon, $updateSql);


    if ($updated) {
        $Template->setError("This Review have been approved", "success", "/admin/pages/all-reviews");
        $Template->redirect("/admin/pages/all-reviews");
    }
}, 'GET');

//Create Admin Login
$Route->add("/admin_login", function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template();

    $data = $Core->data;

    $email = $data->email;
    $password = $data->password;

    $admin = $Core->AdminLogin($email, $password);

    if ($admin->id) {
        $Template->authorize($admin->id);
        $Template->redirect("/admin/pages/admin-home");
    }

    $Template->setError("Username or Password incorrect", "success", "/admin/pages/login");
    $Template->redirect("/admin/pages/login");
}, 'POST');

//Post New Blog by Admin
$Route->add("/new_blog", function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->post($_POST);

    $evetTitle = $data->evetTitle;
    $startDate = $data->startDate;
    $endDate = $data->endDate;
    $eventDescription = $data->eventDescription;

    $videoLink = $data->videoLink;
    $eventFee = $data->eventFee;
    $professionalLevel = $data->professionalLevel;

    $eventDuration = $data->eventDuration;
    $eventOrganisers = $data->eventOrganisers;

    $flyer = "";
    $videoImage = "";

    //Uploading Event Pictures//
    //Flyer
    $flyer_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['flyer']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/events/");

        if ($Uploader->processed) {
            $flyer_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $flyer = $flyer_path_to_db;

    //Video Image
    $video_image_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['videoImage']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/events/");

        if ($Uploader->processed) {
            $video_image_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $videoImage = $video_image_path_to_db;


    $newBlog = (int)$Core->CreateNewBlog($evetTitle, $startDate, $endDate, $eventDescription, $videoLink, $eventFee, $professionalLevel, $eventDuration, $eventOrganisers, $flyer, $videoImage);

    if ($newBlog) {
        $Template->setError("This Event has beed Added", "success", "/admin/pages/admin-home");
        $Template->redirect("/admin/pages/admin-home");
    }

    $Template->setError("Something went wrong, and your event didn't post", "warning", "/admin/pages/admin-home");
    $Template->redirect("/admin/pages/admin-home");
}, 'POST');
//Post Blog by Admin Ends

//Post New Campaign by Admin
$Route->add("/new_campaign", function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->post($_POST);

    $campaignTopic = $data->campaignTopic;
    $campaignDescription = $data->campaignDescription;
    $campaignDetails = $data->campaignDetails;
    $startDate = $data->startDate;
    $endDate = $data->endDate;

    $campaignImage = "";

    //Uploading Campaign Pictures
    $campaignImage_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['campaignImage']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/campaigns/");

        if ($Uploader->processed) {
            $campaignImage_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $campaignImage = $campaignImage_path_to_db;


    $newCampaign = (int)$Core->CreateNewCampaign($campaignTopic, $campaignDescription, $campaignDetails, $startDate, $endDate, $campaignImage);

    if ($newCampaign) {
        $Template->setError("Your Campaign was posted successfully", "success", "/admin/pages/admin-home");
        $Template->redirect("/admin/pages/admin-home");
    }

    $Template->setError("Something went wrong, and your new campmaign didn't post", "warning", "/admin/pages/admin-home");
    $Template->redirect("/admin/pages/admin-home");
}, 'POST');
//Post Campaign by Admin Ends

//Add New Doctor
$Route->add("/new_doctor", function() {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->post($_POST);

    $name = $data->name;

    $sql = "INSERT INTO `doctors`(`name`) VALUES ('{$name}')";
    $doctorAdded = mysqli_query($Core->dbCon, $sql);

    if ($doctorAdded) {
        $Template->setError("You have successfully added Doctor to list", "success", "/admin/pages/new-diary");
        $Template->redirect("/admin/pages/new-diary");
    }
    $Template->setError("This Doctor Already Exits in the List", "success", "/admin/pages/new-diary");
    $Template->redirect("/admin/pages/new-diary");
}, 'POST');

//Add New Health Topic Category
$Route->add("/new_health_topic_category", function() {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->post($_POST);

    $category = $data->category;

    $sql = "INSERT INTO `heath_topic_groups`(`category`) VALUES ('{$category}')";
    $doctorAdded = mysqli_query($Core->dbCon, $sql);

    if ($doctorAdded) {
        $Template->setError("You have Created a New Category", "success", "/admin/pages/post-health-topic");
        $Template->redirect("/admin/pages/post-health-topic");
    }
    $Template->setError("This Category already exists, or something went wrong.", "success", "/admin/pages/post-health-topic");
    $Template->redirect("/admin/pages/post-health-topic");
}, 'POST');

//Create New Health Topic
$Route->add("/new_health_topic", function() {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->post($_POST);

    $healthImage = "";
    $videoImage = "";

    $category_id = $data->category_id;
    $healthTitle = $data->healthTitle;
    $imageTitle = $data->imageTitle;
    $firstContent = $data->firstContent;
    $lastContent = $data->lastContent;
    $healthVideo = $data->healthVideo;
    $videoTitle = $data->videoTitle;
    $healthQuote = $data->healthQuote;
    $quoteAuthor = $data->quoteAuthor;
    

    //Uploading Health Topic Image
    $healthImage_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['healthImage']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/health_topics/");

        if ($Uploader->processed) {
            $healthImage_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $healthImage = $healthImage_path_to_db;

    //Upload Image for Video
    $videoImage_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['videoImage']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/health_topics/");

        if ($Uploader->processed) {
            $videoImage_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $videoImage = $videoImage_path_to_db;
    
    $sql = "INSERT INTO 
                `health_topics`(`healthImage`, `videoImage`, `category_id`, `healthTitle`, `imageTitle`, `firstContent`, `lastContent`, `healthVideo`, `videoTitle`, `healthQuote`, `quoteAuthor`) 
            VALUES 
                ('{$healthImage}', '{$videoImage}', '{$category_id}', '{$healthTitle}', '{$imageTitle}', '{$firstContent}', '{$lastContent}', '{$healthVideo}', '{$videoTitle}', '{$healthQuote}', '{$quoteAuthor}')";

    $healthTopic = mysqli_query($Core->dbCon, $sql);

    if ($healthTopic) {
        $Template->setError("You have successfully posted this Health Topic", "success", "/admin/pages/post-health-topic");
        $Template->redirect("/admin/pages/post-health-topic");
    }
    $Template->setError("Couldn't create this Health Topic, please try again", "success", "/admin/pages/post-health-topic");
    $Template->redirect("/admin/pages/post-health-topic");
}, 'POST');

//Create New Slide
$Route->add("/new_slide", function() {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->post($_POST);

    $slideImageA = "";
    $slideImageB = "";
    $slideImageC = "";
    $slideImageD = "";
    $slideImageE = "";

    $doctor_id = $data->doctor_id;
    $Title = $data->Title;
    $slideDescriptionA = $data->slideDescriptionA;
    $slideDescriptionB = $data->slideDescriptionB;
    $slideDescriptionC = $data->slideDescriptionC;
    $slideDescriptionD = $data->slideDescriptionD;
    $slideDescriptionE = $data->slideDescriptionE;
    $blogContent = $data->blogContent;
    $videoLink = $data->videoLink;
    $videoImage = "";

    //Uploading Slide 1st Pictures
    $slideImageA_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['slideImageA']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/sliders/");

        if ($Uploader->processed) {
            $slideImageA_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $slideImageA = $slideImageA_path_to_db;

    //Uploading Slide 2nd Pictures
    $slideImageB_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['slideImageB']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/sliders/");

        if ($Uploader->processed) {
            $slideImageB_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $slideImageB = $slideImageB_path_to_db;

    //Uploading Slide 3rd Pictures
    $slideImageC_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['slideImageC']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/sliders/");

        if ($Uploader->processed) {
            $slideImageC_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $slideImageC = $slideImageC_path_to_db;

    //Uploading Slide 4th Pictures
    $slideImageD_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['slideImageD']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/sliders/");

        if ($Uploader->processed) {
            $slideImageD_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $slideImageD = $slideImageD_path_to_db;

    //Uploading Slide 5th Pictures
    $slideImageE_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['slideImageE']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/sliders/");

        if ($Uploader->processed) {
            $slideImageE_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $slideImageE = $slideImageE_path_to_db;

    //Upload Image for Video
    $videoImage_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['videoImage']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/sliders/");

        if ($Uploader->processed) {
            $videoImage_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $videoImage = $videoImage_path_to_db;
    
    $sql = "INSERT INTO 
                `slides`(`slideImageA`, `slideImageB`, `slideImageC`, `slideImageD`, `slideImageE`, `doctor_id`, `Title`, `slideDescriptionA`, `slideDescriptionB`, `slideDescriptionC`, `slideDescriptionD`, `slideDescriptionE`, `blogContent`, `videoLink`, `videoImage`) 
            VALUES 
                ('{$slideImageA}', '{$slideImageB}', '{$slideImageC}', '{$slideImageD}', '{$slideImageE}', '{$doctor_id}', '{$Title}', '{$slideDescriptionA}', '{$slideDescriptionB}', '{$slideDescriptionC}', '{$slideDescriptionD}', '{$slideDescriptionE}', '{$blogContent}', '{$videoLink}', '{$videoImage}')";

    $slidePosted = mysqli_query($Core->dbCon, $sql);

    if ($slidePosted) {
        $Template->setError("You have successfully added a new Dairy", "success", "/admin/pages/admin-home");
        $Template->redirect("/admin/pages/admin-home");
    }
    $Template->setError("This Dairy was unable to create, please try again", "success", "/admin/pages/admin-home");
    $Template->redirect("/admin/pages/admin-home");
}, 'POST');

//Create New Video Tutorial
$Route->add("/new_video_tutorial", function() {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->post($_POST);

    $image_thumbnail = "";

    $doctor_id = $data->doctor_id;
    $title = $data->title;
    $description = $data->description;
    $creator_name = $data->creator_name;
    $creator_designation = $data->creator_designation;
    $video_link = $data->video_link;
    $video_source = $data->video_source;
    $video_duration = $data->video_duration;

    //Uploading Video Image thumbnail
    $image_thumbnail_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['image_thumbnail']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/video_tutorial/");

        if ($Uploader->processed) {
            $image_thumbnail_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $image_thumbnail = $image_thumbnail_path_to_db;
    
    $sql = "INSERT INTO `video_tutorials`(`image_thumbnail`, `doctor_id`, `title`, `description`, `creator_name`, `creator_designation`, `video_link`, `video_source`, `video_duration`) VALUES ('{$image_thumbnail}', '{$doctor_id}', '{$title}', '{$description}', '{$creator_name}', '{$creator_designation}', '{$video_link}' '{$video_source}', '{$video_duration}')";
    $eventPosted = mysqli_query($Core->dbCon, $sql);

    if ($eventPosted) {
        $Template->setError("You have successfully added this new Video Tutorial", "success", "/admin/pages/admin-home");
        $Template->redirect("/admin/pages/admin-home");
    }
    $Template->setError("This Tutorial failed to create, please try again.", "success", "/admin/pages/admin-home");
    $Template->redirect("/admin/pages/admin-home");
}, 'POST');

//Create New Event
$Route->add("/new_event", function() {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->post($_POST);

    $eventImage = "";

    $title = $data->title;
    $startDate = $data->startDate;
    $endDate = $data->endDate;
    $venue = $data->venue;
    $eventDescription = $data->eventDescription;
    $organizer = $data->organizer;
    $email = $data->email;

    //Uploading Event Pictures
    $eventImage_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['eventImage']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/event_pictures/");

        if ($Uploader->processed) {
            $eventImage_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $eventImage = $eventImage_path_to_db;
    
    $sql = "INSERT INTO `events`(`eventImage`, `title`, `startDate`, `endDate`, `venue`, `eventDescription`, `organizer`, `email`) VALUES ('{$eventImage}', '{$title}', '{$startDate}', '{$endDate}', '{$venue}', '{$eventDescription}' '{$organizer}', '{$email}')";
    $eventPosted = mysqli_query($Core->dbCon, $sql);

    if ($eventPosted) {
        $Template->setError("You have successfully added this new Event", "success", "/admin/pages/admin-home");
        $Template->redirect("/admin/pages/admin-home");
    }
    $Template->setError("This Event failed to create, please try again.", "success", "/admin/pages/admin-home");
    $Template->redirect("/admin/pages/admin-home");
}, 'POST');


//Update Blog by Admin-Change Images
//First Image
$Route->add("/update_blog/{id}/first_image", function ($id) {
    $Core = new Apps\Core();
    $Template = new Apps\Template();

    $firstImage = "";
    $first_image_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['firstImage']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/blog_posts/");

        if ($Uploader->processed) {
            $first_image_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $firstImage = $first_image_path_to_db;
    
    $sql = "UPDATE `blog_posts` SET `firstImage`='$firstImage' WHERE `id`='$id'";
    $newFirstImage = mysqli_query($Core->dbCon, $sql);

    if ($newFirstImage) {
        $Template->setError("Image Changed Successfully. <br />You can update the rest of the blog.", "success", "/admin/pages/all-blogs");
        $Template->redirect("/admin/pages/all-blogs");
    }
}, 'POST');

//Second Image
$Route->add("/update_blog/{id}/second_image", function ($id) {
    $Core = new Apps\Core();
    $Template = new Apps\Template();

    $secondImage = "";
    $second_image_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['secondImage']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/blog_posts/");

        if ($Uploader->processed) {
            $second_image_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $secondImage = $second_image_path_to_db;

    $sql = "UPDATE `blog_posts` SET `secondImage`='$secondImage' WHERE `id`='$id'";
    $newSecondImage = mysqli_query($Core->dbCon, $sql);

    if ($newSecondImage) {
        $Template->setError("Image Changed Successfully. <br />You can update the rest of the blog.", "success", "/admin/pages/all-blogs");
        $Template->redirect("/admin/pages/all-blogs");
    }
}, 'POST');

//Third Image
$Route->add("/update_blog/{id}/third_image", function ($id) {
    $Core = new Apps\Core();
    $Template = new Apps\Template();

    $thirdImage = "";
    $third_image_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['thirdImage']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/blog_posts/");

        if ($Uploader->processed) {
            $third_image_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $thirdImage = $third_image_path_to_db;

    $sql = "UPDATE `blog_posts` SET `thirdImage`='$thirdImage' WHERE `id`='$id'";
    $newThirdImage = mysqli_query($Core->dbCon, $sql);

    if ($newThirdImage) {
        $Template->setError("Image Changed Successfully. <br />You can update the rest of the blog.", "success", "/admin/pages/all-blogs");
        $Template->redirect("/admin/pages/all-blogs");
    }
}, 'POST');
//Update Blog by Admin-Change Images Ends


//Updating the Rest of the Blog
$Route->add("/update_blog/{id}", function ($id) {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->post($_POST);

    $heading = $data->heading;
    $postCreator = $data->postCreator;
    $shortDescription = $data->shortDescription;

    $firstContent = $data->firstContent;
    $secondContent = $data->secondContent;
    $thirdContent = $data->thirdContent;

    $blockQuote = $data->blockQuote;
    $quoteAuthor = $data->quoteAuthor;
    $videoLink = $data->videoLink;

    $secondImageHeading = $data->secondImageHeading;
    $thirdImageHeading = $data->thirdImageHeading;

    $updateBlog = (int)$Core->UpdateBlog($id, $heading, $postCreator, $shortDescription, $firstContent, $secondContent, $thirdContent, $blockQuote, $quoteAuthor, $videoLink, $secondImageHeading, $thirdImageHeading);

    if ($updateBlog) {
        $Template->setError("Your Blog was Updated", "success", "/admin/pages/admin-home");
        $Template->redirect("/admin/pages/admin-home");
    }

    $Template->setError("Something went wrong, and your blog didn't update", "warning", "/admin/pages/admin-home");
    $Template->redirect("/admin/pages/admin-home");
}, 'POST');


//Update Campaign by Admin
//Change Image
$Route->add("/update_campaign/{id}/image", function ($id) {
    $Core = new Apps\Core();
    $Template = new Apps\Template();

    $campaignImage = "";

    //Uploading New Campaign Pictures
    $campaignImage_path_to_db = "";

    $Uploader = new \Verot\Upload\Upload($_FILES['campaignImage']);

    if ($Uploader->uploaded) {
        $name = md5(time() . mt_rand(1, 10000));
        $Uploader->file_new_name_body = $name;
        $Uploader->process("./_store/campaigns/");

        if ($Uploader->processed) {
            $campaignImage_path_to_db = $Uploader->file_dst_pathname;
        } else {
        }
    }

    $campaignImage = $campaignImage_path_to_db;

    $sql = "UPDATE `campaigns` SET `campaignImage`='$campaignImage' WHERE `id`='$id'";
    $newCampaignImage = mysqli_query($Core->dbCon, $sql);

    if ($newCampaignImage) {
        $Template->setError("Image Changed Successfully. <br />You can update the rest of the campaign.", "success", "/admin/pages/all-campaigns");
        $Template->redirect("/admin/pages/all-campaigns");
    }

}, 'POST');

//Change Other Posts
$Route->add("/update_campaign/{id}", function ($id) {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->post($_POST);

    $campaignTopic = $data->campaignTopic;
    $campaignDescription = $data->campaignDescription;
    $campaignDetails = $data->campaignDetails;
    $startDate = $data->startDate;
    $endDate = $data->endDate;

    $newCampaign = (int)$Core->UpdateCampaign($id, $campaignTopic, $campaignDescription, $campaignDetails, $startDate, $endDate);

    if ($newCampaign) {
        $Template->setError("Your Campaign was updated successfully", "success", "/admin/pages/admin-home");
        $Template->redirect("/admin/pages/admin-home");
    }

    $Template->setError("Something went wrong, and your campmaign didn't update", "warning", "/admin/pages/admin-home");
    $Template->redirect("/admin/pages/admin-home");
}, 'POST');

//Delete Blog
$Route->add("/delete-blog/{id}", function ($id) {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $sql = "DELETE FROM `blog_posts` WHERE id = $id";
    $reviewDeleted = mysqli_query($Core->dbCon, $sql);

    if ($reviewDeleted) {
        $Template->setError("You have successfully removed this blog", "success", "/admin/pages/admin-home");
        $Template->redirect("/admin/pages/admin-home");
    }
}, 'POST');

//Delete Campaign
$Route->add("/delete-campaign/{id}", function ($id) {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $sql = "DELETE FROM `campaigns` WHERE id = $id";
    $reviewDeleted = mysqli_query($Core->dbCon, $sql);

    if ($reviewDeleted) {
        $Template->setError("You have successfully removed this campaign", "success", "/admin/pages/admin-home");
        $Template->redirect("/admin/pages/admin-home");
    }
}, 'POST');

//Delete User Review
$Route->add("/delete-review/{id}", function ($id) {
    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $sql = "DELETE FROM `pending_testimonial` WHERE id = $id";
    $reviewDeleted = mysqli_query($Core->dbCon, $sql);

    if ($reviewDeleted) {
        $Template->setError("You have successfully removed this review", "success", "/admin/pages/admin-home");
        $Template->redirect("/admin/pages/admin-home");
    }
}, 'POST');


