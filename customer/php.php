<?php
// Include your database connection script
include 'connection.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data as JSON from the request body
    $postData = json_decode(file_get_contents('php://input'));

    // Validate the data
    if (isset($postData->customerId) && isset($postData->selectedDate) && isset($postData->selectedTime) && isset($postData->userContent) && isset($postData->selectedServices) && isset($postData->totalAmount)) {
        // Extract customer ID, selected date, selected time, user content, selected services, and total amount
        $customerId = $postData->customerId;
        $selectedDate = $postData->selectedDate;
        $selectedTime = $postData->selectedTime;
        $userContent = $postData->userContent;
        $selectedServices = implode(', ', $postData->selectedServices); // Convert array to a comma-separated string
        $totalAmount = $postData->totalAmount;

        // Insert data into your MySQL database, including services and total amount
        $sql = "INSERT INTO customer_proposal (customer_id, year, month, day, selected_time, user_content, selected_services, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters with appropriate data types
        $stmt->bind_param('sssssssd', $customerId, $selectedDate->year, $selectedDate->month, $selectedDate->day, $selectedTime, $userContent, $selectedServices, $totalAmount);

        if ($stmt->execute()) {
            echo 'Data inserted successfully.';
        } else {
            echo 'Error inserting data: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'Invalid data.';
    }
} else {
    echo 'Invalid request method.';
}
?>
