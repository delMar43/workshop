<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>World Creator's Workshop</title>
    <link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.4.2.min.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.4.2.min.js"></script>
</head>
<body>

<div id="layout" style="position: absolute; top: 10px; left: 10px; bottom: 10px; right: 10px;"></div>

<script type="text/javascript">
    var topContent = '<h2 style="float:left">World Creator&rsquo;s Workshop</h2><span id="authInfo" style="float:right"></span>';

    var mainContent = '<div id="mainContent">' +
        '<h2>Wing Commander</h2>' +
        '<h3><a href="wc/" target="_blank">Campaign Editor</a></h3>' +
        '<h3><a href="wc/savegameEditor.html" target="_blank">Savegame Editor</h3>' +
        '</div>';

    $(function () {
        var pstyle = 'border: 1px solid #dfdfdf; padding: 5px;';
        $('#layout').w2layout({
            name: 'layout',
            panels: [
                {type: 'top', size: 70, style: pstyle, content: topContent},
                {type: 'main', style: pstyle, content: 'main'}
            ]
        });

        w2ui['layout'].content('main', mainContent);

        $('#authInfo').load('authStatus.php');
    });
</script>

</body>
</html>