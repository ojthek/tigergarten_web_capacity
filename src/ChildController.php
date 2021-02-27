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
}

?>
