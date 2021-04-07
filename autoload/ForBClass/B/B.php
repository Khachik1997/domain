<?php
namespace ForBClass\B;
use ForAClass\fileX\FileZ\A\A;
class  B extends A{
    function __construct(){
        parent::__construct();
        echo "Class B ";
    }
}