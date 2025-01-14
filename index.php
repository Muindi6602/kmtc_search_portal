<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KMTC Search Portal</title>
    <link rel="icon" type="image/webp" href="https://i.ibb.co/1v1dsnY/kmtc.webp">

    <style>
        /* Base styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #004080, #00bfff);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        h3 {
            margin-bottom: 30px;
            font-size: 1.2rem;
            color: #d9edf7;
        }

        .get-started {
            display: inline-block;
            margin: 20px 0;
            padding: 15px 30px;
            background: #ffcc00;
            color: #004080;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(255, 204, 0, 0.5);
            transition: all 0.3s ease-in-out;
            animation: glow 1.5s infinite alternate;
        }

        .get-started:hover {
            background: #ffe066;
            box-shadow: 0 0 30px rgba(255, 204, 0, 0.8);
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 20px rgba(255, 204, 0, 0.5);
            }
            to {
                box-shadow: 0 0 40px rgba(255, 204, 0, 1);
            }
        }

        .reasons {
            margin-top: 40px;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            max-width: 600px;
        }

        .reasons h2 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #ffcc00;
        }

        .reasons p {
            font-size: 1rem;
            line-height: 1.6;
            color: #e0f7fa;
        }

        footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #d9edf7;
        }
    </style>
</head>
<body>
    <h2><strong>Welcome to KMTC Search Portal</strong></h2>
    <h3>Your ultimate companion for finding Kmtc courses tailored to your grades</h3>
    <a href="subjects.php" class="get-started">Get Started</a>
    <div class="reasons">
        <h2>Why this portal?</h2>
        <p>This portal is designed to help students efficiently identify all the kmtc courses they have qualified by there Kcse grades.</p>
        <p>Designed with passion by <strong><a href="https://wa.me/254115783375" target="_blank" class="no-underline">Joseph Muindi</a></strong> and <strong><a href="https://wa.me/254746193590" target="_blank" class="no-underline">David Ndeleva</a></strong>.</p>

<style>
    /* Remove underline from links */
    .no-underline {
        text-decoration: none;
    }
</style>
        </div>
    <footer>&copy; <span id="year"></span> KMTC Search Portal. All rights reserved.</footer>

<script>
    // Automatically set the current year
    document.getElementById('year').textContent = new Date().getFullYear();
</script>
</body>
</html>
