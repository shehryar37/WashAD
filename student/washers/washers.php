<?php
$page_title = "Washers";
include_once("../master/header.php");

use Carbon\Carbon;

require_once('../../plugins/carbon/autoload.php');

if (isset($_POST["submit"])) {
    $SLOT = 20 * 60;

    $building = $_POST["building"];
    $daterange = $_POST["daterange"];
    $duration = $_POST["duration"];

    $daterange = explode(' - ', $daterange);
    $start_date = new Carbon(new DateTime($daterange[0]));
    $start_date = $start_date;
    $end_date = new Carbon(new DateTime($daterange[1]));
    $end_date = $end_date;

    $duration = explode(':', $duration);
    $hours = $duration[0];
    $minutes = $duration[1];
    $seconds =  (int)$duration[0] * 3600 + (int)$duration[1] * 60;

    $user_slots = $seconds / $SLOT;

    $sql = "SELECT `item_building`, `item_number`, `item_type`, `start_time`, `end_time` FROM `items` JOIN `bookings` ON `bookings`.`item_id` = `items`.`item_id` WHERE `is_operational` = 1 AND `is_cancelled` = 0 AND `item_building` = '$building' AND `item_type` = 'W' AND ((`start_time` >= '$start_date' AND `start_time` < '$end_date') OR (`end_time` < '$end_date' AND `end_time` >= '$start_date')) ORDER BY `item_number`";

    $start_date = $start_date->getTimestamp();
    $end_date = $end_date->getTimestamp();

    $total_slots = ($end_date - $start_date) / $SLOT;

    $items = "SELECT * FROM `items` WHERE `item_type` = 'W' AND `item_building` = '$building'";
    $items_result = $conn->query($items);

    $number_items = mysqli_num_rows($items_result);

    $bookings = $conn->query($sql);

    $timetable = array();

    for ($i = 0; $i < $number_items; $i++) {
        for ($s = 0; $s < $total_slots; $s++) {
            $timetable[$i][$s] = 0;
        }
    }

    while($booking = $bookings->fetch_assoc()) {
        $booking_start = new Carbon(new DateTime($booking["start_time"]));
        $booking_start = $booking_start->getTimestamp();
        $booking_end = new Carbon(new DateTime($booking["end_time"]));
        $booking_end = $booking_end->getTimestamp();

        if ($start_date - $booking_start >= 0) {
            $begin = 0;
        }
        else {
            $begin = -($start_date - $booking_start) / $SLOT;
        }

        if ($end_date - $booking_end <= 0) {
            $end = $total_slots;
        }
        else {
            $end = ($end_date - $booking_end) / $SLOT;
        }

        for ($s = $begin; $s < $end; $s++) {
            $timetable[$booking["item_number"] - 1][$s] = 1;
        }
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-b-15" style="color: #57068c;">Search</h4>
            <div class="row">
                <form action="washers.php" method="post">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Building</label>
                        <div>
                            <select class="form-control" name="building">
                                <option>--</option>
                                <option value="A1B">A1B</option>
                                <option value="A1C">A1C</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label>Preferred Time Slot</label>
                        <div>
                            <input type="text"
                                class="form-control input-daterange-timepicker"
                                name="daterange"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Duration</label>
                        <div class="input-group">
                            <input id="duration" name="duration" type="text" class="form-control">
                            <span class="input-group-addon"><i class="mdi mdi-clock"></i></span>
                        </div><!-- input-group -->
                    </div>
                </div>
                <div class="col-lg-1">
                    <div>
                        <label></label>
                        <div class="input-group" style="padding-top: 7px;">
                            <button name="submit" type="submit" class="btn btn-custom waves-light waves-effect w-xs">Search</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div><!-- end col -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-b-15" style="color: #57068c;">Available Bookings</h4>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Machine Number</th>
                        <th>Booking Start</th>
                        <th>Booking End</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $number_items; $i++) {
                        $consecutive_slots = 0;
                        for ($s = 0; $s < $total_slots; $s++) {
                            if ($timetable[$i][$s] == 1) {
                                $consecutive_slots = 0;
                            }
                            else {
                                $consecutive_slots++;
                            }

                            if ($consecutive_slots >= $user_slots) {
                                $slot_start = ($s - ($user_slots - 1)) * $SLOT + $booking_start;
                                $slot_start = Carbon::createFromTimestamp($slot_start)->toDateTimeString();

                                $slot_end = $s * $SLOT + $booking_start;
                                $slot_end = Carbon::createFromTimestamp($slot_end)->toDateTimeString();

                                $i++;

                                echo <<<SLOT
                                    <tr>
                                        <td>{$i}</td>
                                        <td>{$slot_start}</td>
                                        <td>{$slot_end}</td>
                                    </tr>
                                SLOT;

                                $i--;
                            }
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div><!-- end col -->
</div>

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php
include_once("../master/footer.php");
?>
