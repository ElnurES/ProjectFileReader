<?php

//classdan instance yaradib, istifade etmek ucun index php filesini include eleyirem...

include 'index.php';

//Ajax sorquda dinamik deyishen istifade etmek ucun global deyishen yaratdim...

$pathUrl = "test.txt";

$min = 0;

$max = 50;

//Classin istancesini yaradib verilmish sherte gore parametrleri otururem...

$obj=new FileReader($min,$max, $pathUrl);

?>

<!--Gelen reguesti viewda gostermek ucun html tertib etmishem...-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<style>
    .container{
        width: 80%;
        margin: auto;
    }
    h1{
        text-align: center;
    }
    #text{
        width: 100%;
        height: 500px;
        border: 1px solid red;
        overflow: scroll;
    }
    #previous{
        float: left;
    }
    #next{
        float: right;
    }
</style>
<body>

<div class="container">
    <h1>
<!-- File Name yazdirmaq ucun classda yaratdigim getFileName funksiyasini cagirmishem... -->
        <?= $obj->getFileName(); ?>
    </h1>
    <p id="text">
        <?php
//        Texsti yazdirmaq ucun Classda yaratdigim readFile funksiyasini cagiriram....
        echo $obj->readFile();
        ?>
    </p>

    <div>
        <button id="previous">Previous</button>
        <button id="next">Next</button>
    </div>
</div>

</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

//    Text fileni gozleme yashamamaq ucun Ajaxdan istifade elemishem
//    ve mueyyen ardicilligi gozleyerek lazimi parametleri oturmushem.....

    var min = <?= $min ?>;

    var max = <?= $max ?>;

    var path = "<?= $pathUrl ?>"

    //Next clicini icra eden Ajax sorgu....

    document.querySelector('#next').addEventListener('click',function () {

        min += <?= $max ?>;;

        max += <?= $max ?>;;

        $.ajax({

            type: "POST",

            url: "get.php",

            data:{

                min:min,

                max:max,

                path:path

            },

            success: function(data){

                if (data=='') {

                    document.querySelector('#text').innerText=`<?=$obj->readFile()?>`;

                    min = <?= $min ?>;

                    max = <?= $max ?>;

                } else {

                    document.querySelector('#text').innerText=data;

                }

            }
        });

    });


    //Previos clickini icra edecek Ajax sorgu....

    document.querySelector('#previous').addEventListener('click',function () {

        min -= <?= $max ?>;;

        max -= <?= $max ?>;;

        path = "test.txt";

        if(min > 0) {

            $.ajax({

                type: "POST",

                url: "get.php",

                data:{

                    min:min,

                    max:max,

                    path:path

                },
                success: function(data){

                    document.querySelector('#text').innerText=data;

                }

            });

        } else {

            document.querySelector('#text').innerText=`<?=$obj->readFile()?>`;

            min = <?= $min ?>;

            max = <?= $max ?>;

        }


    });
</script>

