<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_system"; // changed from contact_db

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}

$sql = "SELECT Name, Email, Subject, Message FROM contacts_messages";
$result = $conn->query($sql);

echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">';
echo "<div class='container mt-5' style='max-width:900px;'>";
echo "<h2>Admin: Messages from Home.html</h2>";
echo "<a href='Home.html' class='btn btn-secondary mb-3'>Back to Home</a>";

if ($result->num_rows > 0) {
  echo '<table class="table table-bordered">';
  echo '<tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th></tr>';
  while($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row["Name"]) . '</td>';
    echo '<td>' . htmlspecialchars($row["Email"]) . '</td>';
    echo '<td>' . htmlspecialchars($row["Subject"]) . '</td>';
    echo '<td>' . nl2br(htmlspecialchars($row["Message"])) . '</td>';
    echo '</tr>';
  }
  echo '</table>';
} else {
  echo "<div class='alert alert-info'>No messages found.</div>";
}
echo "</div>";

$conn->close();
?>
