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
    <title>Лабораторная 1. Кравчик К. В.</title>
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
            <input type="submit" value="Отправить">
        </form>

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
            <input type="submit" value="Отправить">
        </form>

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
            <input type="submit" value="Отправить">
        </form>

        <!--Четвертое задание-->
        <h5>Добавить палату</h5>
        <form action="queries/add_ward.php" class="form-group">
            <input type="text" id="ward_name" name="ward_name"><br>
            <input type="submit" value="Отправить">
        </form>

        <!--5 задание-->
        <h5>Добавить медсестру</h5>
        <form action="queries/add_nurse.php" class="form-group">
            <input type="text" id="name" name="name"><br>
            <select name="department">
                <?php
                foreach ($departments as $d) {
                    echo "<option value=\"". $d ."\">". $d ."</option>";
                }
                ?>
            </select>
            <select name="shift">
                <?php
                foreach ($shifts as $d) {
                    echo "<option value=\"". $d ."\">". $d ."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Отправить">
        </form>

        <!--6 задание-->
        <h5>Добавить дежурство</h5>
        <form action="queries/add_dez.php" class="form-group">
            Медсестра
            <select name="fid_nurse">
                <?php
                    foreach ($nurses as $n) {
                        echo "<option value=\"". $n['id'] ."\">". $n['name'] ."</option>";
                    }
                ?>
            </select>
            Палата
            <select name="fid_ward">
                <?php
                    foreach ($wards as $w) {
                        echo "<option value=\"". $w['id'] ."\">". $w['name'] ."</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Отправить">
        </form>
    
    </section>
</body>
</html>