<?php
if(Yii::$app->session->hasFlash('noRequests')) {
    echo '<div class="alert alert-light">' . Yii::$app->session->getFlash('noRequests') . '</div>';
}
?>

<?php foreach ($records as $record):?>
    <div class="alert alert-secondary" role="alert">
        <h4 class="alert-heading">Заявка номер: <?php echo $record['id']?></h4>
        <p>Фамилия: <?php echo $record->child_surname . '<br>';?>
           Имя: <?php echo $record->child_name . '<br>';?>
           Отчество: <?php echo $record->child_patronymic . '<br>';?>
           Кружок: <?php echo $record->section->name . '<br>';?></p>
        <hr>
        <p class="mb-0"><?php echo $record->getStatus() . '<br>';?></p>
    </div>
<?php endforeach;?>