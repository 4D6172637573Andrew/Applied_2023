<style>
    .modal-header {
        padding: 9px 15px;
        border-bottom: 1px solid black;
        background-color: orange;
        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .modal-body {
        background-color: white;
    }

    .modal-content {
        border-radius: 6px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        background-color: transparent;
    }


</style>

<div class="modal fade" id="edit_values_form" tabindex="-1" aria-labelledby="edit_values_label" aria-hidden="true"
     data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <b><h3 class="modal-title" id="edit_values_label">Edit Values </h3></b>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <form method="post" id="edit_values_admin">
        <div class="form-group">
            <table class="col-md-12">
                <tr>
                    <td>
                        <label class="form-check-label" for="edit_values_rate">Rate:</label>
                    </td>
                    <td>
                        <input name="edit_values_rate" id="edit_values_rate" type="number" class="form-control numeric" min="0.00" max="9999.99">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="edit_values_uni_allow">Uniform Allowance:</label>
                    </td>
                    <td>
                        <input name="edit_values_uni_allow" id="edit_values_uni_allow" type="number" value="2" class="form-control numeric" min="0.00" max="9.99">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="edit_values_lau_allow">Laundry Allowance:</label>
                    </td>
                    <td>
                        <input name="edit_values_lau_allow" id="edit_values_lau_allow" type="number" value="1" class="form-control numeric" min="0.00" max="9999.99">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="edit_values_pm_allow">PM Allowance:</label>
                    </td>
                    <td>
                        <input name="edit_values_pm_allow" id="edit_values_pm_allow" type="text" value="682" class="form-control numeric" min="0.00" max="9999.99">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="form-check-label" for="edit_values_s_date">Start Date:</label>
                    </td>
                    <td>
                        <input name="edit_values_s_date" id="edit_values_s_date" type="date" value="0" class="form-control numeric" min="0.00" max="9999.99">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="form-check-label" for="edit_values_s_time">Start Time:</label>
                    </td>
                    <td>
                        <input name="edit_values_s_time" id="edit_values_s_time" type="time" value="618.25" class="form-control numeric" min="0.00" max="9999.99">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="form-check-label" for="edit_values_e_time">End Time:</label>
                    </td>
                    <td>
                        <input name="edit_values_e_time" id="edit_values_e_time" value="1500" type="time" class="form-control numeric" min="0.00" max="9999.99">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="form-check-label" for="s_holi">Start is a holiday:</label>
                    </td>
                    <td>
                        <input class="form-check-input" type="checkbox" id="s_holi">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="e_holi">End is a holiday:</label>
                    </td>
                    <td>
                        <input class="form-check-input" type="checkbox" id="e_holi">
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <div class="modal-footer">
            <input type="submit" name="edit_values" id="edit_values" value=" Update " class="btn btn-outline-warning shadow">
        </div>
    </form>
</div>
        </div>
    </div>
</div>



<script>


</script>
