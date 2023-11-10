<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'Расписание';
?>
<h1 class="mt-2"><?= Html::encode($this->title) ?></h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название кружка</th>
            <th scope="col">Учитель</th>
            <th scope="col">День недели</th>
            <th scope="col">Время</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        <tr>
            <?php foreach ($goodstatus as $schedule):?>
            <th scope="row"><?php echo $schedule->section->name;?></th>
            <td><?php echo $schedule->teacher->surname .' '. $schedule->teacher->name .' '. $schedule->teacher->patronymic ?></td>
            <td><p><?php echo $schedule['day']['day']?><br></td>
            <td><?php echo $schedule['time']['time']?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
