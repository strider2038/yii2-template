<div style="margin-left: 20px">
<h1>HTML files</h1>
<?php
$filenames = scandir(\Yii::getAlias('@html/pages'));
$items = [];
foreach ($filenames as $filename) {
    if (strpos($filename, ".php") === false) {
        continue;
    }
    $title = 'No title';
    $html = file_get_contents(\Yii::getAlias('@html/pages/') . $filename);
    if (preg_match("~<title:>(.*)<:title>~", $html, $preg)) {
        $title = trim($preg[1]);
    }
    $group = 'Default group';
    if (preg_match("~<group:>(.*)<:group>~", $html, $preg)) {
        $group = trim($preg[1]);
    }
    $layout = '';
    if (preg_match("~<layout:>(.*)<:layout>~", $html, $preg)) {
        $layout = trim($preg[1]);
    }
    $items[] = compact('group', 'title', 'layout', 'filename');
}
if (empty($items)) {
    echo 'empty';
    return;
}

unset($title, $group);
foreach ($items as $key => $row) {
    $group[$key]  = $row['group'];
    $title[$key] = $row['title'];
}
array_multisort($group, SORT_ASC, $title, SORT_ASC, $items);

$currentGroup = '';
$html = [
    'grouped' => '',
    'ungrouped' => '',
];
foreach ($items as $item) {
    $key = 'grouped';
    if ($item['group'] == 'Default group') {
        $key = 'ungrouped';
    }
    if ($item['group'] != $currentGroup) {
        $html[$key] .= "<h2>{$item['group']}</h2>";
    }
    $url = '/html?';
    if (!empty($item['layout'])) {
        $url .= 'layout=' . $item['layout'] . '&';
    }
    $url .= 'page=' . basename($item['filename'], '.php');
    $html[$key] .= "<p><a href=\"{$url}\">{$item['title']} <span style=\"color: #999;\">{$item['filename']}</span></a></p>";
    $currentGroup = $item['group'];
}
echo $html['grouped'] . $html['ungrouped'];
?>
</div>