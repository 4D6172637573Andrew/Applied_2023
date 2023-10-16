<?php
include_once "header.php";
$start_date_str = (date("Y-m-d"));
$date = strtotime($start_date_str);
$s_date = date('d-m-20y', $date);
?>


<?php
$conn = mysqli_connect(HOST, DBUSER, DBPASS, DBNAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT COUNT(id) as count FROM shifts where user_id = 1";
$rec_present = mysqli_query($conn, $sql);
if ($rec_present) {
$row = mysqli_fetch_assoc($rec_present);
$rec_count = $row['count'];
?>

<div class="container-fluid">
    <head>
        <meta charset="UTF-8"><br><r><br><br>
        <title>PAYCAL®</title>
        <link rel="stylesheet" type="text/css" href="css/paycal_style.css">
        
        
    </head>
</div>

<div class="container-fluid mb-1">
<h1><span class="rectangle">PAYCAL®</span></h1>

    <div class="row">
        <div class="col-lg-2">
            <form method="post" id="pay_form">
                <h5>Inputs:</h5>
                <div class="inputBox form-group">
                    <input type="number" required="required" class="from-control mb-3" id="rate" name="rate">
                    <span>Hourly rate</span>
                    <div class="inputBox form-group">
                        <input type="number" required="required" class="from-control mb-3" id="uni_a" name="uni_a">
                        <span>Uniform Allow</span>
                        <div class="inputBox form-group">
                            <input type="number" required="required" class="from-control mb-3" id="lau_a" name="lau_a">
                            <span>Laundry Allow</span>
                            <div class="inputBox form-group">
                                <input type="number" required="required" class="from-control mb-3" id="pm_a"
                                       name="pm_a">
                                <span>PM Allow</span><br>
                            </div>
                        </div>
                    </div>
                </div>


        </div><!-- /.col-lg-4 -->
        <div class="col-lg-2 inputs">
            <h5></h5><br>

            <input type="date" class="form-control mb-3" id="date" name="s_date" value="<?php (date("Y-m-d")) ?>">

            <div class="form-group">
                <input type="time" class="form-control mb-3" id="s_time" name="s_time">
            </div>

            <div class="form-group">
                <input type="time" class="form-control mb-3" id="e_time" name="e_time">
            </div>
            <h10 id="dont_forget">Don't forget to edit the fixed values! ⊳⊳⊳</h10>


        </div><!-- /.col-lg-4 -->

        <div class="col-lg-2 buttons">
            <h5>Options:</h5>
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
                    class="mb-3 add_shift shadow-sm">
                ADD SHIFT
            </button>

            <button id="btn_delete_shift" name="btn_delete_shift" type="button" 
                    style="width: 90%"
                    class="mb-3 delete_shift shadow-sm">
                CLEAR ALL
            </button>

            <button type="button"
                    style="width: 90%"
                    class="mb-3" data-bs-toggle="modal" data-bs-target="#fixed_values_form">
                EDIT FIXED
            </button>

            <button id="btn_calc_pay" name="btn_calc_pay" type="button"
                    style="width: 90%"
                    class="mb-3 calc_pay shadow-sm"
                    onclick="showDiv()">
                CALCULATE
            </button>
            


            <br><br><br>
        </div><!-- /.col-lg-4 -->
        </form>
    


        <div class="col-lg-5 table-body">
        <h5>Shifts:</h5>
            <table class="styled-table">
                <thead class="thead-dark">

                <tr class="active-row">
                    <th class=scope="col">id</th>
                    <th class=scope="col">user_id</th>
                    <th class=scope="col">rate</th>
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
        <td style="text-align:right;">' . $row["s_time"] . '</td>
        <td style="text-align:right;">' . $s_holi . '</td>
        <td style="text-align:right;">' . $row["e_time"] . '</td>
        <td style="text-align:right;">' . $e_holi . '</td>
        <td style="text-align:right;">' . $row["uni_allow"] . '</td>
        <td style="text-align:right;">' . $lau_allow . '</td>
        <td style="text-align:right;">' . $pm_allow . '</td>
        <td style="text-align:center;">
        
        <a href="#" title="Delete" id="delete_row" class="row_delete"  style="color: black ;
        font-size:20px;
        " data-row-id="' . $row["id"] . '"><i class="btn fa fa-trash-o">
        </i>
        </a>
       
        <a href="#" title="Edit_values" class="btn_edit_values" data-bs-toggle="modal" data-bs-target="#edit_values_form" style="color: black;
        font-size:20px;
        " data-row-id="' . $row["id"] . '"><i class="fa fa-pencil-square-o" aria-hidden="true">
        </i>
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
        <div class="col-lg-12 " id="pay_slip_div" style="display: none;">
            <div class="row col-lg-4 container">
                <h1>
                    <a id="pay_slip_target"><br></a>
                </h1>
                <h1 class="section-heading rectangle">Pay Slipppppppp </h1>
                <h3><br>
                    <a id="pay_slip_target"> Want to make changes? </a>
                </h3>
                <button id="btn_open_again" name="open_again" type="button"
                class="btn-outline mx-auto shadow-sm" onclick="openAgain()"> Open Paycal Editor
                </button>
                <br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <script>
            document.getElementById('btn_calc_pay').style.display = 'block';
            document.getElementById('btn_open_again').style.display = 'none';

            function openAgain() {
                location.reload(); 
            }

            function showDiv() {
    const inputElements = document.querySelectorAll('input');
    for (const input of inputElements) {
        input.disabled = true;
    }
    document.getElementById('btn_calc_pay').style.display = 'none';
    document.getElementById('btn_add_shift').style.display = 'none';
    document.getElementById('btn_delete_shift').style.display = 'none';
    document.getElementById('delete_row').style.display = 'none';
    document.getElementById('edit_values').style.display = 'none';
    document.getElementById('edit_fixed_row').style.display = 'none';
    document.getElementById('dont_forget').style.display = 'none';
    document.getElementById('btn_open_again').style.display = 'block';
    document.getElementById('pay_slip_div').style.display = 'block';
    location.href = '#pay_slip_target';
}

            </script>


        <?php
        mysqli_close($conn);
        ?>
        <?php
        include_once "footer.php";
        include_once "payProject_modal_fixed_form.php";
        include_once "payProject_modal_fixed_update.php";
        include_once "Edit_values_form.php";
        include_once "Edit_values_update.php";
        ?>


                  