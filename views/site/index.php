<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlertAreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
    $this->title = 'Config';
?>

<?php
    if ($status == 0) {
        echo '<input id="status" class="btn btn-danger" value="Stoped" disabled style="width: 80px;">';
    } else {
        echo '<input id="status" class="btn btn-success" value="Running" disabled style="width: 80px;">';
    }
?>
<div align="left">
    <br>
    <h1>Configuration</h1>
</div>
<br>

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
                            if ($data["clearData"]){
                                echo '<input type="checkbox" name="clearData" checked>';
                            } else {
                                echo '<input type="checkbox" name="clearData">';
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
            <div style="overflow-y: scroll; height:320px;">
                <table class="smallTable">
                <?php 
                    for ($i=17; $i>=1; $i--){
                        echo '<tr><td>';
                        if ($data["apartmentInfo"][(string)$i] == true){
                            echo '<input type="checkbox" name="apartmentInfo" value="'.$i.'" id="'.$i.'" checked>';
                        } else {
                            echo '<input type="checkbox" name="apartmentInfo" value="'.$i.'" id="'.$i.'">';
                        }
                        echo '</td>
                            <td><label for="'.$i.'">'.$configName[$i].'</label></td></tr>';
                    }
                ?>
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
    #status {
        position: fixed;
        bottom: 70px;
        right: 20px;
    }
    #foo3 {
        position: fixed;
        top: 70px;
        right: 20px;
    }
    #foo2 {
        position: fixed;
        top: 70px;
        right: 100px;
    }
    #foo {
        position: fixed;
        top: 70px;
        right: 220px;
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

<?php
$script = <<< JS
    var mes1 = "Crawler has been started";
    var mes2 = "Oops, something went wrong";
    $(function(){
        $('form[name=start]').submit(function(){
        $.post($(this).attr('action'), $(this).serialize(), function(json) {
            if (json["crawlerStatus"] == 1) {
                document.getElementById("status").value = "Running";
                document.getElementById("status").className = "btn btn-success";
                alert(mes1);
            } else {
                alert(mes2);
            }
        }, 'json').fail(function(err) {
            var response = JSON.parse(err.responseText);
            alert(err.statusText + ' - ' + response.error);
        });
        return false;
      });
    }); 
    $(function(){
        $('form[name=stop]').submit(function(){
        $.post($(this).attr('action'), $(this).serialize(), function(json, textStatus) {
            if (json["crawlerStatus"] == 0) {
                document.getElementById("status").value = "Stopped";
                document.getElementById("status").className = "btn btn-danger";
                alert("Crawler has been stoped");
            } else {
                alert("Oops, something went wrong");
            }
        }, 'json').fail(function(err) {
            var response = JSON.parse(err.responseText);
            alert(err.statusText + ' - ' + response.error);
        });
        return false;
      });
    }); 
    $('#btnStart').click(function(){
        var form = document.getElementById("startForm");
        mes1 = "Crawler has been started";
        mes2 = "Oops, something went wrong";
        form.action = "http://localhost:3200/api/crawler/start";
    });

    $('#btnConfig').click(function(){
        var form = document.getElementById("startForm");
        mes1 = "Configurations have been saved";
        mes2 = "Configurations have been saved";
        form.action = "http://localhost:3200/api/crawler/config";
    });
JS;
$this->registerJs($script);
?>