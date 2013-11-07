<?php
require_once "models/admin/Admin.php";
require_once "models/student/Student.php";
require_once "models/teacher/Teacher.php";
require_once "models/user/User.php";
require_once ('vendor/phpExcelReader/Excel/reader.php');

$path = $_FILES['file']['tmp_name'];

if (empty($_POST) || $path === ''){
    $url = Notice::addTo('匯入失敗：請選擇種類並上傳檔案！', 'home/upload');
    $url = Router::toUrl($url);
} else {

    $Into_type = $_POST['type'];
    $data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding('UTF-8');
    $data->read($path);
    $rows = [];
    $col_name = [];

    // 讀取資料
    $MaxRows = $data->sheets[0]['numRows'];
    $MaxCols = $data->sheets[0]['numCols'];

    for ($j = 1; $j <= $MaxCols; $j++) {
        $col_name[$j] =  $data->sheets[0]['cells'][1][$j];
    }

    for ($i = 2; $i <= $MaxRows; $i++) {

        for ($j = 1; $j <= $MaxCols; $j++) {

            $col = $col_name[$j];
            $rows[$i-1][$col] = $data->sheets[0]['cells'][$i][$j];

        }
     }

    $admin = Admin::from(User::from($_SESSION['user_id']));

    foreach ($rows as $row) {
        switch ($Into_type) {
            case 'Course':
                $teacher = Teacher::findSn($row['teacher']);
                Course::create(
                    $teacher,
                    $row['sn'],
                    $row['type'],
                    $row['department'],
                    $row['grade'],
                    $row['group'],
                    $row['name'],
                    $row['system'],
                    $row['semester'],
                    $row['year']
                );
                break;
            case 'Student':
            $admin->create_user(
                'Student',
                '0000', //$row['pwd'],
                $row['sn'],
                $row['email'],
                $row['group'],
                $row['department'],
                $row['name'],
                $row['system'],
                $row['phone'],
                $row['year']
            );
                break;
            case 'Teacher':
             $admin->create_user(
                'Teacher',
                '0000', //$row['pwd'],
                $row['sn'],
                $row['email'],
                $row['name'],
                $row['phone'],
                $row['phone_ext']
            );
                break;
            default:
                break;
        }

    }

    $url = Router::toUrl("home/upload");
}





Router::redirect($url);
