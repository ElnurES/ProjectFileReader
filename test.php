<?php

//Manul txt fili yaratmaq ucun yazilmish statik code....


ini_set('max_execution_time', -1);

$txt = "The Project Gutenberg EBook of The Adventures of Sherlock Holmes
by Sir Arthur Conan Doyle
(#15 in our series by Sir Arthur Conan Doyle)

Copyright laws are changing all over the world. Be sure to check the
copyright laws for your country before downloading or redistributing
this or any other Project Gutenberg eBook.

This header should be the first thing seen when viewing this Project
Gutenberg file.  Please do not remove it.  Do not change or edit the
header without written permission.

Please read the \"legal small print,\" and other information about the
eBook and Project Gutenberg at the bottom of this file.  Included is
important information about your specific rights and restrictions in
how the file may be used.  You can also find out about how to make a
donation to Project Gutenberg, and how to get involved.
";

for ($i=0; $i < 10000; $i++){

    set_time_limit(-1);

    $myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
}
