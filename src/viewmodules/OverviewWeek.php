<?php
    if (isset($_SESSION["week"])) {
        $current_date = new TimeHelper($_SESSION["week"]);

    }else {
        $current_date = new TimeHelper();
        $_SESSION["week"] = $current_date->getDate();
    }
?>
<table>
    <form action="controller.php" method="post">
    <thead>
        <tr>
            <th rowspan="2"><button type="submit" name="action" value="weekBefore">zurück</button></th>
            <th colspan="5">
                Woche <?= $current_date->getDate()->format("W"); ?> vom <?= $current_date->getDate()->format("d-m-Y"); ?> bis <?= $current_date->weekAfter()->format("d-m-Y"); ?>
                <button type="submit" name="action" value="weekToday">Heute</button>
            </th>
            <th rowspan="2"><button type="submit" name="action" value="weekAfter">nächste</button></th>
        </tr>
        <tr>
            <th>Montag</th>
            <th>Dienstag</th>
            <th>Mittwoch</th>
            <th>Donnerstag</th>
            <th>Freitag</th>
        </tr>
    </thead>
    </form>
    <tbody class="overview">
        <tr>
            <td></td>
<?php
    $from = $current_date->getDate();
    $to = $current_date->weekAfter();
    $result = $childController->getChilds4Period($from, $to);
    $day_helper = array("onMon", "onTue", "onWed", "onTur", "onFri");
    $child2day = [];
    while ($child = $result->fetch_array()){
        foreach($day_helper as $day) {
            if ($child[$day] == 1) {
                if (!isset($child2day[$day])) {
                    $child2day[$day] = [];
                }
                array_push($child2day[$day], $child["name"]);
            }
        }
    }
    foreach($day_helper as $day) {
        echo "<td>";
        foreach ($child2day[$day] as $name) {
            echo $name."<br/>";
        }
        echo "</td>";
    }    
?>
            <td></td>
        </tr>
    </tbody>
    <tfoot class="overview">
        <tr>
            <td>Freie Kapazität</td>
<?php
    foreach($day_helper as $day) {
        echo "<td class=\"".(($_MAX_CAPA - count($child2day[$day])>0) ? "freeCapa" : "exhausted")."\">".($_MAX_CAPA - count($child2day[$day]))."</td>";
    }
?>
            <td>max. Kapazität <?=$_MAX_CAPA;?></td>
        </tr>
    </tfoot>
</table>