<?php
$servername = "localhost";
$username = "jvincent15";
$password = "jvincent15";
$dbname = "jvincent15";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS MedicalProfessional (
    professional_id INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    Role ENUM('Doctor', 'Nurse') NOT NULL)";

if ($conn->query($sql) === TRUE) {
    echo "Table MedicalProfessional created successfully";
} else {

}

$sql = "CREATE TABLE IF NOT EXISTS Doctor (
    doctor_id INT AUTO_INCREMENT PRIMARY KEY,
    professional_id INT,
    Department VARCHAR(100),
    FOREIGN KEY (professional_id) REFERENCES MedicalProfessional(professional_id)
)";

if ($conn->query($sql) === TRUE) {
} else {
//table already exists
}

$sql = "CREATE TABLE IF NOT EXISTS Nurse (
    nurse_id INT AUTO_INCREMENT PRIMARY KEY,
    professional_id INT,
    nurse_grade VARCHAR(50),
    FOREIGN KEY (professional_id) REFERENCES MedicalProfessional(professional_id)
)";

if ($conn->query($sql) === TRUE) {
} else {
//table already exists
}

$sql = "CREATE TABLE IF NOT EXISTS patients (
    patient_id INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    dob DATE,
    ssn VARCHAR(11),
    Diagnosis VARCHAR(100),
    phone VARCHAR(15)
)";

if ($conn->query($sql) === TRUE) {
} else {
//table already exists
}

$sql = "CREATE TABLE IF NOT EXISTS Hospital (
    HospitalID INT AUTO_INCREMENT PRIMARY KEY,
    HospitalName VARCHAR(100) NOT NULL,
    Address VARCHAR(255) NOT NULL,
    NumberOfEmployees INT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
} else {
//table already exists
}

$sql = "CREATE TABLE IF NOT EXISTS Appointments (
    AppointmentID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT NOT NULL,
    DoctorID INT NOT NULL,
    AppointmentDate DATETIME NOT NULL
)";

if ($conn->query($sql) === TRUE) {
} else {
//table already exists
}
$conn->close();
?> 