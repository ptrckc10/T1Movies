<?php

include('movie_dbconn.php');
include('movie_function.php');

// Fetch
$query = '';
$output = array();
$query .= "SELECT * FROM movies ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE MOVIE_TITLE LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR RATED LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR ACTIVE LIKE "%' . $_POST["search"]["value"] . '%" ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY MOVIE_ID ASC ';
}

if ($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["MOVIE_ID"];
    $sub_array[] = $row["MOVIE_TITLE"];
    $sub_array[] = $row["RATED"];
    $sub_array[] = $row["PREMIERE_DATE"];
    if ($row["ACTIVE"] == 0) {
        $sub_array[] = '<span class="text-danger">(0) Inactive</span>';
    } else if ($row["ACTIVE"] == 1) {
        $sub_array[] = '<span class="text-primary">(1) Coming Soon</span>';
    } else {
        $sub_array[] = '<span class="text-success">(2) Now Showing</span>';
    }
    $sub_array[] = '<button data-toggle="modal" data-target="#movieModal" style="width: 100%" type="button" name="update" id="' . $row["MOVIE_ID"] . '" class="btn btn-info btn-sm update">Edit</button>';
    $data[] = $sub_array;
}
$output = array(
    "draw"              =>  intval($_POST["draw"]),
    "recordsTotal"      =>  $filtered_rows,
    "recordsFiltered"   =>  get_total_all_records(),
    "data"              =>  $data
);
echo json_encode($output);

// data-toggle="modal" data-target="#movieModal"
