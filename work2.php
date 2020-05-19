<?php
/*
	firstly we check put button by user
*/
if (isset($_POST['send-param'])) {
    $form_id_en = $_POST['form_id_en'];
    $form_id_dslam = $_POST['form_id_dslam'];
    $form_date_e = $_POST['form_date_e'];
    $form_recom = $_POST['form_recom'];
    $show_block = 'block';
    $show = 'block';
} else {
    $show_block = 'none';
}

?>


<div class="alert alert-success" role="alert" style="display: <?php echo $show_block; ?>">
    АВР за номером ЕН: <?php echo $form_id_en; ?> та ДСЛАМ-портом: $form_id_dslam з датою закриття: $form_date_e,
    успішно
    закрито!
</div>