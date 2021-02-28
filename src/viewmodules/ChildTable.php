<table id="childs">
            <thead>
                <tr>
                    <th rowspan="2" onclick="sortTable(this, 'childs', 0);" class="sort">Name</th>
                    <th rowspan="2" onclick="sortTable(this, 'childs', 1);" class="sort">Von</th>
                    <th rowspan="2" onclick="sortTable(this, 'childs', 2);" class="sort">Bis</th>
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
        echo "<button type=\"submit\" name=\"action\" value=\"editChild\">Ändern</button>\n";
        echo "<button type=\"submit\" name=\"action\" value=\"delChild\" onclick=\"return confirmDelete('".$child->name."');\">Löschen</button></form></td>\n";
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
                    <td><button type="submit" name="action" value="addChild">Hinzufügen</button></td>
                </tr></form>
            </tfoot>
        </table>