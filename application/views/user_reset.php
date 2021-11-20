<?php echo validation_errors('<div class="alert alert-danger text-center">', '</div>'); ?>

<form method="post" action="<?php echo site_url('user/reset_submit/'.$read_single_id['id']); ?>">
    <table class="table">
        <tr>
            <td>Password Baru</td>
            <td><input type="password" name="password" value="" required="" class="form-control"></td>
        </tr>
        <!-- ngecek password -->
        <?php
        ?>

        <tr>
            <td>Ulangi Password</td>
            <td><input type="password" name="passwordulang" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Simpan" class="btn btn-success"></td>
        </tr>
    </table>
</form>