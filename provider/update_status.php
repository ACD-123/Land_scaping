<?php
// Include your database connection script
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data as JSON from the request body
    $postData = json_decode(file_get_contents('php://input'));

    // Validate the data
    if (isset($postData->proposalId) && isset($postData->status)) {
        // Extract proposal ID and new status
        $proposalId = $postData->proposalId;
        $status = $postData->status;

        // Update the status in the customer_proposal table
        $sql = "UPDATE customer_proposal SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $status, $proposalId);

        if ($stmt->execute()) {
            echo 'Status updated successfully.';
        } else {
            echo 'Error updating status: ' . $stmt->error;
        }
    } else {
        echo 'Invalid data.';
    }
} else {
    echo 'Invalid request method.';
}
?>
