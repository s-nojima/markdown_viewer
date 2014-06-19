<?php
    include_once "markdown.php";
    include_once "function.php";
    $filelist = getFileList('/var/www/html/document');
?>
<html>
<head>
<meta http-equiv="content-Type" content ="text/html; charset=UTF-8">
<title>Markdown Viewer</title>
<link href="markdown.css" rel="stylesheet">
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
        echo "<div id=sep><hr></div>";
        echo "</div>";
        $i++;
    }
?>
</div>

<div class="footer">&copy; 2014 Red C Lab.</div>

</body>
