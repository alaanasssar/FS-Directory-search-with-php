# FS Directory search with php

FS_Directory A function to iterate over the specified directory recursively to search for specified words.

# Quick Overview
``` php
function FS_Directory($string, $dir)
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
```

# Usage
``` php
FS_Directory('text','./');
```
# Results

<img src="https://i.imgur.com/9Xq3Vuv.png" alt="FS-Directory-search-with-php">
