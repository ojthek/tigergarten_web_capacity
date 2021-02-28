<?php

class ChildController {
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getChilds() {
        $res = $this->db->query("SELECT id, name, fromDate, toDate, onMon, onTue, onWed, onTur, onFri FROM childs ORDER BY name");

        return $res;
    }

    public function deleteChild($id) {
        $stmt = $this->db->prepare("DELETE FROM childs WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function addChild($name, $fromDate, $toDate, $onMon, $onTue, $onWed, $onTur, $onFri) {
        $stmt = $this->db->prepare("INSERT INTO childs (name, fromDate, toDate, onMon, onTue, onWed, onTur, onFri) VALUES(?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssiiiii", $name, $fromDate, $toDate, $onMon, $onTue, $onWed, $onTur, $onFri);
        $stmt->execute();
    }

    public function updateChild($id, $name, $fromDate, $toDate, $onMon, $onTue, $onWed, $onTur, $onFri) {
        $stmt = $this->db->prepare("UPDATE childs SET name=?, fromDate=?, toDate=?, onMon=?, onTue=?, onWed=?, onTur=?, onFri=? WHERE id=?");
        $stmt->bind_param("sssiiiiii", $name, $fromDate, $toDate, $onMon, $onTue, $onWed, $onTur, $onFri, $id);
        $stmt->execute();
    }

    public function getChilds4Period($from, $to) {
        $stmt = $this->db->prepare("SELECT name, onMon, onTue, onWed, onTur, onFri FROM childs WHERE fromDate < ? AND toDate > ? ORDER BY name");
        $stmt->bind_param("ss", $to->format("Y-m-d"), $from->format("Y-m-d"));
        $stmt->execute();
        return $stmt->get_result();
    }
}

?>
