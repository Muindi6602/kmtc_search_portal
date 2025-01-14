<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KMTC Course Finder</title>
    <link rel="icon" type="image/webp" href="https://i.ibb.co/1v1dsnY/kmtc.webp">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Reset and base styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: #f9f9f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        h1 {
            text-align: center;
            font-size: 2rem;
            color: #004080;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h3 {
            margin-bottom: 15px;
            color: #0066cc;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 0.9rem;
            cursor: pointer;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #0066cc;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #004080;
        }
    </style>
</head>
<body>
    <div>
        <form id="subjectForm" method="POST" action="select_grades.php">
            <h3>Select your Kcse subjects</h3>
            <?php
            $subjects = ["Math", "English", "Kiswahili", "Biology", "Chemistry", "Physics", "CRE", "IRE", "Geography", "History", "Agriculture", "Business", "Computer Studies", "Home Science"];
            foreach ($subjects as $subject) {
                echo "<label><input type='checkbox' name='subjects[]' value='$subject'> $subject</label>";
            }
            ?>
            <button type="button" id="submitButton">Next</button>
        </form>
    </div>

    <script>
        document.getElementById('submitButton').addEventListener('click', function () {
            const selectedSubjects = document.querySelectorAll('input[name="subjects[]"]:checked');
            
            if (selectedSubjects.length < 7) {
                Swal.fire({
                    icon: 'error',
                    title: 'Selection Error',
                    text: 'You must select at least 7 subjects.',
                });
            } else {
                document.getElementById('subjectForm').submit();
            }
        });
    </script>
</body>
</html>
