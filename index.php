<?php

function txt_search($string, $dir)
{
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir)) as $f) {
        if (is_file($f->getPathname())) {
            $content = file($f->getPathname());
            foreach ($content as $key => $line) {
                if (stripos($line, $string) !== false) {
                    $file_name = $f->getPathname();
                    $file_name = str_replace('.\\', '', $file_name);
                    echo 'File name: ' . $file_name;
                    $line = str_replace($string, '<b style="color: red;">' . $string . '</b>', $line);
                    $line = str_replace('  ', '', $line);
                    echo "<br />[" . $key . "] => " . $line . "<br /><hr />";
                    
                }
            }
            
        }
    }
}

echo '<pre>';
txt_search('something', './');
echo '</pre>';
