<?php
$page_size = 10; // Number of records to display per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$total_records = // Determine the total number of records

// Calculate the starting and ending record numbers for the current page
$start_record = ($current_page - 1) * $page_size;
$end_record = $start_record + $page_size - 1;

// Retrieve the data for the current page
$data = [
        []
];// Retrieve data from your dataset using the starting and ending record numbers

// Display the data on the page
foreach ($data as $row) {
    // Display the data here
}

// Display links to the previous and next pages, as well as any other pages in the dataset
for ($i = 1; $i <= ceil($total_records / $page_size); $i++) {
    if ($i == $current_page) {
        echo $i;
    } else {
        echo '<a href="?page=' . $i . '">' . $i . '</a>';
    }
}

?>