<?php
session_start(); // Start session to access user_id
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db_connection.php';

try {
    $conn = get_db_connection();
    if (!$conn) {
        throw new Exception('Database connection failed');
    }

    $action = $_GET['action'] ?? '';

    switch ($action) {
        case 'get_moderators':
            $result = $conn->query('SELECT id, name, email, created_date FROM moderator ORDER BY created_date DESC');
            if (!$result) {
                throw new Exception('Query failed: ' . $conn->error);
            }
            $moderators = [];
            while ($row = $result->fetch_assoc()) {
                $moderators[] = $row;
            }
            echo json_encode($moderators);
            break;

        case 'add_moderator':
            $data = json_decode(file_get_contents('php://input'), true);
            if (!isset($data['name'], $data['email'], $data['password']) || empty($data['name']) || empty($data['email']) || empty($data['password'])) {
                throw new Exception('All fields are required');
            }

            // Validate email contains moderator@gmail
            if (strpos($data['email'], 'moderator@gmail') === false) {
                throw new Exception('Email must contain "moderator@gmail"');
            }

            // Check for duplicate email
            $stmt = $conn->prepare('SELECT id FROM moderator WHERE email = ?');
            if (!$stmt) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }
            $stmt->bind_param('s', $data['email']);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                throw new Exception('Email already exists');
            }
            $stmt->close();

            // Insert new moderator
            $stmt = $conn->prepare('INSERT INTO moderator (name, email, password, created_date) VALUES (?, ?, ?, NOW())');
            if (!$stmt) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $data['name'], $data['email'], $hashed_password);
            if (!$stmt->execute()) {
                throw new Exception('Execute failed: ' . $stmt->error);
            }
            echo json_encode(['success' => true, 'id' => $conn->insert_id, 'message' => 'Moderator created successfully']);
            $stmt->close();
            break;

        case 'update_moderator':
            $data = json_decode(file_get_contents('php://input'), true);
            if (!isset($data['id'], $data['name'], $data['email']) || empty($data['id']) || empty($data['name']) || empty($data['email'])) {
                throw new Exception('ID, name, and email are required');
            }

            // Validate email contains moderator@gmail
            if (strpos($data['email'], 'moderator@gmail') === false) {
                throw new Exception('Email must contain "moderator@gmail"');
            }

            // Check for duplicate email (excluding current moderator)
            $stmt = $conn->prepare('SELECT id FROM moderator WHERE email = ? AND id != ?');
            if (!$stmt) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }
            $stmt->bind_param('si', $data['email'], $data['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                throw new Exception('Email already exists');
            }
            $stmt->close();

            // Update moderator
            if (!empty($data['password'])) {
                $sql = 'UPDATE moderator SET name = ?, email = ?, password = ? WHERE id = ?';
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    throw new Exception('Prepare failed: ' . $conn->error);
                }
                $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('sssi', $data['name'], $data['email'], $hashed_password, $data['id']);
            } else {
                $sql = 'UPDATE moderator SET name = ?, email = ? WHERE id = ?';
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    throw new Exception('Prepare failed: ' . $conn->error);
                }
                $stmt->bind_param('ssi', $data['name'], $data['email'], $data['id']);
            }
            
            if (!$stmt->execute()) {
                throw new Exception('Execute failed: ' . $stmt->error);
            }
            echo json_encode(['success' => true, 'message' => 'Moderator updated successfully']);
            $stmt->close();
            break;

        case 'delete_moderator':
            $data = json_decode(file_get_contents('php://input'), true);
            if (!isset($data['id']) || empty($data['id'])) {
                throw new Exception('ID is required');
            }

            $stmt = $conn->prepare('DELETE FROM moderator WHERE id = ?');
            if (!$stmt) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }
            $stmt->bind_param('i', $data['id']);
            if (!$stmt->execute()) {
                throw new Exception('Execute failed: ' . $stmt->error);
            }
            echo json_encode(['success' => true, 'message' => 'Moderator deleted successfully']);
            $stmt->close();
            break;

        case 'get_user':
            if (!isset($_SESSION['user_id'])) {
                throw new Exception('User not logged in');
            }
            $stmt = $conn->prepare('SELECT email, first_name, last_name FROM users WHERE user_id = ?');
            if (!$stmt) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }
            $stmt->bind_param('i', $_SESSION['user_id']);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows === 0) {
                throw new Exception('User not found');
            }
            $user = $result->fetch_assoc();
            echo json_encode(['success' => true, 'users' => $user]);
            $stmt->close();
            break;

        default:
            throw new Exception('Invalid action');
    }
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>