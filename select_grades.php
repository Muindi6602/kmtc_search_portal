<?php
if (!isset($_POST['subjects']) || empty($_POST['subjects'])) {
    header("Location: index.php?error=Please select at least seven subjects.");
    exit();
}
 
$selectedSubjects = $_POST['subjects'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Grades</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Select Grades for Your Subjects</h1>
    <form method="POST" action="process.php">
        <?php
        foreach ($selectedSubjects as $subject) {
            echo "<label>$subject:</label>
                  <select name='grades[$subject]' required>
                      <option value=''>Select Grade</option>
                      <option value='12'>A</option>
                      <option value='11'>A-</option>
                      <option value='10'>B+</option>
                      <option value='9'>B</option>
                      <option value='8'>B-</option>
                      <option value='7'>C+</option>
                      <option value='6'>C</option>
                      <option value='5'>C-</option>
                      <option value='4'>D+</option>
                      <option value='3'>D</option>
                      <option value='2'>D-</option>
                      <option value='1'>E</option>
                  </select><br>";
        }
        ?>
        <label>Mean Grade:</label>
        <select name="mean_grade" required>
            <option value="">Select Mean Grade</option>
            <option value="12">A</option>
            <option value="11">A-</option>
            <option value="10">B+</option>
            <option value="9">B</option>
            <option value="8">B-</option>
            <option value="7">C+</option>
            <option value="6">C</option>
            <option value="5">C-</option>
            <option value="4">D+</option>
            <option value="3">D</option>
            <option value="2">D-</option>
            <option value="1">E</option>
        </select><br><br>
        <button type="submit">Get Courses</button>
    </form>
</body>
</html>
