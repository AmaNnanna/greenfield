<?php

//Write your custome class/methods here
namespace Apps;

use \Apps\MysqliDb;
use \Apps\Session;
use mysqli;
use \Verot\UploadFiles;

class Core extends Model
{

	public $token = NULL;
	public $accid = NULL;
	public $toast = false;

	public function __construct()
	{
		parent::__construct();
	}

	public function GenPassword($length = 6)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function Passwordify($password)
	{
		$Passwordify = md5($password);
		return $Passwordify;
	}

	public function ToMoney($amount)
	{
		$amount = number_format($amount, 2, ".", ",");
		return "₦ " . $amount;
	}


	public function cleanup($text)
	{
		$text = preg_replace('/[\t\n\r\0\x0B]/', '', $text);
		$text = preg_replace('/([\s])\1+/', ' ', $text);
		$text = trim($text);
		return strtolower($text);
	}

	public function PostType($haystack, $i = "i", $word = "W")
	{
		$needle_need = "i need";
		$needle_have = "i have";
		if (strtoupper($word) == "W") {   // if $word is "W" then word search instead of string in string search.
			if (preg_match("/\b{$needle_need}\b/{$i}", $haystack)) {
				return "buying";
			}
			if (preg_match("/\b{$needle_have}\b/{$i}", $haystack)) {
				return "selling";
			}
		} else {
			if (preg_match("/{$needle_need}/{$i}", $haystack)) {
				return "buying";
			}
			if (preg_match("/{$needle_have}/{$i}", $haystack)) {
				return "selling";
			}
		}
		return "others";
		// Put quotes around true and false above to return them as strings instead of as bools/ints.
	}

	public static function slugify($string)
	{
		$table = array(
			'Š' => 'S', 'š' => 's', 'Đ' => 'Dj', 'đ' => 'dj', 'Ž' => 'Z', 'ž' => 'z', 'Č' => 'C', 'č' => 'c', 'Ć' => 'C', 'ć' => 'c',
			'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
			'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
			'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
			'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
			'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
			'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
			'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r', '/' => '-', ' ' => '-', ',' => '', '&' => 'and'
		);
		// -- Remove duplicated spaces
		$stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/', '/[^a-z0-9]/i'), ' ', $string);
		// -- Returns the slug

		return strtolower(strtr($string, $table));
	}

	//Collect Email for Newsletter
	public function NewsletterEmail($newsletterEmail){
		$sql = "INSERT INTO `newsletter_emails`(`newsletterEmail`) VALUES ('{$newsletterEmail}')";
		$addEmail = mysqli_query($this->dbCon, $sql);

		return $addEmail;
	}
	//Collect Email for Newsletter Ends

	//Create New User
	public function CreateNewUser($fullName, $email, $password){
		$newUser = mysqli_query($this->dbCon, "INSERT INTO users(fullName, email, password) VALUES ('$fullName', '$email', '$password')");

		return $newUser;
	}
	//Create New User Ends

	//User Login
	public function UserLogin($email, $password) {
		$sql = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
		$user = mysqli_query($this->dbCon, $sql);

		$login = mysqli_fetch_object($user);

		return $login;
	}
	//User Login Ends

	//Admin Login
	public function AdminLogin($email, $password) {
		$sql = "SELECT * FROM main_admin WHERE email = '{$email}' AND password = '{$password}'";
		$admin = mysqli_query($this->dbCon, $sql);

		$login = mysqli_fetch_object($admin);

		return $login;
	}
	//Admin Login Ends

	//Create New Blog
	public function CreateNewBlog($evetTitle, $startDate, $endDate, $eventDescription, $videoLink, $eventFee, $professionalLevel, $eventDuration, $eventOrganisers, $flyer, $videoImage) {

		$sql = "INSERT INTO events (evetTitle, startDate, endDate, eventDescription, videoLink, eventFee, professionalLevel, eventDuration, eventOrganisers, flyer, videoImage) VALUES ('$evetTitle', '$startDate', '$endDate', '$eventDescription', '$videoLink', '$eventFee', '$professionalLevel', '$eventDuration', '$eventOrganisers', '$flyer', '$videoImage')";

		$newBlog = mysqli_query($this->dbCon, $sql);

		return $newBlog;
	}
	//Create New Blog Ends

	//Registration Form
	public function EventRegistration($event_id, $sureName, $otherNames, $email, $mobileNumber, $jobTitle, $company, $businessNumber, $homeAddress, $country) {

		$sql = "INSERT INTO registrations (event_id, sureName, otherNames, email, mobileNumber, jobTitle, company, businessNumber, homeAddress, country) VALUES ('$event_id', '$sureName', '$otherNames', '$email', '$mobileNumber', '$jobTitle', '$company', '$businessNumber', '$homeAddress', '$country')";

		$registered = mysqli_query($this->dbCon, $sql);

		return $registered;
	}

	//Create New Campaign
	public function CreateNewCampaign($campaignTopic, $campaignDescription, $campaignDetails, $startDate, $endDate, $campaignImage) {

		$sql = "INSERT INTO campaigns (campaignTopic, campaignDescription, campaignDetails, startDate, endDate, campaignImage) VALUES ('$campaignTopic', '$campaignDescription', '$campaignDetails', '$startDate', '$endDate', '$campaignImage')";

		$newCampaign = mysqli_query($this->dbCon, $sql);

		return $newCampaign;
	}
	//Create New Campaign Ends

	//Update Existing Blog
	public function UpdateBlog($id, $heading, $postCreator, $shortDescription, $firstContent, $secondContent, $thirdContent, $blockQuote, $quoteAuthor, $videoLink, $secondImageHeading, $thirdImageHeading) {

		$sql = "UPDATE `blog_posts` SET `heading`=
		$heading', `postCreator`='$postCreator', `shortDescription`='$shortDescription', `firstContent`='$firstContent', `secondContent`='$secondContent', `thirdContent`='$thirdContent', `blockQuote`='$blockQuote', `quoteAuthor`='$quoteAuthor', `videoLink`='$videoLink', `secondImageHeading`='$secondImageHeading', `thirdImageHeading`='$thirdImageHeading' WHERE `id`='$id'";

		$blogUpdate = mysqli_query($this->dbCon, $sql);

		return $blogUpdate;
	}

	//Update Exiting Campaign
	public function UpdateCampaign($id, $campaignTopic, $campaignDescription, $campaignDetails, $startDate, $endDate) {

		$sql = "UPDATE `campaigns` SET `campaignTopic`='$campaignTopic',`campaignDescription`='$campaignDescription',`campaignDetails`='$campaignDetails',`startDate`='$startDate',`endDate`='$endDate' WHERE `id`='$id'";

		$campaignUpdate = mysqli_query($this->dbCon, $sql);

		return $campaignUpdate;
	}
	
}
