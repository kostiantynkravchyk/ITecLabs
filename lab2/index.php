<?php
require 'connection.php';

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Лабораторная 3. Кравчик К.В.</title>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="ajax/ajax.js"></script>
    
    <style>tr,td,th{padding: 10px;}</style>
</head>
<body>
    <section class="container">
        <!--Первое задание-->
        <h5>Перечень палат, в которых дежурит выбранная медсестра</h5>
        <form action="queries/wards-by-nurse.php" class="form-group">
            <input type="text" id="nurseName" name="nurseName"><br>
            <input type="button" value="Отправить" onclick="wardsByNurse(this)">
            <input type="button" value="Данные с LocalStorage" onclick="wardsByNurseLocal(this)">
        </form>
        <div id="result1"></div>
        <div id="result1local" style="display: none">
            <span>Local storage:</span>
            <div id="result1localinternal"></div>
        </div>

        <!--Второе задание-->
        <h5>Медсестры, дежурившие в указанном отделении</h5>
        <form action="queries/nurse-by-dept.php" class="form-group">
            <input type="text" id="dept" name="dept"><br>
            <input type="button" value="Отправить" onclick="nurseByDept(this)">
            <input type="button" value="Данные с LocalStorage" onclick="nurseByDeptLocal(this)">
        </form>
        <table id="result2">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>ID</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id="result2local" style="display: none">
            <span>Local storage:</span>
            <table id="result2localinternal">
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>ID</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>


        <!--Третье задание-->
        <h5>Всех дежурствах (в любых палатах) в указанную смену в указанном отделении</h5>
        <form action="queries/duty-by-ward-and-shift.php" class="form-group">
            <input type="text" id="dept" name="dept"><br>
            <input type="text" id="shift" name="shift"><br>
            <input type="button" value="Отправить" onclick="dutyByWardAndShift(this)">
            <input type="button" value="Данные с LocalStorage" onclick="dutyByWardAndShiftLocal(this)">
        </form>
        <table id="result3">
            <thead>
                <tr>
                    <th>Смена</th>
                    <th>Дата</th>
                    <th>Медсестры</th>
                    <th>Отделение</th>
                    <th>Палаты</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id="result3local" style="display: none">
            <span>Local storage:</span>
            <table id="result3localinternal">
                <thead>
                    <tr>
                    <th>Смена</th>
                    <th>Дата</th>
                    <th>Медсестры</th>
                    <th>Отделение</th>
                    <th>Палаты</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </section>
</body>
</html>