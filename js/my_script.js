function generateFormObject() {
    let form_data = $("#pay_form").serialize();
    console.log(form_data);
    let form_array = form_data.split("&");
    let form_object = {};
    for (let item in form_array) {
        let key_value = form_array[item].split("=");
        form_object[key_value[0]] = key_value[1].replace("%3A", ":");
    }



    console.log(form_object);

    return form_object;

}


$(document).on('click', '.delete_shift', function (event) {
    $.ajax({
        url: "clear_shifts.php",
        method: "POST",
        success: function (response) {
            location.reload()
        }
    });
});

$(document).on('click', '.row_delete', function (event) {
    event.preventDefault();
    var rowId = $(this).data('row-id');
    console.log("Row ID to delete: " + rowId);
    $.ajax({
        url: "clear_row.php",
        method: "POST",
        data: { id: rowId },
        success: function (response) {
            location.reload()
            console.log("Server response: " + response);
        },
        error: function (xhr, status, error) {
            console.log("AJAX error: " + error);
        }

    });
});

$(document).on('click', "#btn_add_shift", function (event) {
  event.preventDefault();

  var sDate = $("#date").val();
  var sTime = $("#s_time").val();
  var eTime = $("#e_time").val();

  if (!sDate || !sTime || !eTime) {
      alert("Please make sure all input fields are filled in.");
      return;
  }

  var input_form_data = generateFormObject();
  $.ajax({
      url: "add_shift.php",
      method: "POST",
      data: input_form_data,
      success: function (response) {
          location.reload();
          console.log(response);
      }
  });
});
function generateFormObject() {
  let form = document.getElementById("pay_form");
  let formData = new FormData(form);
  let formObject = {};
  formData.forEach((value, key) => {
      formObject[key] = value;
  });
  return formObject;
}

$(document).on('click', ".btn_edit_values", function () {
    var recordID = $(this).data('row-id');

    console.log("Record ID: " + recordID); // Add this line for debugging
    
    $.ajax({
        url: "edit_values.php",
        method: "POST",
        data: { id: recordID },
        success: function (response) {
            console.log("AJAX response: " + response); // Add this line for debugging
            response = JSON.parse(response);

            var rate = response.rate;
            var uni_a = response.uni_allow;
            var lau_a = response.lau_allow;
            var pm_a = response.pm_allow;
            var s_date = response.s_date;
            var s_time = response.s_time;
            var e_time = response.e_time;
            var s_holi = response.s_holi;
            var e_holi = response.e_holi;

            $('#edit_values_rate').val(rate);
            $('#edit_values_uni_allow').val(uni_a);
            $('#edit_values_lau_allow').val(lau_a);
            $('#edit_values_pm_allow').val(pm_a);
            $('#edit_values_s_date').val(s_date);
            $('#edit_values_s_time').val(s_time);
            $('#edit_values_e_time').val(e_time);

            if (s_holi === "1") {
                $('#edit_values_s_holi').prop('checked', true);
            } else {
                $('#edit_values_s_holi').prop('checked', false);
            }

            if (e_holi === "1") {
                $('#edit_values_e_holi').prop('checked', true);
            } else {
                $('#edit_values_e_holi').prop('checked', false);
            }

            $('#edit_values_form').modal('show');
        }
    });
});


// document.getElementById('btn_calc_pay').style.display = 'block';
//             document.getElementById('btn_open_again').style.display = 'none';

//             function openAgain() {
//                 location.reload(); 
//             }

//             function showDiv() {
//                 document.getElementById('btn_calc_pay').style.display = 'none';
//                 document.getElementById('btn_open_again').style.display = 'block';
//                 document.getElementById('pay_slip_div').style.display = 'block';
//                 location.href = '#pay_slip_target'
//             }