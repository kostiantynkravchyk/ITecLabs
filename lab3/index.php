<?php
require "connection.php";
require "tables/nurses.php";
require "tables/wards.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Лабораторная 3. Кравчик К. В.</title>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="ajax/ajax.js"></script>
</head>
<body>
    <section class="container">
        
        <!--Первое задание-->
        <h5>Перечень палат, в которых дежурит выбранная медсестра</h5>
        <form action="queries/wards-by-nurse.php" class="form-group">
            <select name="nurse_id">
                <?php
                    foreach ($nurses as $n) {
                        echo "<option value=\"". $n['id'] ."\">". $n['name'] ."</option>";
                    }
                ?>
            </select>
            <input type="button" value="Отправить" onclick="wardsByNurse(this)">
        </form>
        <div id="result1"></div>

        <!--Второе задание-->
        <h5>Медсестры выбранного отделения</h5>
        <form action="queries/nurses-by-department.php" class="form-group">
            <select name="depart">
                <?php
                foreach ($departments as $d) {
                    echo "<option value=\"". $d ."\">". $d ."</option>";
                }
                ?>
            </select>
            <input type="button" value="Отправить" onclick="nursesByDepartment(this)">
        </form>
        <table id="result2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Дата</th>
                    <th>Отделение</th>
                    <th>Смена</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <!--Третье задание-->
        <h5>Дежурства (в любых палатах) в указанную смену</h5>
        <form action="queries/wards-by-shift.php" class="form-group">
            <select name="shift">
                <?php
                foreach ($shifts as $d) {
                    echo "<option value=\"". $d ."\">". $d ."</option>";
                }
                ?>
            </select>
            <input type="button" value="Отправить" onclick="wardsByShift(this)">
        </form>
        <table id="result3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Дата</th>
                    <th>Отделение</th>
                    <th>Смена</th>
                    <th>ID Палаты</th>
                    <th>Палата</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    
    </section>
</body>
</html>