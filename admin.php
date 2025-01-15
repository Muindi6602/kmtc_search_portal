<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect data from the form
    $programme_code = $_POST['programme_code'];
    $campus = $_POST['campus'];
    $programme_name = $_POST['programme_name'];
    $mean_grade = $_POST['mean_grade'];
    $subject1 = $_POST['subject1'];
    $subject1_grade = $_POST['subject1_grade'];
    $subject2 = $_POST['subject2'];
    $subject2_grade = $_POST['subject2_grade'];
    $subject3 = $_POST['subject3'];
    $subject3_grade = $_POST['subject3_grade'];
    $subject4 = $_POST['subject4'];
    $subject4_grade = $_POST['subject4_grade'];

    // Insert into the database
    $sql = "INSERT INTO kcourses (programme_code, campus, programme_name, mean_grade, subject1, subject1_grade, subject2, subject2_grade, subject3, subject3_grade, subject4, subject4_grade)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssissississ",
        $programme_code,
        $campus,
        $programme_name,
        $mean_grade,
        $subject1,
        $subject1_grade,
        $subject2,
        $subject2_grade,
        $subject3,
        $subject3_grade,
        $subject4,
        $subject4_grade
    );

    if ($stmt->execute()) {
        echo "Course added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch all courses to display in the table
$sql = "SELECT * FROM kcourses";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="icon" type="image/webp" href="https://i.ibb.co/1v1dsnY/kmtc.webp">

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Admin Panel - Add Courses</h1>
    <form method="POST" action="">
        <label>Programme Code:</label>
        <input type="text" name="programme_code" required><br>

        <label>Campus:</label>
        <input type="text" name="campus" required><br>

        <label>Programme Name:</label>
        <input type="text" name="programme_name" required><br>

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
        </select><br>

        <label>Subject 1:</label>
        <input type="text" name="subject1"><br>
        <label>Subject 1 Grade:</label>
        <select name="subject1_grade">
            <option value="">Select Grade</option>
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
        </select><br>

        <label>Subject 2:</label>
        <input type="text" name="subject2"><br>
        <label>Subject 2 Grade:</label>
        <select name="subject2_grade">
            <option value="">Select Grade</option>
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
        </select><br>

        <label>Subject 3:</label>
        <input type="text" name="subject3"><br>
        <label>Subject 3 Grade:</label>
        <select name="subject3_grade">
            <option value="">Select Grade</option>
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
        </select><br>

        <label>Subject 4:</label>
        <input type="text" name="subject4"><br>
        <label>Subject 4 Grade:</label>
        <select name="subject4_grade">
            <option value="">Select Grade</option>
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

        <button type="submit">Add Course</button>
    </form>

    <h2>Existing Courses</h2>
    <table border="1">
        <tr>
            <th>Programme Code</th>
            <th>Campus</th>
            <th>Programme Name</th>
            <th>Mean Grade</th>
            <th>Subject 1</th>
            <th>Grade 1</th>
            <th>Subject 2</th>
            <th>Grade 2</th>
            <th>Subject 3</th>
            <th>Grade 3</th>
            <th>Subject 4</th>
            <th>Grade 4</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['programme_code']; ?></td>
                <td><?= $row['campus']; ?></td>
                <td><?= $row['programme_name']; ?></td>
                <td><?= $row['mean_grade']; ?></td>
                <td><?= $row['subject1']; ?></td>
                <td><?= $row['subject1_grade']; ?></td>
                <td><?= $row['subject2']; ?></td>
                <td><?= $row['subject2_grade']; ?></td>
                <td><?= $row['subject3']; ?></td>
                <td><?= $row['subject3_grade']; ?></td>
                <td><?= $row['subject4']; ?></td>
                <td><?= $row['subject4_grade']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
