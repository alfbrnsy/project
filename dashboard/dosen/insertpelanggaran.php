<?php
session_start();
include "../../config/database.php"; // Adjust this if needed

// Ensure user is logged in and retrieve the lecturer's ID
if (!isset($_SESSION['id_lecturer'])) {
    die('User is not logged in.');
}

$id_lecturer = $_SESSION['id_lecturer']; // Get the correct session key for lecturer

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $student_name = $_POST['nama'];
    $violation_details = $_POST['keterangan'];
    $proof = null;

    // Check if text proof is provided
    if (!empty($_POST['bukti_text'])) {
        $proof = $_POST['bukti_text'];
    }

    // Check if file proof is uploaded
    if (isset($_FILES['bukti_file']) && $_FILES['bukti_file']['error'] == 0) {
        $proof_name = time() . "_" . $_FILES['bukti_file']['name'];
        $proof = "uploads/" . $proof_name;
        move_uploaded_file($_FILES['bukti_file']['tmp_name'], $proof);
    }

    // Fetch the id_student based on student_name (this is an example, adjust logic if needed)
    $sqlStudent = "SELECT id_student FROM tb_student WHERE name = ?";
    $stmtStudent = sqlsrv_query($conn, $sqlStudent, array($student_name));

    if ($stmtStudent && sqlsrv_has_rows($stmtStudent)) {
        $student = sqlsrv_fetch_array($stmtStudent, SQLSRV_FETCH_ASSOC);
        $id_student = $student['id_student']; // Get the id_student from the result
    } else {
        // If no student is found, show an error
        die("Error: Student not found.");
    }

    // Prepare SQL Query for inserting violation data into tb_report
    $sql = "INSERT INTO tb_report (id_student, id_lecturer, violation_details, proof, status, id_verifier) 
            VALUES (?, ?, ?, ?, 'pending', ?)";

    // Use sqlsrv_query with parameter binding
    $params = array($id_student, $id_lecturer, $violation_details, $proof, $id_lecturer);
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query was successful
    if ($stmt) {
        // Redirect to the dashboard after successful insertion
        header("Location: dashboarddosen.html");
        exit();
    } else {
        // Error handling
        die("Error: " . print_r(sqlsrv_errors(), true));
    }
}
?>

<form action="insertpelanggaran.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama Lengkap Mahasiswa</label>
        <input type="text" id="nama" name="nama" placeholder="Isi Nama Lengkap" required>
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan Pelanggaran</label>
        <textarea id="keterangan" name="keterangan" rows="4" placeholder="Deskripsi Pelanggaran" required></textarea>
    </div>

    <div class="form-group">
        <label for="bukti">Bukti Pelanggaran (Opsional)</label>
        <input type="text" id="bukti_text" name="bukti_text" placeholder="Tulis Bukti (Opsional)">
        <span>atau</span>
        <input type="file" id="bukti_file" name="bukti_file" accept=".jpg,.jpeg,.png,.pdf">
    </div>
    
    <button type="submit" class="btn-submit">Submit Pelanggaran</button>
</form>
