<?php
header('Content-Type: application/json');

if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || empty($_POST['subject']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo json_encode(['success' => false, 'message' => 'Please fill out all fields and provide a valid email.']);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$message = strip_tags(htmlspecialchars($_POST['subject']));

$to = "geomonbabu77@gmail.com"; // Replace with your email address
$subject = "$subject";
$body = "You have received a new message from your website message box.\n\n" .
  "Here are the details:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message";
$headers = "From: $email\n";
$headers .= "Reply-To: $email";

if (mail($to, $subject, $body, $headers)) {
  echo json_encode(['success' => true, 'message' => 'Your message has been sent successfully!']);
} else {
  echo json_encode(['success' => false, 'message' => 'An error occurred while sending your message. Please try again later.']);
}
