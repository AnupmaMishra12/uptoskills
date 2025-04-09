<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Faculty Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <h2>HR Dashboard</h2>
        <ul>
            <li><a href="#jobs">Jobs</a></li>
            <li><a href="#training">Training & Development</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h1>HR Faculty Dashboard</h1>
            <input type="text" placeholder="Search...">
        </header>
        <section id="jobs">
            <h2>Job Requirements</h2>
            <table>
                <tr>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Status</th>
                </tr>
                <?php
                $result = $conn->query("SELECT * FROM jobs");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>{$row['position']}</td><td>{$row['department']}</td><td>{$row['status']}</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No job listings available</td></tr>";
                }
                ?>
            </table>
        </section>
        <section id="training">
            <h2>Training & Development</h2>
            <div class="training-programs">
                <?php
                $result = $conn->query("SELECT * FROM training");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='program'>{$row['name']} - {$row['description']}</div>";
                    }
                } else {
                    echo "<div>No training programs available</div>";
                }
                ?>
            </div>
        </section>
    </div>
    <aside class="right-sidebar">
        <div class="calendar">
            <h2>Calendar</h2>
            <!-- Calendar Content Here -->
        </div>
        <div class="events">
            <h2>Upcoming Events</h2>
            <ul>
                <li>Faculty Meeting</li>
                <li>Training Session</li>
            </ul>
        </div>
        <div class="notice-board">
            <h2>Notice Board</h2>
            <ul>
                <li>Policy Update on April 10</li>
                <li>New Health Insurance Plans</li>
                <li>COVID-19 Safety Protocols</li>
            </ul>
        </div>
    </aside>
    <script src="scripts.js"></script>
</body>
</html>
<?php $conn->close(); ?>
