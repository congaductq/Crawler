<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlertAreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
    $this->title = 'Config';
?>

<div align="left">
    <h1>Configuration</h1>
</div>

<form name="start" method="POST" id="startForm">
<div align="center">
<table>
    <tr>
        <td style="display: inline-block;vertical-align: top; margin-right: 30px;">
            <div class="tableTitle"><h3>Database settings</h3></div>
            <table class="smallTable">
                <tr>
                    <td>
                        Database Host
                    </td>
                    <td>
                        <input type="text" name="dbHost" value="<?=$data["dbHost"]?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Database Name
                    </td>
                    <td>
                        <input type="text" name="dbName" value="<?=$data["dbName"]?>"
                    </td>
                </tr>
                <tr>
                    <td>
                        Database Port
                    </td>
                    <td>
                        <input type="text" name="dbPort" value="<?=$data["dbPort"]?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Delay Between Request (s)
                    </td>
                    <td>
                        <input type="text" name="secondsBetweenRequest" value="<?=$data["secondsBetweenRequest"]?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 
                            if ($data["clearData"] == true){
                                echo '<input type="checkbox" name="clearData" id="1" checked>';
                            } else {
                                echo '<input type="checkbox" name="clearData" id="1">';
                            }
                        ?>
                    </td>
                    <td>
                        <label for="1">Clear data</label>
                    </td>
                </tr>
            </table>
        </td>
        <td style="display: inline-block;vertical-align: top; margin-right: 30px;">
            <div class="tableTitle"><h3>Domains</h3></div>
                <table class="smallTable">
                <tr>
                    <td>
                        <?php 
                            if ($data["domains"]["1"] == true){
                                echo '<input type="checkbox" name="domains" value="1" id="batdongsan" checked>';
                            } else {
                                echo '<input type="checkbox" name="domains" value="1" id="batdongsan">';
                            }
                        ?>
                    </td>
                    <td>
                        <label for="batdongsan">www.batdongsan.com.vn</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 
                            if ($data["domains"]["2"] == true){
                                echo '<input type="checkbox" name="domains" value="2" id="muabannhadat" checked>';
                            } else {
                                echo '<input type="checkbox" name="domains" value="2" id="muabannhadat">';
                            }
                        ?>
                    </td>
                    <td>
                        <label for="muabannhadat">www.muabannhadat.vn</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 
                            if ($data["domains"]["3"] == true){
                                echo '<input type="checkbox" name="domains" value="3" id="nhadat24h" checked>';
                            } else {
                                echo '<input type="checkbox" name="domains" value="3" id="nhadat24h">';
                            }
                        ?>
                    </td>
                    <td>
                        <label for="nhadat24h">www.nhadat24h.net</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 
                            if ($data["domains"]["4"] == true){
                                echo '<input type="checkbox" name="domains" value="4" id="alonhadat" checked>';
                            } else {
                                echo '<input type="checkbox" name="domains" value="4" id="alonhadat">';
                            }
                        ?>
                    </td>
                    <td>
                        <label for="alonhadat">www.alonhadat.com.vn</label>
                    </td>
                </tr>
            </table>
        </td>
        <td style="display: inline-block;vertical-align: top;">
            <div class="tableTitle"><h3>Data</h3></div>
            <div style="overflow-y: scroll; height:300px;">
                <table class="smallTable">
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["1"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="1" id="1" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="1" id="1">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="1">Room Number</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["2"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="2" id="2" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="2" id="2">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="2">Area</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["3"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="3" id="3" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="3" id="3">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="3">Address</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["4"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="4" id="4" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="4" id="4">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="4">Direction</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["5"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="5" id="5" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="5" id="5">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="5">Number Of Bedrooms</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["6"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="6" id="6" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="6" id="6">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="6">Number Of Bathrooms</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["7"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="7" id="7" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="7" id="7">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="7">Project</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["8"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="8" id="8" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="8" id="8">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="8">Floor</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["9"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="9" id="9" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="9" id="9">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="9">Utilities</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["10"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="10" id="10" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="10" id="10">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="10">Environment</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["11"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="11" id="11" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="11" id="11">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="11">Description</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["12"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="12" id="12" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="12" id="12">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="12">Price Per Metre Square</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["13"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="13" id="13" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="13" id="13">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="13">Price</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["14"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="14" id="14" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="14" id="14">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="14">Images</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["15"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="15" id="15" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="15" id="15">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="15">City</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["16"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="16" id="16" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="16" id="16">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="16">District</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if ($data["apartmentInfo"]["17"] == true){
                                    echo '<input type="checkbox" name="apartmentInfo" value="17" id="17" checked>';
                                } else {
                                    echo '<input type="checkbox" name="apartmentInfo" value="17" id="17">';
                                }
                            ?>
                        </td>
                        <td>
                            <label for="17">Title</label>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
</div>
<div id="foo"><input type="submit" class="btn btn-success" value="Start" id="btnStart"></div>
<div id="foo2"><input type="submit" class="btn btn-info" value="Save config" id="btnConfig"></div>
</form>
<form name="stop" method="POST" action="http://localhost:3200/api/crawler/stop">
    <div id="foo3"><input type="submit" class="btn btn-danger" value="Stop"></div>
</form>

<style>
    #foo {
        position: fixed;
        bottom: 70px;
        left: 20px;
    }
    #foo2 {
        position: fixed;
        bottom: 70px;
        left: 100px;
    }
    #foo3 {
        position: fixed;
        bottom: 70px;
        left: 220px;
    }
    .smallTable {
        font-size: 16px;
    }
    .smallTable td:nth-child(1) {  
        text-align: right;
    }
    .smallTable td:nth-child(2) {  
        text-align: left;
    }
    .smallTable tr:last-child > td {  
        border-bottom: 0px;
    }
    .smallTable td {
        padding-top: 5px;
        padding-left: 20px;
        padding-bottom: 5px;
        border-bottom: 1px solid #B2EBF2;
    }
    input[type="checkbox"]{
      width: 16px;
      height: 16px; 
      cursor: pointer;
      zoom: 1.1;
    }
    .tableTitle{
        text-align: center;
        color: #00BCD4;
    }
    label {
        font-weight: normal !important;
    }
</style>
<link rel="stylesheet" href="jAlert-master/dist/jAlert.css">
<script src="jAlert-master/dist/jAlert.min.js"></script>
<script src="jAlert-master/dist/jAlert-functions.min.js"></script> <!-- COMPLETELY OPTIONAL -->

<?php
$script = <<< JS
    $(function(){
        $('form[name=start]').submit(function(){
        $.post($(this).attr('action'), $(this).serialize(), function(json) {
            alert(json);
        }, 'json');
        return false;
      });
    }); 
    $(function(){
        $('form[name=stop]').submit(function(){
        $.post($(this).attr('action'), $(this).serialize(), function(json) {
            alert(json);
        }, 'json');
        return false;
      });
    }); 
    $('#btnStart').click(function(){
        var form = document.getElementById("startForm")
        form.action = "http://localhost:3200/api/crawler/start";
    });

    $('#btnConfig').click(function(){
        var form = document.getElementById("startForm")
        form.action = "http://localhost:3200/api/crawler/config";
    });
JS;
$this->registerJs($script);
?>