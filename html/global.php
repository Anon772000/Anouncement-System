<?php
include "/etc/Anouncement-System/assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
$arr1 = json_decode(file_get_contents('messages.json'), true);
?>
<style>
.btn {
    

    height: 70px !important;
    width: 190px !important;
    text-align: center;
    line-height: 2.5;
}

.separator-line {
    height: 2px;
    width: 44px;
    background-color: #888888;
    margin: 20px auto;
}

.separator-line.separator-primary {
    background-color: #e6e6e6;
}
</style>
</head>

<body>
    <!-- <div class="fixed-top">
        <a style="z-index:99;float:right;margin-right:5em;Margin-top:1em;" type='button' class="btn btn-primary btn-lg"
            href="#">Settings</a>
    </div> -->
    <div class="container">
        <div class="col-md-5 mr-auto ml-auto text-center">
            <img src="/etc/Anouncement-System/assets/img/logo/sixt5.png" style="height:10em;" alt="">
        </div>
        <div class="row">
            <div class="col-md-6 mr-auto ml-auto text-center">
                The Current time is <?=$time?> <br><br>
            </div>
        </div>
        <br><br>
        <div class="col-md-10 mr-auto ml-auto text-center">
        <div class="row">
                
            <?php
             $x = 0;
        foreach ($arr1 as $key => $value){
            if($x < 2){
                print('
                <div class="col text-center">
                <a type="button" class="btn btn-primary btn-lg" href="#">'.$value['name'].'</a>
                </div>
                ');
                $x++;
            }else{
                $x = 1;
                print('
                </div>
                <br>
                <div class="separator-line separator-primary"></div>
                <br>
                <div class="row">
                <div class="col text-center">
                <a type="button" class="btn btn-primary btn-lg" href="#">'.$value['name'].'</a>
                </div>
                ');
            }


        }





            ?>
            

            </div>
        </div>
    </div>

</body>