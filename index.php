<?php
header('Cache-Control: no-cache');
header('Content-Type: text/html; charset=UTF-8');

session_start();

$incomingLink = $_GET['ajfsp_link'] ?? null;
if (is_string($incomingLink) &&
    (strpos($incomingLink, 'web+ajfsp://') === 0 || strpos($incomingLink, 'ajfsp://') === 0)) {
    header('Referrer-Policy: no-referrer');
    header('Cache-Control: no-store');

    if (empty($_SESSION['core_host'])) {
        session_unset();
    }

    $_SESSION['ajfsp_link'] = strpos($incomingLink, 'web+ajfsp://') === 0
        ? substr($incomingLink, 4)
        : $incomingLink;

    if (!empty($_SESSION['core_host'])) {
        header('Location: main/index.php', true, 303);
        exit;
    }

    header('Location: index.php', true, 303);
    exit;
} elseif (isset($_GET['logout']) || empty($_SESSION['ajfsp_link'])) {
    session_unset();
}

require_once 'main/subs.php';
require_once 'main/login.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>php-applejuice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $_SESSION['stylesheet']; ?>
    <script src="js/protocol-handler.js"></script>
    <style>
        select {
            width: 100%;
        }
    </style>
</head>
<body>
<div align="center">
    <h2><?php echo $_SESSION['language']['LOGIN']['HEADLINE']; ?></h2>
    <form name="loginform" action="main/index.php" method="post" autocomplete="off">
        <table>
            <tr>
                <td>
                    <label for="host"><?php echo $_SESSION['language']['LOGIN']['CORE_HOST']; ?></label>:
                </td>
                <td>
                    <input type="url" id="host" name="host" value="<?php echo ($_ENV['CORE_HOST'] ?: $_ENV['REAL_IP']) . ':' . ($_ENV['CORE_PORT'] ?? 9851); ?>" size="24" required/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="cpass"><?php echo $_SESSION['language']['LOGIN']['CORE_PASSWORD']; ?></label>:
                </td>
                <td>
                    <input id="cpass" type="password" name="cpass" value="" size='24' autofocus required/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="c_style"><?php echo $_SESSION['language']['LOGIN']['GUI_STYLE']; ?></label>:
                </td>
                <td>
                    <select id="c_style" name="c_style" size="1" onchange="window.location.href='index.php?c_style='+document.forms[0].c_style.value+'&amp;c_lang='+document.forms[0].c_lang.value;">
                        <?php foreach ($styles as $styleValue => $styleName): ?>
                            <option <?php if ($styleValue === $_SESSION['stylefile']) echo ' selected'; ?> value="<?php echo $styleValue; ?>"><?php echo $styleName; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="c_lang"><?php echo $_SESSION['language']['LOGIN']['GUI_LANGUAGE']; ?></label>:
                </td>
                <td>
                    <select id="c_lang" name="c_lang" size="1" onchange="window.location.href='index.php?c_lang='+document.forms[0].c_lang.value+'&amp;c_style='+document.forms[0].c_style.value;">
                        <?php foreach ($languages as $languageValue => $languageName): ?>
                            <option <?php if ($languageName === $_SESSION['language']['name']) echo ' selected'; ?> value="<?php echo $languageName; ?>"><?php echo $languageName; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div align="right">
                        <input type="submit" value="<?php echo $_SESSION['language']['LOGIN']['OK']; ?>"/>
                    </div>
                </td>
            </tr>
        </table>
    </form>
    <div class="authors">
        Code by UP &middot; maintained by <a href="https://github.com/applejuicenetz/" target="_blank">appleJuiceNETZ</a>
    </div>
    <div class="authors">
        <a href="https://github.com/applejuicenetz/phpgui-legacy" target="_blank"><?php echo PHP_GUI_VERSION; ?></a>
    </div>
</div>
</body>
</html>
