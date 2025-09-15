<?php
// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $role = $_POST['role'];
    $description = $_POST['description'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $website = $_POST['website'];

    // Process the image upload
    $imageDir = 'uploads/';
    $imageFile = $imageDir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $imageFile);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Our Team</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

    <!-- Form to add a new team member -->
    <h1>Add a New Team Member</h1>

    <form action="team_page.php" method="POST" enctype="multipart/form-data">
        <label for="name">Full Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="role">Role:</label><br>
        <input type="text" id="role" name="role" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="website">Website:</label><br>
        <input type="text" id="website" name="website" required><br><br>

        <label for="image">Profile Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <button type="submit">Add Team Member</button>
    </form>

    <hr>

    <!-- Display the newly added team member -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h1>Meet Our Team</h1>
        <div class="team-container">
            <div class="team-card">
                <img src="<?php echo $imageFile; ?>" alt="<?php echo htmlspecialchars($name); ?>" />
                <h3><?php echo htmlspecialchars($name); ?></h3>
                <p class="role"><?php echo htmlspecialchars($role); ?></p>
                <p class="desc"><?php echo nl2br(htmlspecialchars($description)); ?></p>
                <p class="contact">
                    📞 <?php echo htmlspecialchars($phone); ?><br />
                    📧 <?php echo htmlspecialchars($email); ?><br />
                    🌐 <?php echo htmlspecialchars($website); ?>
                </p>
                <div class="social">
                    <a href="#"><img src="/icon/linkedin-48.png" alt="LinkedIn" /></a>
                    <a href="#"><img src="/icon/facebook-logo-48.png" alt="Facebook" /></a>
                    <a href="#"><img src="/icon/twitter-50.png" alt="Twitter" /></a>
                </div>
            </div>
        </div>
    <?php endif; ?>

</body>
</html>
