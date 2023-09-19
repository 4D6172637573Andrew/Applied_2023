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

<div class="modal fade" id="fixed_values_form" tabindex="-1" aria-labelledby="fixed_values_label" aria-hidden="true"
     data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <b><h3 class="modal-title" id="fixed_values_label">Edit Fixed Values</h3></b>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="edit_fixed_row_form_admin">
                    <div class="form-group">
                        <table class="col-md-12">
                            <tr>
                                <td>
                                    <label class="form-check-label" for="edit_fixed_row_id"
                                           id="edit_fixed_row_id_label" hidden>ID</label>
                                </td>
                                <td>
                                    <input name="edit_fixed_row_id" id="edit_fixed_row_id" type="text"
                                           class="form-control" hidden>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-check-label" for="edit_fixed_row_help"
                                           id="edit_fixed_row_help_label">Help</label>
                                </td>
                                <td>
                                    <input name="edit_fixed_row_help" id="edit_fixed_row_help" type="text" value="0"
                                           class="form-control numeric" min="0.00" max="9999.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-check-label" for="edit_fixed_row_sal_pack"
                                           id="edit_fixed_row)sal)pack_label">Salary Package</label>
                                </td>
                                <td>
                                    <input name="edit_fixed_row_sal_pack" id="edit_fixed_row_sal_pack" type="text"
                                           value="618.25"
                                           class="form-control numeric" min="0.00" max="9999.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-check-label" for="edit_fixed_row_other_income"
                                           id="edit_fixed_row_other_income_label">Other Income</label>
                                </td>
                                <td>
                                    <input name="edit_fixed_row_other_income" id="edit_fixed_row_other_income"
                                           value="355.88"
                                           class="form-control numeric" min="0.00" max="9999.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-check-label" for="edit_fixed_row_other_deduct"
                                           id="edit_fixed_row_other_deduct_label">Other Deduct</label>
                                </td>
                                <td>
                                    <input name="edit_fixed_row_other_deduct" id="edit_fixed_row_other_deduct"
                                           value="1500"
                                           type="text"
                                           class="form-control numeric" min="0.00" max="9999.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="edit_fixed_row_sat_penalty"
                                           id="edit_fixed_row_sat_penalty_label">Sat Penalty</label>
                                </td>
                                <td>
                                    <input name="edit_fixed_row_sat_penalty" id="edit_fixed_row_sat_penalty" type="text"
                                           value="0.50"
                                           class="form-control numeric" min="0.00" max="9.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="edit_fixed_row_sun_penalty"
                                           id="edit_fixed_row_sun_penalty_label">Sun Penalty</label>
                                </td>
                                <td>
                                    <input name="edit_fixed_row_sun_penalty" id="edit_fixed_row_sun_penalty" type="text"
                                           value="0.75"
                                           class="form-control numeric" min="0.00" max="9.99">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="edit_fixed_row_tax"
                                           id="edit_fixed_row_tax_label">Tax</label>
                                </td>
                                <td>
                                    <input name="edit_fixed_row_tax" id="edit_fixed_row_tax" type="text" value="682"
                                           class="form-control numeric" min="0.00" max="9999.99">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <input type="submit" name="edit_fixed_row" id="edit_fixed_row" value=" Update "
                               class="btn btn-outline-warning shadow">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>


</script>
