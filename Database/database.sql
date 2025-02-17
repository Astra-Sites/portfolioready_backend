create Database portfolioready;

use portfolioready;




CREATE TABLE `users` (
  `SN` int NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'images/pic-1.jpg',
  `User_Role` varchar(100) DEFAULT 'user',
  `Pass` varchar(255) NOT NULL,
  `Reg_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE user_tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL unique,
    token VARCHAR(255) NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    google_classroom_id VARCHAR(255) UNIQUE,
    title VARCHAR(255) NOT NULL,
    section VARCHAR(255) DEFAULT NULL,
    description TEXT DEFAULT NULL,
    room VARCHAR(255) DEFAULT NULL,
    owner_id VARCHAR(255) DEFAULT NULL,
    creation_time DATETIME DEFAULT NULL,
    update_time DATETIME DEFAULT NULL,
    enrollment_code VARCHAR(255) DEFAULT NULL,
    course_state ENUM('active', 'archived') DEFAULT 'active',
    alternate_link VARCHAR(255) DEFAULT NULL,
    teacher_group_email VARCHAR(255) DEFAULT NULL,
    course_group_email VARCHAR(255) DEFAULT NULL,
    calendar_id VARCHAR(255) DEFAULT NULL,
    instructor_SN INT DEFAULT NULL,
    picture_url VARCHAR(255) DEFAULT NULL,
    start_date DATE DEFAULT NULL,
    end_date DATE DEFAULT NULL,
    status ENUM('active', 'archived') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (instructor_SN) REFERENCES users(SN) ON DELETE SET NULL
);





CREATE TABLE enrollments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_id INT NOT NULL, -- References courses(id)
    student_SN INT NOT NULL, -- References users(SN)
    google_enrollment_id VARCHAR(255) UNIQUE, -- Google Classroom Enrollment ID (NULL for manual enrollments)
    enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    completion_status ENUM('not_started', 'in_progress', 'completed') DEFAULT 'not_started',
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (student_SN) REFERENCES users(SN) ON DELETE CASCADE
);



CREATE TABLE units (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_id INT NOT NULL, -- References courses(id)
    title VARCHAR(255) NOT NULL,
    description TEXT,
    position INT NOT NULL, -- Order of units in the course
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);





CREATE TABLE lessons (
    id INT PRIMARY KEY AUTO_INCREMENT,
    unit_id INT NOT NULL, -- References units(id)
    title VARCHAR(255) NOT NULL,
    description TEXT,
    position INT NOT NULL, -- Order of lessons in the unit
    video_url VARCHAR(500) DEFAULT NULL, -- Optional lesson video
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (unit_id) REFERENCES units(id) ON DELETE CASCADE
);



CREATE TABLE activities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lesson_id INT NOT NULL, -- References lessons(id)
    title VARCHAR(255) NOT NULL,
    type ENUM('quiz', 'coding', 'discussion', 'reading') NOT NULL,
    content TEXT, -- Description or instructions
    coding_template TEXT DEFAULT NULL, -- Pre-filled code (if coding activity)
    quiz_questions JSON DEFAULT NULL, -- JSON for quiz questions
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (lesson_id) REFERENCES lessons(id) ON DELETE CASCADE
);



CREATE TABLE progress (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_SN INT NOT NULL, -- References users(SN)
    activity_id INT NOT NULL, -- References activities(id)
    status ENUM('not_started', 'in_progress', 'completed') DEFAULT 'not_started',
    score INT DEFAULT NULL, -- For quizzes or coding challenges
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_SN) REFERENCES users(SN) ON DELETE CASCADE,
    FOREIGN KEY (activity_id) REFERENCES activities(id) ON DELETE CASCADE
);



CREATE TABLE submissions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_SN INT NOT NULL, -- References users(SN)
    activity_id INT NOT NULL, -- References activities(id)
    submission_code TEXT, -- Submitted code for coding activities
    file_url VARCHAR(500) DEFAULT NULL, -- If external file submission
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    score INT DEFAULT NULL, -- NULL means not yet graded
    FOREIGN KEY (student_SN) REFERENCES users(SN) ON DELETE CASCADE,
    FOREIGN KEY (activity_id) REFERENCES activities(id) ON DELETE CASCADE
);
