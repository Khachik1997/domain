<?php

namespace System;


class View
{
    public function render($file_name, $case = true)
    {
        if (file_exists("Views" . DIRECTORY_SEPARATOR . $file_name . ".php")) {
            if ($case) {
                include "Views/layout/header.php";
                include "Views" . DIRECTORY_SEPARATOR . $file_name . ".php";
                include "Views/layout/footer.php";
            } else {
                include "Views" . DIRECTORY_SEPARATOR . $file_name . ".php";
            }

        } else {
            echo "Page $file_name does not exist ";
        }
    }
}