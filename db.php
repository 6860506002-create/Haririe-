<?php
$host = "mariadb";
$user = "root";
$password = "root";
$database = "trees_db";

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli($host, $user, $password);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ: " . $conn->connect_error);
}

// สร้างฐานข้อมูลถ้ายังไม่มี
$sql = "CREATE DATABASE IF NOT EXISTS $database";
$conn->query($sql);

// เลือกฐานข้อมูล
$conn->select_db($database);

// สร้างตาราง (ตามโจทย์ CREATE TABLE)
$table = "CREATE TABLE IF NOT EXISTS trees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
    echo "สร้างตารางสำเร็จ";
} else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
}

$conn->close();
?>
