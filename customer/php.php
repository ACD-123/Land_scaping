<?php
// Include your database connection script
session_start();
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
        isset($postData->serviceId)
    ) {
        
        // Extract customer ID, provider ID, selected date, selected time, user content, selected services, and total amount
        $customerId = $postData->customerId;
        $providerId = $postData->providerId;
        $selectedDate = $postData->selectedDate;
        $selectedTime = $postData->selectedTime;
        $userContent = $postData->userContent;
        $selectedServices = $postData->selectedServices;//implode(', ',$postData->selectedServices);
        $totalAmount = $postData->totalAmount;
        $serviceId = $postData->serviceId;
        
        // Start a database transaction
        $conn->begin_transaction();

         // Insert data into your customer_proposal table (as before)
         $sql = "INSERT INTO customer_proposal (customer_id, provider_id, year, month, day, selected_time, user_content, selected_services, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
         $stmt = $conn->prepare($sql);
         $servicename = array();
        foreach($selectedServices as $val){
            $servicename[] = $val->serviceName;
        }
        $serviceNames  = implode(', ',$servicename);
       
         $stmt->bind_param('ssssssssd', $customerId, $providerId, $selectedDate->year, $selectedDate->month, $selectedDate->day, $selectedTime, $userContent, $serviceNames, $totalAmount);
 
         if ($stmt->execute()) {
            $proposalId = $stmt->insert_id; // Get the generated proposal_id
            // Now, you can insert data into customer_services using the generated proposalId
            foreach ($selectedServices as $service) {
                $serviceId = json_encode($service->serviceId);
                $serviceName = json_decode(json_encode($service->serviceName));
                $price = json_decode(json_encode($service->price));
        
                // Insert data into customer_services with the proposal_id from customer_proposal
                $sql = "INSERT INTO customer_services (customer_id, provider_id, proposal_id, service_id, service_name, price, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssssd', $customerId, $providerId, $proposalId, $serviceId, $serviceName, $price, $totalAmount);
        
                if ($stmt->execute()) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                $_SESSION['proposal_id'] = $proposalId;
            }
            $conn->commit();
            echo 'Data inserted successfully.';
            echo $proposalId;

        } else {
            $conn->rollback();
            echo 'Error inserting data into customer_proposal: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'Invalid data.';
    }
} else {
    echo 'Invalid request method.';
}
?>
