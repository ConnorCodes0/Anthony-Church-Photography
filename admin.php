<?php 
    include_once 'includes/head.inc.php';
?>
<title>Anthony Church Photography | Admin login</title>
</head>
    <body>
        <div class="admin-login-section">
            <div class="admin-wrapper">
                <form method="post" action="includes/admin-login.inc.php" class="admin-login" autocomplete="off">
                    <input type="text" class="admin-input" name="admin-name" placeholder="Username..." required>
                    <input type="password" class="admin-input" name="admin-pass" placeholder="Password..." required>
                    <button type="submit" name="admin-submit" class="admin-submit">Login</button>
                </form>

                <a href="javascript:history.back()" class="back-btn">Go back</a>
            </div>
        </div>
    </body>
</html>

