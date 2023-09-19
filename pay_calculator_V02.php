<?php
include_once "header.php";
//include_once "phub_header.php";
//include_once "tyler_bg.php";
//include_once "bg2.php";
//include_once "bg3.php";
$start_date_str = "2023-05-06";
$date = strtotime($start_date_str);
$s_date = date('d-m-20y', $date);
?>


<?php
$conn = mysqli_connect(HOST, DBUSER, DBPASS, DBNAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM table_fixed WHERE id = 0"; 
$result = mysqli_query($conn, $query);
if ($result) {
    $fixedValues = mysqli_fetch_assoc($result);
} 

$sql = "SELECT COUNT(id) as count FROM shifts where user_id = 1";
$rec_present = mysqli_query($conn, $sql);
if ($rec_present) {
    $row = mysqli_fetch_assoc($rec_present);
    $rec_count = $row['count'];
    ?>

    <div class="container-fluid"><br>
        <h1><span class="rectangle">Pay Calculator</span></h1>
        <head>
            <style>
                .inputs2 input {
                    width: 60%;
                    margin: 2x 0;
                    font-size: smaller;
                    border-radius: 4px;
                    border-width: thin;
                    text-align: left;

                }

                .inputs input {
                    width: 60%;
                    margin: 2x 0;
                    font-size: smaller;
                    border-radius: 4px;
                    border-width: thin;
                    text-align: left;

                }

                .table-body {
                    height: 375px;
                    width: 750px;
                    overflow-y: auto;
                }

                .fixed-header {
                    position: sticky;
                }

                /* .rectangle {
                    display: inline-block;
                    background-color: #68c8d3;
                    padding: 5px 10px;
                    color: black;
                    border-radius: 10px;
                } */
            </style>
        </head>
    </div>

    <div class="container-fluid mb-1">
    <form method="post" id="pay_form">
    <div class="row">
        <div class="col-lg-2">
            <div class="inputs">
                        <label for="h_rate">Hourly rate:</label>
                        <input step=".01" type="number" id="h_rate" size="5" name="h_rate" min="0" max="10000" value="50.84"><br>

                        <label for="u_a">Uniform Allow:</label>
                        <input step=".01" type="number" id="u_a" size="5" name="u_a" min="0" max="10000" value="1.44"><br>

                        <label for="l_a">Laundry Allow:</label>
                        <input step=".01" type="number" id="l_a" size="5" name="l_a" min="0" max="10000" value="0.83"><br>

                        <label for="pm_a">PM Allow:</label>
                        <input step=".01" type="number" id="pm_a" size="5" name="pm_a" min="0" max="10000" value="28.32"><br>
                        <p>_______________</p>
 
                        <div class="fixed_values">
                        <label for="help">HELP:</label><br>
                        <input type="number" id="help_owed" name="help_owed" size="5" min="0" max="10000"
                               value="<?php echo $fixedValues['help_owed']; ?>" readonly><br>

                        <label for="s_p">Salary Package:</label>
                        <input type="number" id="sal_pack" name="sal_pack" size="6" min="0" max="10000"
                               value="<?php echo $fixedValues['sal_pack']; ?>" readonly><br>

                        <label for="o_income">Other Income:</label>
                        <input type="number" id="other_income" name="other_income" size="10" min="0" max="10000"
                               value="<?php echo $fixedValues['other_income']; ?>" readonly><br>

                        <label for="o_deduct">Other Deduct:</label>
                        <input type="number" id="other_deduct" name="other_deduct" size="5" min="0" max="10000"
                               value="<?php echo $fixedValues['other_deduct']; ?>" readonly><br>

                        <label for="sat_p">Sat Penalty:</label>
                        <input type="number" id="sat_penalty" name="sat_penalty" size="5" min="0" max="10000"
                               value="<?php echo $fixedValues['sat_penalty']; ?>" readonly><br>

                        <label for="sun_p">Sun Penalty:</label>
                        <input type="number" id="sun_penalty" name="sun_penalty" size="5" min="0" max="10000"
                               value="<?php echo $fixedValues['sun_penalty']; ?>" readonly><br>

                        <label for="tax">TAX:</label><br>
                        <input type="number" id="tax" name="tax" size="5" min="0" max="10000"
                               value="<?php echo $fixedValues['tax']; ?>" readonly><br>
                    </div>
        </div>

    </div><!-- /.col-lg-4 -->
    <div class="col-lg-2">
    <div class= "inputs">
        

                        <label for="date">Date:</label><br>
                        <input type="date" id="date" name="date"><br>
                        <label for="start_t">Start Time</label>
                        <input type="time" id="start_t" name="start_t"><br>
                        <label for="end_t">End Time</label>
                        <input type="time" id="end_t" name="end_t"
                               onchange="myFunctionEightHrShift()">
        </div>
        <p>_______________</p>
        <br>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="s_holi">
            <label class="form-check-label mb-2" for="e_holi">Start is a holiday</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="e_holi">
            <label class="form-check-label mb-3" for="e_holi">End is a holiday</label>
        </div>
        <button id="btn_add_shift" name="btn_add_shift" type="button"
                style="width: 90%"
                class="btn btn-outline-primary  mb-3 add_shift shadow-sm">
            Add shift
        </button>
        <button id="btn_delete_shift" name="btn_delete_shift" type="button"
                style="width: 90%"
                class="btn btn-outline-danger  mb-3 delete_shift shadow-sm">
            Clear all shifts
        </button>

        <button type="button"
                style="width: 90%"
                class="btn btn-outline-warning mb-3" data-bs-toggle="modal" data-bs-target="#fixed_values_form">
            Edit Fixed values
        </button>

        <button id="btn_calculate_pay" name="btn_calculate_pay" type="button"
                style="width: 90%"
                class="btn btn-outline-success  mb-3 calculate_pay shadow-sm">
            Calculate pay
        </button>


    </div><!-- /.col-lg-4 -->

    


    <div class="col-lg-3 navbar-nav-scroll table-body">
    <table class="  table table-striped table-bordered table-sm table-hover">
        <thead class="thead-dark">

        <tr>
            <th class=scope="col">id</th>
            <th class=scope="col">user_id</th>
            <th class="doodleEdit" scope="col">rate</th>
            <th class=scope="col">s_date</th>
            <th class=scope="col">s_time</th>
            <th class=scope="col">s_holi</th>
            <th class=scope="col">e_time</th>
            <th class=scope="col">e_holi</th>
            <th class=scope="col">uni_allow</th>
            <th class=scope="col">lau_allow</th>
            <th class=scope="col">pm_allow</th>
            <th class=scope="col">config</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT id, user_id, rate, s_date, s_time, e_time, uni_allow, PM_allow FROM shifts";
        $result = $conn->query($sql);

        $query = "SELECT * FROM shifts WHERE user_id = 0 ORDER BY s_date"; // query
        $conn = mysqli_connect(HOST, DBUSER, DBPASS, DBNAME);
        $result = mysqli_query($conn, $query); // run query

        $numRecords = 0;
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $s_holi = isset($row["s_holi"]) && $row["s_holi"] == "1" ? "Y" : "N";
                $e_holi = isset($row["e_holi"]) && $row["e_holi"] == "1" ? "Y" : "N";
                $lau_allow = isset($row["lau_allow"]) ? $row["lau_allow"] : "";
                $pm_allow = isset($row["pm_allow"]) ? $row["pm_allow"] : "";

                $date = date_create($row["s_time"]);
                $s_time = date_format($date, "H:i");
                $date = date_create($row["e_time"]);
                $e_time = date_format($date, "H:i");

                echo '
        <tr>
        <td style="text-align:right;">' . $row["id"] . '</td>
        <td style="text-align:right;">' . $row["user_id"] . '</td>
         <td style="text-align:right;">' . $row["rate"] . '</td>
         <td style="text-align:right;">' . $row["s_date"] . '</td>
        <td style="text-align:right;">' . $s_time . '</td>
        <td style="text-align:right;">' . $s_holi . '</td>
        <td style="text-align:right;">' . $e_time . '</td>
        <td style="text-align:right;">' . $e_holi . '</td>
        <td style="text-align:right;">' . $row["uni_allow"] . '</td>
        <td style="text-align:right;">' . $lau_allow . '</td>
        <td style="text-align:right;">' . $pm_allow . '</td>
        <td style="text-align:center;">
        <a href="#" title="Delete" class="row_delete"  style="color:#0099cc;font-size:20px;" data-row-id="' . $row["id"] . '">
    <i class="btn fa fa-trash-o"></i>
</a>
        <a type="button" title="Edit" id="row_edit" style="color:#0099cc;font-size:20px;">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        </a>
        </td>
        </tr>
        ';
            }
        } else {
            echo "no records found";
        }


        ?>

        </tbody>
    </table>
    <?php
}
?>
    </div>

    <!--            <div class="form-group">-->
    <!--                <label for="sat_pe">Saturday penalty:</label>-->
    <!--                <input type="number" class="form-control mb-3" id="sat_pe" name="sat_pe" placeholder="Enter Rate">-->
    <!--            </div>-->
    <!--            <div class="form-group">-->
    <!--                <label for="sun_pe">Saturday penalty:</label>-->
    <!--                <input type="number" class="form-control mb-3" id="sun_pe" name="sun_pe" placeholder="Enter Rate">-->
    <!--            </div>-->
    <!--            <div class="form-group">-->
    <!--                <label for="other_in">Tax:</label>-->
    <!--                <input type="number" class="form-control mb-3" id="other_in" name="other_in" placeholder="Enter Rate">-->
    <!--            </div>-->

<?php
mysqli_close($conn);

?>
<?php
include_once "footer.php";
include_once "payProject_modal_fixed_form.php";
include_once "payProject_modal_fixed_update.php"
?>