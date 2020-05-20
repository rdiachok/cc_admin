<?php
/*
	firstly we check put button by user
*/
if (isset($_POST['send-param'])) {
    $form_id_en = $_POST['form_id_en'];
    $form_id_dslam = $_POST['form_id_dslam'];
    $form_date_e = $_POST['form_date_e'];
    $form_recom = $_POST['form_recom'];
    $show_block = 'none';
    $show_block1 = 'none';
    $show = 'block';
    function clean($value = "")
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }
    function check_length($value = "", $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }
    $form_id_en = clean($form_id_en);
    $form_id_dslam = clean($form_id_dslam);
    $form_recom = clean($form_recom);
    $form_date_e = clean($form_date_e);

    if (!empty($form_id_en) && !empty($form_id_dslam) && !empty($form_recom) && !empty($form_date_e)) {
        if (check_length($form_id_en, 15, 17) && check_length($form_id_dslam, 4, 25) && check_length($form_recom, 2, 250) && check_length($form_date_e, 2, 16)) {
            $alert = 'alert alert-success';
            $text = "АВР за номером ЕН: $form_id_en та ДСЛАМ-портом: $form_id_dslam з датою закриття:
$form_date_e, успішно закрито!";
            $show_block1 = 'block';
        } else { // добавили сообщение
            $alert = 'alert alert-danger';
            $text = "Введені дані не коректні!";
            $show_block = 'block';
        }
    } else { // добавили сообщение
        $alert = 'alert alert-danger';
        $text = "Ви вказали дані не у всіх полях!";
        $show_block = 'block';
    }
} else {
    $show_block = 'none';
    $show_block1 = 'none';
}


?>


<div class="alert alert-success" role="alert" style="display: <?php echo $show_block1; ?>">
    АВР за номером ЕН: <?php echo $form_id_en; ?> та ДСЛАМ-портом: $form_id_dslam з датою закриття: $form_date_e,
    успішно
    закрито!
</div>
<div class="<?php echo  $alert ?>" role="alert" style="display: <?php echo $show_block; ?>">
    <?php echo $text; ?>
</div>