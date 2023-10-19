<?php
// Include your database connection script
include 'connection.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data as JSON from the request body
    $postData = json_decode(file_get_contents('php://input'));

    // Validate the data
    if (
        isset($postData->customerId) &&
        isset($postData->providerId) &&
        isset($postData->selectedDate) &&
        isset($postData->selectedTime) &&
        isset($postData->userContent) &&
        isset($postData->selectedServices) &&
        isset($postData->totalAmount) &&
        isset($postData->images) // Check if images are provided
    ) {
        // Extract customer ID, provider ID, selected date, selected time, user content, selected services, total amount, and images
        $customerId = $postData->customerId;
        $providerId = $postData->providerId;
        $selectedDate = $postData->selectedDate;
        $selectedTime = $postData->selectedTime;
        $userContent = $postData->userContent;
        $selectedServices = implode(', ', $postData->selectedServices);
        $totalAmount = $postData->totalAmount;
        $images = $postData->images; // Extract images

        // Insert data into your customer_proposal table (as before)
        $sql = "INSERT INTO customer_proposal (customer_id, provider_id, year, month, day, selected_time, user_content, selected_services, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters with appropriate data types
        $stmt->bind_param('ssssssssd', $customerId, $providerId, $selectedDate->year, $selectedDate->month, $selectedDate->day, $selectedTime, $userContent, $selectedServices, $totalAmount);

        if ($stmt->execute()) {
            // Inserted successfully, get the last inserted ID
            $proposalId = $stmt->insert_id;
            
            // Insert images into the customer_images table
            foreach ($images as $imagePath) {
                $imageSql = "INSERT INTO customer_images (customer_id, proposal_id, image_path) VALUES (?, ?, ?)";
                $imageStmt = $conn->prepare($imageSql);
                
                // Bind parameters for image table
                $imageStmt->bind_param('sss', $customerId, $proposalId, $imagePath);
                $imageStmt->execute();
                
                $imageStmt->close();
            }
            
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
