<?php
//取得目前資料庫連線
$db = JFactory::getDbo();

//取得query物件
$query = $db->getQuery(true);

//組合query
$query
    ->select($db->quoteName(array('id', 'name')))
    ->from($db->quoteName('#__users'))
    ->where($db->quoteName('block') . ' = '. $db->quote('0'))
    ->order('id ASC');

// 設定資料庫物件的query物件為要使用的query
$db->setQuery($query);

// 執行並載入查詢結果為stdClass物件
$users = $db->loadObjectList();