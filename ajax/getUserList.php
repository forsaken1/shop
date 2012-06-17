<?php
try {
    //читаем параметры
    /*$curPage = $_POST['page'];
    $rowsPerPage = $_POST['rows'];
    $sortingField = $_POST['sidx'];
    $sortingOrder = $_POST['sord'];
 
    //подключаемся к базе
    $dbh = new PDO('mysql:host=localhost;dbname=name', 'user', 'pass');
    //указываем, мы хотим использовать utf8
    $dbh->exec('SET CHARACTER SET utf8');
 
    //определяем количество записей в таблице
    $rows = $dbh->query('SELECT COUNT(id) AS count FROM users');
    $totalRows = $rows->fetch(PDO::FETCH_ASSOC);
 
    $firstRowIndex = $curPage * $rowsPerPage - $rowsPerPage;
    //получаем список пользователей из базы
    $res = $dbh->query('SELECT * FROM users ORDER BY '.$sortingField.' '.$sortingOrder.' LIMIT '.$firstRowIndex.', '.$rowsPerPage);
 */
    //сохраняем номер текущей страницы, общее количество страниц и общее количество записей
    $response->page = 1;
    $response->total = 1;
    $response->records = 1;
 
    $i=0;
    while($row = $res->fetch(PDO::FETCH_ASSOC)) {
        $response->rows[$i]['id']=1;
        $response->rows[$i]['cell']=array('id', 'surname', 'fname', 'lname');
        $i++;
    }
    echo json_encode($response);
}
catch (PDOException $e) {
    echo 'Database error: '.$e->getMessage();
}
?>