<?php
//Ajaxdan reguest gonderdiyimiz file...

//classdan instance yaradib, istifade etmek ucun index php filesini include eleyirem...

require_once 'index.php';

//reguestden gelen parametrlenin movcudlugunu yoxlayiram...

if (isset($_POST['max']) && isset($_POST['path'])) {

//Movcud classin instancesini yaradib parameteleri post eleyirem...

    $obj=new FileReader($_POST['min'], $_POST['max'], $_POST['path']);

    //Reguesten qayidan response...

    echo $obj->readFile();

}