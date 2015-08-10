<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wing Commander - World Creator's Workshop</title>
    <link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.4.2.min.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.4.2.min.js"></script>
</head>
<body>

<div id="layout" style="position: absolute; top: 10px; left: 10px; bottom: 10px; right: 10px;"></div>

<script type="text/javascript">
    var pstyle = 'border: 1px solid #dfdfdf; padding: 5px;';
    var topContent = '<h2 style="float:left">Campaign Editor - Wing Commander</h2><span id="authInfo" style="float:right"></span>';

    // widget configuration
    var config = {
        layout: {
            name: 'layout',
            padding: 0,
            panels: [
                {type: 'top', size: 70, style: pstyle, content: topContent},
                {type: 'left', size: 200, resizable: true, minSize: 120},
                {
                    type: 'main', overflow: 'hidden',
                    style: 'background-color: white; border: 1px solid silver; border-top: 0px; padding: 10px;',
                    tabs: {
                        active: 'tab0',
                        tabs: [{id: 'tab0', caption: 'Initial Tab'}],
                        onClick: function (event) {
                            w2ui.layout.html('main', 'Active tab: ' + event.target);
                        },
                        onClose: function (event) {
                            this.click('tab0');
                        }
                    }
                }
            ]
        },
        sidebar: {
            name: 'sidebar',
            nodes: [
                {
                    id: 'general', text: 'General', group: true, expanded: true, nodes: [
                    {id: 'item1', text: 'Item 1', img: 'icon-page'},
                    {id: 'item2', text: 'Item 2', img: 'icon-page'},
                    {id: 'item3', text: 'Item 3', img: 'icon-page'},
                    {id: 'item4', text: 'Item 4', img: 'icon-page'}
                ]
                }
            ],
            onClick: function (event) {
                var tabs = w2ui.layout_main_tabs;
                if (tabs.get(event.target)) {
                    tabs.select(event.target);
                    w2ui.layout.html('main', 'Tab Selected');
                } else {
                    tabs.add({id: event.target, caption: 'Tab ' + event.target, closable: true});
                    w2ui.layout.html('main', 'New tab added');
                }
            }
        }
    }

    $(function () {
        // initialization
        $('#layout').w2layout(config.layout);
        w2ui.layout.content('left', $().w2sidebar(config.sidebar));

        $('#authInfo').load('../authStatus.php');

    });
</script>

</body>
</html>