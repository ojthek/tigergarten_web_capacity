<!DOCTYPE html>
<?php
    require_once "conf/globals.inc";
?>
<html>
    <head>
        <title>TigeRgarten Kapazitätsmanagement</title>
        <link href="resources/main.css" rel="stylesheet" />
        <script src="resources/main.js" async></script>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">Name</th>
                    <th rowspan="2">Von</th>
                    <th rowspan="2">Bis</th>
                    <th colspan="5">Anwesend</th>
                    <th rowspan="2">Aktion</th>
                </tr>
                <tr>
                    <th class="checked">Montag</th>
                    <th class="checked">Dienstag</th>
                    <th class="checked">Mittwoch</th>
                    <th class="checked">Donnerstag</th>
                    <th class="checked">Freitag</th>
                </tr>
            </thead>
            <tbody>
<?php
    $childs = $childController->getChilds();
    while ($child = $childs->fetch_object()) {
        echo "<tr>\n";
        echo "<td>".$child->name."</td>\n";
        echo "<td>".$child->fromDate."</td>\n";
        echo "<td>".$child->toDate."</td>\n";
        echo "<td class=\"checked\">".printChecked($child->onMon)."</td>\n";
        echo "<td class=\"checked\">".printChecked($child->onTue)."</td>\n";
        echo "<td class=\"checked\">".printChecked($child->onWed)."</td>\n";
        echo "<td class=\"checked\">".printChecked($child->onTur)."</td>\n";
        echo "<td class=\"checked\">".printChecked($child->onFri)."</td>\n";
        echo "<td><form action=\"controller.php\" method=\"POST\">\n";
        echo "<input type=\"hidden\" name=\"id\" value=\"".$child->id."\" />\n";
        echo "<button type=\"submit\" name=\"action\" value=\"edit\">Ändern</button>\n";
        echo "<button type=\"submit\" name=\"action\" value=\"del\" onclick=\"return confirmDelete('".$child->name."');\">Löschen</button></form></td>\n";
        echo "</tr>\n";
    }
?>          </tbody>
            <tfoot>
                <form action="controller.php" method="post"><tr>
                    <td><input type="text" name="name" /></td>
                    <td><input type="date" name="fromDate" /></td>
                    <td><input type="date" name="toDate" /></td>
                    <td class="checked"><input type="checkbox" name="onMon" /></td>
                    <td class="checked"><input type="checkbox" name="onTue" /></td>
                    <td class="checked"><input type="checkbox" name="onWed" /></td>
                    <td class="checked"><input type="checkbox" name="onTur" /></td>
                    <td class="checked"><input type="checkbox" name="onFri" /></td>
                    <td><button type="submit" name="action" value="add">Hinzufügen</button></td>
                </tr></form>
            </tfoot>
        </table>

    </body>
</html>