<?php


namespace Alevel\Rewrite\Plugin\Provider;

use Alevel\RandomNumber\Provider\RandomNumberProvider as Component;

class RandomNumberProviderPlugin
{
    public function beforegetNumber(
        Component $subject

    ){

        echo 'this text appears if beforePlugin works';
echo '<br>';

    }

public function aftergetNumber(
    Component $subject,
    $result
){
   echo $result;
   echo '<br>';
   echo 'new result after plugin - ';
   $result = 200;
    return $result;

}

}
