<?php
    include_once "markdown.php";
    include_once "function.php";
    $filelist = getFileList('/var/www/document');
?>
<html>
<head>
<meta http-equiv="content-Type" content ="text/html; charset=UTF-8">
<title>Document</title>
<link href="github.css" rel="stylesheet">
<link href="main.css" rel="stylesheet">
</head>
<body>

<div class="header">Markdown Viewer</div>

<div class="list">
<?php
    $i=0;
    foreach($filelist as $value){
        ${"html_".$i} = Markdown(file_get_contents("$value"));
        $name = "$html_".$i;
        echo "<a href=#" .$name.">" . basename($value,".md") ."</a><br />";
        $i++;
    }
?>
</div>

<div class="view">
<?php 
    $i=0;
    while(isset(${"html_".$i})){
        echo "<div id=".$i.">";
        echo ${"html_".$i};
        echo "</div>";
        $i++;
    }
?>
</div>

<div class="footer">footer</div>

</body>
