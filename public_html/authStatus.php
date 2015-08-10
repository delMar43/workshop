<?php
include "tools.php";
session_start();

function checkLogin()
{
    if (isset($_SESSION['__user_name__'])) {
        return true;
    } else {
        return false;
    }
}

if (checkLogin()) {
    echo logoutButton();
} else {
    ?>
    <button class="btn" onclick="openPopup()">Login</button>

    <script type="text/javascript">
        function openPopup() {
            if (!w2ui.loginForm) {
                $().w2form({
                    name: 'loginForm',
                    url: 'login.php',
                    style: 'border: 0px; background-color: transparent;',
                    formHTML: '<div class="w2ui-page page-0">' +
                    '    <div class="w2ui-field">' +
                    '        <label>Username:</label>' +
                    '        <div>' +
                    '           <input name="username" type="text" maxlength="100" style="width: 250px"/>' +
                    '        </div>' +
                    '    </div>' +
                    '    <div class="w2ui-field">' +
                    '        <label>Password:</label>' +
                    '        <div>' +
                    '            <input name="password" type="password" maxlength="100" style="width: 250px"/>' +
                    '        </div>' +
                    '    </div>' +
                    '</div>' +
                    '<div class="w2ui-buttons">' +
                    '    <button class="btn" name="save">Login</button>' +
                    '</div>',
                    fields: [
                        {
                            field: 'username', type: 'text', required: true
                        },
                        {
                            field: 'password', type: 'password', required: true
                        }
                    ],
                    actions: {
                        "save": function () {
                            this.save();
                        }
                    },
                    onSave: function (event) {
                        w2popup.close();
                        $("#authInfo").load("authStatus.php");
                    }
                });
            }
            $().w2popup('open', {
                title: 'Form in a Popup',
                body: '<div id="loginForm" style="width: 100%; height: 100%;"></div>',
                style: 'padding: 15px 0px 0px 0px',
                width: 500,
                height: 300,
                onToggle: function (event) {
                    $(w2ui.loginForm.box).hide();
                    event.onComplete = function () {
                        $(w2ui.loginForm.box).show();
                        w2ui.loginForm.resize();
                    }
                },
                onOpen: function (event) {
                    event.onComplete = function () {
                        // specifying an onOpen handler instead is equivalent to specifying an onBeforeOpen handler, which would make this code execute too early and hence not deliver.
                        $('#w2ui-popup #loginForm').w2render('loginForm');
                    }
                }
            });
        }
    </script>

<?php }