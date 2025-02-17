<?php
require '../../vendor/autoload.php';

if (!isset($_COOKIE['access_token'])) {
    die("Authorization required. <a href='auth.php'>Login with Google</a>");
}

$client = new Google_Client();
$client->setAuthConfig('credentials.json');
$client->setAccessToken(json_decode($_COOKIE['access_token'], true));

$classroom = new Google_Service_Classroom($client);

function getCourses($classroom) {
    include '../../Database/db.php'; // Database connection

    $courses = $classroom->courses->listCourses()->getCourses();
    if (empty($courses)) {
        return "<div class='alert alert-warning'>No courses found.</div>";
    }

    // Prepare the SQL query
    $stmt = $conn->prepare("
        INSERT INTO courses 
        (google_classroom_id, title, section, description, room, owner_id, creation_time, update_time, enrollment_code, course_state, alternate_link, teacher_group_email, course_group_email, calendar_id, instructor_SN, picture_url, start_date, end_date, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) 
        ON DUPLICATE KEY UPDATE 
        title = VALUES(title), 
        section = VALUES(section),
        description = VALUES(description), 
        room = VALUES(room),
        owner_id = VALUES(owner_id),
        creation_time = VALUES(creation_time),
        update_time = VALUES(update_time),
        enrollment_code = VALUES(enrollment_code),
        course_state = VALUES(course_state),
        alternate_link = VALUES(alternate_link),
        teacher_group_email = VALUES(teacher_group_email),
        course_group_email = VALUES(course_group_email),
        calendar_id = VALUES(calendar_id),
        instructor_SN = VALUES(instructor_SN), 
        picture_url = VALUES(picture_url), 
        start_date = VALUES(start_date), 
        end_date = VALUES(end_date), 
        status = VALUES(status)
    ");

    // Helper function to convert ISO 8601 to MySQL datetime
    function formatDateTime($isoDate) {
        return $isoDate ? date('Y-m-d H:i:s', strtotime($isoDate)) : null;
    }

    foreach ($courses as $course) {
        $google_classroom_id = $course->getId();
        $title = $course->getName();
        $section = $course->getSection() ?: null; // Handle NULLs
        $description = $course->getDescription() ?: null;
        $room = $course->getRoom() ?: null;
        $owner_id = $course->getOwnerId() ?: null;
        $creation_time = formatDateTime($course->getCreationTime());
        $update_time = formatDateTime($course->getUpdateTime());
        $enrollment_code = $course->getEnrollmentCode() ?: null;
        $course_state = $course->getCourseState();
        $alternate_link = $course->getAlternateLink() ?: null;
        $teacher_group_email = $course->getTeacherGroupEmail() ?: null;
        $course_group_email = $course->getCourseGroupEmail() ?: null;
        $calendar_id = $course->getCalendarId() ?: null;

        $instructor_SN = null;  // Fetch this if needed
        $picture_url = null;    // Optional
        $start_date = null;     // Optional
        $end_date = null;       // Optional
        $status = $course_state == 'ACTIVE' ? 'active' : 'archived';

        $stmt->bind_param(
            "sssssssssssssssssss", 
            $google_classroom_id, 
            $title, 
            $section, 
            $description, 
            $room, 
            $owner_id, 
            $creation_time, 
            $update_time, 
            $enrollment_code, 
            $course_state, 
            $alternate_link, 
            $teacher_group_email, 
            $course_group_email, 
            $calendar_id, 
            $instructor_SN, 
            $picture_url, 
            $start_date, 
            $end_date, 
            $status
        );

        if (!$stmt->execute()) {
            echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
        }
    }

    $stmt->close();
    $conn->close();

    return displayCourses($courses);
}

function displayCourses($courses) {
    $output = '
    <h2 class="mb-4">Courses</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Section</th>
                    <th>Description</th>
                    <th>Room</th>
                    <th>Owner ID</th>
                    <th>Creation Time</th>
                    <th>Update Time</th>
                    <th>Enrollment Code</th>
                    <th>Course State</th>
                    <th>Alternate Link</th>
                    <th>Teacher Group Email</th>
                    <th>Course Group Email</th>
                    <th>Calendar ID</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($courses as $course) {
        $output .= "<tr>
            <td>{$course->getName()}</td>
            <td>{$course->getId()}</td>
            <td>{$course->getSection()}</td>
            <td>{$course->getDescription()}</td>
            <td>{$course->getRoom()}</td>
            <td>{$course->getOwnerId()}</td>
            <td>" . htmlspecialchars($course->getCreationTime()) . "</td>
            <td>" . htmlspecialchars($course->getUpdateTime()) . "</td>
            <td>{$course->getEnrollmentCode()}</td>
            <td>{$course->getCourseState()}</td>
            <td><a href='{$course->getAlternateLink()}' target='_blank' class='btn btn-sm btn-primary'>View</a></td>
            <td>{$course->getTeacherGroupEmail()}</td>
            <td>{$course->getCourseGroupEmail()}</td>
            <td>{$course->getCalendarId()}</td>
        </tr>";
    }

    $output .= '</tbody></table></div>';
    return $output;
}

echo getCourses($classroom);
?>
