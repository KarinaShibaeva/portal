<?php foreach ($records as $record):?>
    <div class="card">
        <div class="card-body">
            <p class="fw-bold">Данные ребенка:</p>
            <p>Фамилия: <?php echo $record->child_surname . '<br>';?>
            Имя: <?php echo $record->child_name . '<br>';?>
            Отчество: <?php echo $record->child_patronymic . '<br>';?>
            Кружок: <?php echo $record->section->name . '<br>';?>
                Статус: <?php echo $record->getStatus() . '<br>';?></p>
        </div>
    </div>

<?php endforeach;?>