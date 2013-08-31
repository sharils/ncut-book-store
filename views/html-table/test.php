<?php
require_once 'views/html-table/HtmlTable.php';

$table = new HtmlTable(12, 4, function ($row, $col) {
  	if ($row === 0) {
  		return true;
  	}
  	if ($col === 0) {
  	 	return true;
 	}
	return false;
}, function ($row) {
    if ($row === 0) {
    	return 0;
    }
    if ($row === 1) {
    	return 1;
    }
    return floor(($row - 2) / 5) + 2;
}, function ($row, $col) {
    return $row * 100 + $col;
});
echo $table;
