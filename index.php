<?PHP include 'getdirs.php';
?><!doctype html>
<html>
    <head>
        <title>localhost</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script>
            var sorted = false;
            function getDirArray() {
                $.ajax({
                    type: 'POST',
                    url: 'getdir.php',
                    data: 'id=testdata',
                    dataType: 'json',
                    cache: false,
                    success: function(result) {
                        $('.wrapper').html(result);
                    },
                });
            }
            function sortDirAlphabetical() {
                var mylist = $('.wrapper');
                var listitems = mylist.children('div').get();
                listitems.sort(function(a, b) {
                   return $(a).text().toUpperCase().localeCompare($(b).text().toUpperCase());
                });
                $.each(listitems, function(index, item) {
                   mylist.append(item); 
                });
            }
            $(document).ready(function() {
                $('#drop').click(function() {
                    $('.dropdown').slideToggle('fast');
                });
                $("#cmn-toggle-4").on("click", function() {
                    if (!sorted) {
                        sortDirAlphabetical();
                        sorted = true;
                    }
                    else {
                        getDirArray();
                        sorted = false;
                    }
                });
                getDirArray();
            });
        </script>
    </head>
    <body>
        <div class="bg"></div>
        <nav>
            <div class="inline">
                <div class="inline block">
                    #localhost
                </div>
            </div>
            <div class="switch-wrap">
                <div class="switch">
                    <div class="inline label desktop">Date Modified</div>
                    <input name="switcher" id="cmn-toggle-4" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                    <label for="cmn-toggle-4"></label>
                    <div class="inline label desktop">Alphabetical</div>
                </div>
            </div>
            <div class="inline right">
                <div id="drop" class="inline block">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </nav>
        <div class="dropdown">
            <div class="row">
                <i class="fa fa-table"></i>PHP Documentation
            </div>
            <div class="row">
                <i class="fa fa-database"></i>MySQL Documentation
            </div>
            <div class="row">
                <i class="fa fa-globe"></i>Apache Documentation
            </div>
            <div class="row">
                <i class="fa fa-cubes"></i>MAMP Documentation
            </div>
            <div class="row">
                <i class="fa fa-coffee"></i>JavaScript Reference
            </div>
        </div>
        <div class="dropdown-exit"></div>
        <div class="wrapper"></div>
    </body>
</html>
