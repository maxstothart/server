<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
?>
<?php
Redirect('welcome.php', false);
echo "hello sir1"
?>
