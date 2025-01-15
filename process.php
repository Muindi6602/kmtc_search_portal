<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $grades = $_POST['grades'];
    $mean_grade = $_POST['mean_grade'];
    $results = "<table border='1'><tr><th>Course</th><th>Campus</th><th>Code</th></tr>";

    $sql = "SELECT * FROM kcourses WHERE mean_grade <= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $mean_grade);
    $stmt->execute();
    $courses = $stmt->get_result();

    while ($course = $courses->fetch_assoc()) {
        $valid = true;
        for ($i = 1; $i <= 4; $i++) {
            $subject = $course["subject$i"];
            $grade = $course["subject{$i}_grade"];

            if (strpos($subject, '/') !== false) {
                $alternative_subjects = explode('/', $subject);
                $subject_met = false;

                foreach ($alternative_subjects as $alternative) {
                    if (isset($grades[$alternative]) && $grades[$alternative] >= $grade) {
                        $subject_met = true;
                        break;
                    }
                }

                if (!$subject_met) {
                    $valid = false;
                    break;
                }
            } else {
                if (!isset($grades[$subject]) || $grades[$subject] < $grade) {
                    $valid = false;
                    break;
                }
            }
        }
        if ($valid) {
            $results .= "<tr>
                <td><strong style='color: #007BFF; font-size: small;'>{$course['programme_name']}</strong></td>
                <td><strong style='color: black; font-size: small;'>{$course['campus']}</strong></td>
                <td><strong style='color: black; font-size: small;'>{$course['programme_code']}</strong></td>

            </tr>";
        }
    }
    $results .= "</table>";
} else {
    $results = "<p>No courses available to display.</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KMTC Courses</title>
    <link rel="icon" type="image/webp" href="https://i.ibb.co/1v1dsnY/kmtc.webp">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #f0f0f0;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header .btn {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-diploma {
            background-color: blue;
            color: white;
        }

        .btn-certificate {
            background-color: green;
            color: white;
        }

        #search-bar {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .table-container {
            margin: 20px;
        }
    </style>
    <script>
        function filterCourses(type) {
            const rows = document.querySelectorAll("table tr");
            rows.forEach((row, index) => {
                if (index === 0) return; // Skip header row
                const programmeName = row.cells[0]?.textContent.toLowerCase();
                if (type === 'diploma' && !programmeName?.startsWith('diploma')) {
                    row.style.display = 'none';
                } else if (type === 'certificate' && !programmeName?.startsWith('certificate')) {
                    row.style.display = 'none';
                } else {
                    row.style.display = '';
                }
            });
        }

        function searchCourses() {
            const query = document.getElementById("search-bar").value.toLowerCase();
            const rows = document.querySelectorAll("table tr");
            rows.forEach((row, index) => {
                if (index === 0) return; // Skip header row
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        }
    </script>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <button class="btn btn-diploma" onclick="filterCourses('diploma')">Select Diploma Only</button>
        <button class="btn btn-certificate" onclick="filterCourses('certificate')">Select Certificate Only</button>
        <input type="text" id="search-bar" placeholder="Search courses..." oninput="searchCourses()">
    </div>
    
    <!-- Table Section -->
    <div class="table-container">
        <?php echo $results; ?>
    </div>
</body>
</html>
