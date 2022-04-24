<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
?>
<?php
Redirect('/index.php', false);
echo "hello sir1"
?>
