<?php
$page_title = "Your Bookings";
include_once("../master/header.php");
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-b-15" style="color: #57068c;">Ongoing/Future Bookings</h4>
            <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Item</th>
                            <th>Building</th>
                            <th>Item Number</th>
                            <th>Booking Start</th>
                            <th>Booking End</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT `booking_id`, `items`.`item_id`, `item_building`, `item_number`, `start_time`, `end_time` FROM bookings JOIN items ON bookings.item_id = items.item_id WHERE `end_time` >= CURRENT_TIMESTAMP()";
                    $bookings = $conn->query($query);

                    while ($booking = $bookings->fetch_assoc()) {
                        echo <<<BOOKING
                        <tr>
                            <td>{$booking["booking_id"]}</td>
                            <td>{$booking["item_id"]}</td>
                            <td>{$booking["item_building"]}</td>
                            <td>{$booking["item_number"]}</td>
                            <td>{$booking["start_time"]}</td>
                            <td>{$booking["end_time"]}</td>
                            <td style="text-align: center">
                                <button class="btn btn-danger btn-sm waves-effect waves-light">Cancel</button>
                            </td>
                        </tr>
                        BOOKING;
                    }

                    if (mysqli_num_rows($bookings) == 0) {
                        echo "<tr><td colspan=\"6\"><div class=\"text-center\">No ongoing/future bookings</div><td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div><!-- end col -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-b-15" style="color: #57068c;">Previous Bookings</h4>
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Item</th>
                            <th>Building</th>
                            <th>Item Number</th>
                            <th>Booking Start</th>
                            <th>Booking End</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT `booking_id`, `items`.`item_id`, `item_building`, `item_number`, `start_time`, `end_time` FROM bookings JOIN items ON bookings.item_id = items.item_id WHERE `end_time` < CURRENT_TIMESTAMP() AND `is_cancelled` = 0";
                        $bookings = $conn->query($query);

                        while ($booking = $bookings->fetch_assoc()) {
                            echo <<<BOOKING
                            <tr>
                                <td>{$booking["booking_id"]}</td>
                                <td>{$booking["item_id"]}</td>
                                <td>{$booking["item_building"]}</td>
                                <td>{$booking["item_number"]}</td>
                                <td>{$booking["start_time"]}</td>
                                <td>{$booking["end_time"]}</td>
                                <td style="text-align: center">
                                    <button class="btn btn-danger btn-sm waves-effect waves-light">Report</button>
                                    <button class="btn btn-success btn-sm waves-effect waves-light">Feedback</button>
                                </td>
                            </tr>
                            BOOKING;
                        }
                        if (mysqli_num_rows($bookings) == 0) {
                            echo "<tr><td colspan=\"6\"><div class=\"text-center\">No previous bookings</div><td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                ?>
            </div>
        </div>
    </div><!-- end col -->
</div>

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php
include_once("../master/footer.php");
?>
