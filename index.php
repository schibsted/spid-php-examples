<html>
    <head>
        <title>SPiD PHP Examples</title>
    </head>
    <body>
        <ul>
        <?php
            $dirs = (glob('./*', GLOB_ONLYDIR));
            foreach ($dirs as $dir) {
                if (in_array($dir, ['./config', './vendor'])) { continue; }
                echo "<li><a href='{$dir}'>". ltrim($dir, './') . "</a></li>";
            }
        ?>
        </ul>
    </body>
</html>