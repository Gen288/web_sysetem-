<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_system"; // new database

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  echo json_encode(['success' => false, 'error' => 'DB connection failed: ' . $conn->connect_error]);
  exit;
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

if (empty($name) || empty($email) || empty($subject) || empty($message)) {
  echo json_encode(['success' => false, 'error' => 'All fields required']);
  exit;
}

$sql = "INSERT INTO contacts_messages (Name, Email, Subject, Message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
  echo json_encode(['success' => false, 'error' => 'Prepare failed: ' . $conn->error]);
  $conn->close();
  exit;
}
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false, 'error' => 'Execute failed: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
