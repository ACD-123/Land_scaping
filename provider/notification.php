<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- GOOGLE FONTS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Aaron Burks  </title>
  <!-- plugins:css -->
 <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/sitelogo-singup.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <?php 
     include 'Header.php'
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.php -->
      <!-- <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
           <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div> 
        </div>
      </div> -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <?php
      include 'SideMenu.php'
      ?>
      <!-- partial -->
      <div class="main-panel">
      <section id="notifications-main" style="padding: 60px 0px;">
<div class="container">
    <div class="row">
        <div class="notifications-inner" >
        <?php
include 'connection.php';

// Function to get customer information from the provider_registration table
function getCustomerInfo($customerId) {
    global $conn;
    $sql = "SELECT fullname, profile_picture, address FROM provider_registration WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $providerId);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }
    return array('fullname' => 'N/A', 'address' => 'N/A', 'profile_picture' => 'N/A'); // Provide default values if customer info not found
}

function getNotifications($userId) {
    global $conn;
    $sql = "SELECT messages.message_content, messages.provider_id, provider_registration.fullname, provider_registration.profile_picture FROM messages
            INNER JOIN provider_registration ON messages.provider_id = provider_registration.id
            WHERE messages.customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $notifications = array();

        while ($row = $result->fetch_assoc()) {
            $messageContent = $row['message_content'];
            $providerName = $row['fullname'];
            $profilePicture = $row['profile_picture'];
            $notifications[] = array('message_content' => $messageContent, 'provider_name' => $providerName, 'profile_picture' => $profilePicture);
        }

        return $notifications;
    }

    return array();
}

$userId = $_SESSION['user_id'];

$sql = "SELECT * FROM customer_proposal WHERE provider_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $userId);

if ($stmt->execute()) {
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo '<h2 class="text-center texter">No new orders available.</h2>';
    } else {
        while ($row = $result->fetch_assoc()) {
            $proposalId = $row['id'];
            $customerId = $row['customer_id'];
            $providerId = $row['provider_id'];
            $selectedDate = $row['year'] . '-' . $row['month'] . '-' . $row['day'];
            $selectedTime = $row['selected_time'];
            $userContent = $row['user_content'];
            $selectedServices = explode(', ', $row['selected_services']);
            $totalAmount = $row['total_amount'];
            $counterTotall = $row['counter_totall'];
            $current_time = $row['current_time'];

            // Retrieve customer name and address based on providerId
            $customerInfo = getCustomerInfo($providerId);

            // Output the retrieved customer name and address
            $customerName = $customerInfo['fullname'];
            $customerAddress = $customerInfo['address'];
            $profilePicture = $customerInfo['profile_picture'];

            // Display customer notifications for this proposal
            $notificationsArray = getNotifications($userId);

          }
          foreach ($notificationsArray as $notification) {
              $messageContent = $notification['message_content'];
              $providerName = $notification['provider_name'];
              $providerProfilePicture = $notification['profile_picture'];

              echo "<div class='notify-text' style='padding: 15px 0px;'>";
              echo "<img src='../provider/$providerProfilePicture' />";
              echo "<h4>Provider: $providerName</h4>";
              echo "<p>Message: $messageContent</p>";
              echo "</div>";
          }
    }
} else {
    echo 'Error executing the query.';
}
?>


        </div>
    </div>
</div>
</section>

      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->

  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script src="script.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<script>
    function activate() {
	document.head.insertAdjacentHTML("beforeend", `
		<style>
			.time-picker {
				position: absolute;
				display: inline-block;
				padding: 10px;
				background: #eeeeee;
				border-radius: 6px;
			}

			.time-picker__select {
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				outline: none;
				text-align: center;
				border: 1px solid #dddddd;
				border-radius: 6px;
				padding: 6px 10px;
				background: #ffffff;
				cursor: pointer;
				font-family: 'Heebo', sans-serif;
			}
		</style>
	`);

	document.querySelectorAll(".time-pickable").forEach(timePickable => {
		let activePicker = null;

		timePickable.addEventListener("focus", () => {
			if (activePicker) return;

			activePicker = show(timePickable);

			const onClickAway = ({ target }) => {
				if (
					target === activePicker
					|| target === timePickable
					|| activePicker.contains(target)
				) {
					return;
				}

				document.removeEventListener("mousedown", onClickAway);
				document.body.removeChild(activePicker);
				activePicker = null;
			};

			document.addEventListener("mousedown", onClickAway);
		});
	});
}

function show(timePickable) {
	const picker = buildPicker(timePickable);
	const { bottom: top, left } = timePickable.getBoundingClientRect();

	picker.style.top = `${top}px`;
	picker.style.left = `${left}px`;

	document.body.appendChild(picker);

	return picker;
}

function buildPicker(timePickable) {
	const picker = document.createElement("div");
	const hourOptions = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12].map(numberToOption);
	const minuteOptions = [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55].map(numberToOption);

	picker.classList.add("time-picker");
	picker.innerHTML = `
		<select class="time-picker__select">
			${hourOptions.join("")}
		</select>
		:
		<select class="time-picker__select">
			${minuteOptions.join("")}
		</select>
		<select class="time-picker__select">
			<option value="am">am</option>
			<option value="pm">pm</option>
		</select>
	`;

	const selects = getSelectsFromPicker(picker);

	selects.hour.addEventListener("change", () => timePickable.value = getTimeStringFromPicker(picker));
	selects.minute.addEventListener("change", () => timePickable.value = getTimeStringFromPicker(picker));
	selects.meridiem.addEventListener("change", () => timePickable.value = getTimeStringFromPicker(picker));

	if (timePickable.value) {
		const { hour, minute, meridiem } = getTimePartsFromPickable(timePickable);

		selects.hour.value = hour;
		selects.minute.value = minute;
		selects.meridiem.value = meridiem;
	}

	return picker;
}

function getTimePartsFromPickable(timePickable) {
	const pattern = /^(\d+):(\d+) (am|pm)$/;
	const [hour, minute, meridiem] = Array.from(timePickable.value.match(pattern)).splice(1);

	return {
		hour,
		minute,
		meridiem
	};
}

function getSelectsFromPicker(timePicker) {
	const [hour, minute, meridiem] = timePicker.querySelectorAll(".time-picker__select");

	return {
		hour,
		minute,
		meridiem
	};
}

function getTimeStringFromPicker(timePicker) {
	const selects = getSelectsFromPicker(timePicker);

	return `${selects.hour.value}:${selects.minute.value} ${selects.meridiem.value}`;
}

function numberToOption(number) {
	const padded = number.toString().padStart(2, "0");

	return `<option value="${padded}">${padded}</option>`;
}

activate();
</script>