<html>
<head>


<?php
function navigateur($agent=NULL)
{
$navs = array(
            'msie'      => 'Internet Explorer',
            'firefox'   => 'Mozilla Firefox',
            'opera'     => 'Opera',
            'safari'    => 'Safari',
            'netscape'  => 'Netscape Navigator',
            'konqueror' => 'Konqueror',
            'google' => 'Chrome');

$inconnu = '(navigateur inconnu)';

        if (!isset($agent))
            $agent = $_SERVER['HTTP_USER_AGENT'];
        $agent = strtolower($agent);
        foreach ($navs as $key => $value)
            if (strpos($agent, $key) !== false)
                return $value;
        return $inconnu;
}
?>

<?php if(navigateur('google')) {?>
	<meta http-equiv="Refresh" content="1; URL=./view/index.php ">
	<?php }else{ ?>
	<meta http-equiv="refresh" content="secondes;URL=./view/index.php">
	<?php }?>
</head>
<body>

</body>
</html>

