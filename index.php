<?php

// Dinamik olaraq bir nece yerde istifadesini

// ve code tekrarinin qarshisini almaq ucun OOP prinsiplerine esaslanaraq Class istifade etmishem...

class FileReader {

    public $min;

    public $max;

    public $path;

//Classin instancesi yaranan zaman dinamik olaraq deyishenleri oturmek ucun costructor dan istifade etmishem....

    public function __construct($min, $max, $path)
    {
        $this->min = $min;

        $this->max = $max;

        $this->path = $path;
    }


//    Filenin hisse - hisse oxunmasi ucun yazilmish readFile metodu....

    public function readFile()
    {

        $txt = "";

//        Fileni oxumaq ucun acirim...

        $handle = fopen($this->path, "r");

//        Mueyyen edilmish araliqda datani almaq ucun for dongusunden istifade etmishem....

        for ($i = 0; $i <= $this->max; $i++){

//          Aldigimiz setir sayini line deyishenine menimsetmishem....

            $line = fgets($handle);

//            Min ve Max araligindaki setirlerin Txt deyishenine yoxlanilaraq elave edilmesi...

            if ($i >= $this->min and $i <= $this->max) {

                $txt .= $line;

            }

        }

//       Filenin aciq qalmamasi ucun ishlemin sonunda fileni baglayiram....

        fclose($handle);

        return $txt;

    }

//    Dinamik olaraq file name sini almaq ucun getFileName funksiyasi yaratmisham....

//    Bu funksiya bize istifade etdiyimiz filenin Name sin geri dondurur....
    public function getFileName(){

        $fileInfo = pathinfo($this->path);

        return $fileInfo['filename'];
    }


}



