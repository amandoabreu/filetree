<!DOCTYPE html>
<!--
Project: File Tree
File: index.php
Creator: Amando Filipe
Github: https://github.com/amando96
Web: http://amando-filipe.com
Email: eu@amando-filipe.com
Twitter: @mndflp
Date: Oct 8, 2014
Time: 9:33:14 PM
-->
<?php
    include 'inc/tree.class.php'; // get the class file
    $dir = './myfiles'; // directory to get files from
    $files = new FileTree($dir); // create new instance of the file class
    
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>File tree</title>
        <!-- jQuery -->
                <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <!-- end -->
        <link rel='stylesheet' type='text/css' href='css/file_tree.css'/> 
        <script src="js/file_tree_collapse.js"></script>
        <!--WEB FONTS -->
        <link href='http://fonts.googleapis.com/css?family=Lato:100&v2' rel='stylesheet' type='text/css'>
        <!--&&&&&&&&&-->		
    </head>
    <body> 
        <div id="wrapper">
            <div id="container">
                <h1 class='h1' style='background-image: url(images/folder_blue_stuffed.png);' >My Files</h1>
                <span><a id="collapse_all" href='javascript:;'>Uncollapse All</a></span><br/>
                <ul id="file_tree">                    
                    <?php $files->listFiles(); ?>			
                </ul>
            </div>
        </div>
    <body>
</html>
