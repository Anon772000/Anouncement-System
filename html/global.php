<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
$arr1 = json_decode(file_get_contents('assets/json/global.json'), true);
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
            <img src="assets/img/logo/sixt5.png" style="height:10em;" alt="">
        </div>
        <div class="row">
            <div class="col-md-6 mr-auto ml-auto text-center">
                The Current time is <?=$time?> <br><br>
            </div>
        </div>
        <br><br>
        <div class="col-md-10 mr-auto ml-auto text-center">
            <div class="row">
                <form>
                    <div class="form-group">
                        <label for="startTime">Run Time</label>
                        <input type="time" class="form-control" id="startTime" aria-describedby="startTimehelp"value="<?=substr_replace($arr1['timing']['start'],":",2,0)?>">
                        <small id="startTimehelp" class="form-text text-muted">The starting Time in 24hr</small>
                        <input type="time" class="form-control" id="endTime" aria-describedby="endTimehelp"value="<?=substr_replace($arr1['timing']['end'],":",2,0)?>">
                        <small id="endTimehelp" class="form-text text-muted">The Ending Time in 24hr</small>
                    </div>
                    <div class="form-group">
                    <label for="Minhour">Amount of Annoucements an hour</label>
                        <input type="number" class="form-control" id="Minhour" aria-describedby="MinhourHelp" value="<?=$arr1['Annoucements']['min']?>">
                        <small id="MinhourHelp" class="form-text text-muted">The Min in an hour</small>
                        <input type="number" class="form-control" id="Maxhour" aria-describedby="MaxhourHelp"value="<?=$arr1['Annoucements']['max']?>">
                        <small id="MaxhourHelp" class="form-text text-muted">The Min in an hour<</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>