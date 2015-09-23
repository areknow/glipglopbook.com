<?php
if(isset($_POST['login-submit'])) {
    
    include 'con.php';
    
    $usr = mysql_real_escape_string($_POST['email']);
    $pas = mysql_real_escape_string($_POST['password']);
    $sec = hash('sha256', $pas);

    $sql = mysql_query("SELECT * FROM users  
        WHERE email='$usr' AND 
        password='$sec' LIMIT 1");
    
    if(mysql_num_rows($sql) == 1) {
        $row = mysql_fetch_array($sql);
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['logged'] = TRUE;
        header("Location: ../profile");
        exit;
    }
    
    else {
        session_start();
        $_SESSION['logged'] = FALSE;
        header("Location: ../");
        exit;
    }
}

else {
    header("Location: ../");
    exit;
}
