<?php

namespace System;


class Routes
{
    function __construct($path)
    {
        if (!empty($path[0])) {
            $ctrl = ucfirst($path[0]);
        } else {
            $ctrl = "Welcome";
        }
        if (file_exists("Controllers". DIRECTORY_SEPARATOR . $ctrl . ".php")) {
            $ctrl = "Controllers\\"  . $ctrl;
            if (class_exists($ctrl)) {
                $ctrl_obj = new $ctrl;
                if (!empty($path[1])) {
                    $method = $path[1];
                    if (method_exists($ctrl_obj, $method)) {
                        $arguments = array_slice($path, 2);
                        call_user_func_array(array($ctrl_obj, $method), $arguments);
                    } else {

                        echo "No such METHOD";
                    }
                } else {
                    if (method_exists($ctrl_obj, "index")) {
                        $ctrl_obj->index();
                    } else {
                        echo "The method index does not exist";
                    }
                }
            } else {
                echo "Class not exist";
            }
        } else {
            echo " File Not Exist";
        }

    }
}
