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

$(document).on('click', ".calculate_pay", function (event) {
    event.preventDefault();
    alert("calculate pay function is not functional yet.");
    console.log('this no funtion L hahaha lmao trashy noob');
});

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

$(document).on('click', ".btn_edit_fixed", function () {
    $.ajax({
        url: "fixed_row.php",
        method: "POST",
        success: function (response) {
            response = JSON.parse(response);

            var id = response.id;
            var help = response.help;
            var sal_pack = response.sal_pack;
            var other_income = response.other_income;
            var other_deduct = response.other_deduct;
            var sat_penalty = response.sat_penalty;
            var sun_penalty = response.sun_penaltyF
            var tax = response.tax;

            $('#edit_fixed_row_id').val(id);
            $('#edit_fixed_row_help').val(help);
            $('#edit_fixed_row_sal_pack').val(sal_pack);
            $('#edit_fixed_row_other_income').val(other_income);
            $('#edit_fixed_row_other_deduct').val(other_deduct);
            $('#edit_fixed_row_sat_penalty').val(sat_penalty);
            $('#edit_fixed_row_sun_penalty').val(sun_penalty);
            $('#edit_fixed_row_tax').val(tax);

            $('#edit_value').modal('show');
        }
    });
});









$(function() {
  $(".doodleEdit").dblclick(function(e) {
    e.stopPropagation();
    var currentEle = $(e.target);
    var value = $(e.target).html();

    console.log($(e.target));

    if ($.trim(value) === "") {
      $(currentEle).data('mode', 'add');
    } else {
      $(currentEle).data('mode', 'edit');
    }
    updateVal(currentEle, value);
  });
});

function updateVal(currentEle, value) {

  $(currentEle).html('<input class="thVal" type="text" value="' + value + '" />');

  var mode = $(currentEle).data('mode');
  alert(mode);

  $(".thVal").focus();
  $(".thVal").keyup(function(event) {
    if (event.keyCode == 13) {
      $(this).parent().html($(this).val().trim());
      $(".thVal").remove();
    }
  });
}

$(document).click(function(e) {
  if ($(".thVal") !== undefined) {
    if ($(".thVal").val() !== undefined) {
      $(".thVal").parent().html($(".thVal").val().trim());
      $(".thVal").remove();
    }
  }
});

















