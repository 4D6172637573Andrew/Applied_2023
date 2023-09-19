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
                <b><h3 class="modal-title" id="edit_values_label">Edit Values</h3></b>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="edit_values_admin">
                    <div class="form-group">
                        <table class="col-md-12">
                            <tr>
                                <td>
                                    <label class="form-check-label" for="edit_values_rate"
                                           id="edit_values_label">Rate:</label>
                                </td>
                                <td>
                                    <input name="edit_values_rate" id="edit_values_rate" type="number" value="50.84"
                                           class="form-control numeric" min="0.00" max="9999.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="edit_values_uni_allow"
                                           id="edit_values_uni_allow_label">Uniform Allowance:</label>
                                </td>
                                <td>
                                    <input name="edit_values_uni_allow" id="edit_values_uni_allow" type="number"
                                           value="1.44"
                                           class="form-control numeric" min="0.00" max="9.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="edit_values_lau_allow"
                                           id="edit_values_lau_allow_label">Laundry Allowance:</label>
                                </td>
                                <td>
                                    <input name="edit_values_lau_allow" id="edit_values_lau_allow" type="number" value="0.38"
                                           class="form-control numeric" min="0.00" max="9999.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="edit_values_pm_allow"
                                           id="edit_values_pm_allow_label">PM Allowance:</label>
                                </td>
                                <td>
                                    <input name="edit_values_pm_allow" id="edit_values_pm_allow" type="text" value="682"
                                           class="form-control numeric" min="0.00" max="9999.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-check-label" for="edit_value_s_date"
                                           id="edit_values_label">Start Date:</label>
                                </td>
                                <td>
                                    <input name="edit_values_s_date" id="edit_values_s_date" type="date" value="0"
                                           class="form-control numeric" min="0.00" max="9999.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-check-label" for="edit_values_s_time"
                                           id="edit_fixed_values_s_time_label">Start Time:</label>
                                </td>
                                <td>
                                    <input name="edit_values_s_time" id="edit_values_s_time" type="time"
                                           value="618.25"
                                           class="form-control numeric" min="0.00" max="9999.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-check-label" for="edit_values_e_time"
                                           id="edit_values_e_time_label">End Time:</label>
                                </td>
                                <td>
                                    <input name="edit_values_e_time" id="edit_values_e_time"
                                           value="1500"
                                           type="time"
                                           class="form-control numeric" min="0.00" max="9999.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-check-label" for="edit_values_s_holi"
                                           id="edit_values_s_holi">Start is a holiday:</label>
                                </td>
                                <td>
                                <input class="form-check-input" type="checkbox" id="s_holi">
            <label class="form-check-label mb-6" for="e_holi"></label><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="edit_values_e_holi"
                                           id="edit_values_e_holi_label">End is a holiday:</label>
                                </td>
                                <td>
                                <input class="form-check-input" type="checkbox" id="e_holi">
            <label class="form-check-label mb-3" for="e_holi"></label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <input type="submit" name="edit_values" id="edit_values" value=" Update "
                               class="btn btn-outline-warning shadow">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>


</script>
