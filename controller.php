<?php
    require_once "conf/globals.inc";

    if (isset($_POST["action"])) {
        switch ($_POST["action"]) {
            case "weekBefore":
                $date = new TimeHelper($_SESSION["week"]);
                $_SESSION["week"] = $date->weekBefore();
                break;
            case "weekAfter":
                $date = new TimeHelper($_SESSION["week"]);
                $_SESSION["week"] = $date->weekAfter();
                break;
            case "weekToday":
                $date = new TimeHelper();
                $_SESSION["week"] = $date->getDate();
            case "editChild":
                // $childController->updateChild(
                //         $_POST["id"],
                //         $_POST["name"], 
                //         $_POST["fromDate"], 
                //         $_POST["toDate"], 
                //         isset($_POST["onMon"]) ? 1 : 0, 
                //         isset($_POST["onTue"]) ? 1 : 0, 
                //         isset($_POST["onWed"]) ? 1 : 0, 
                //         isset($_POST["onTur"]) ? 1 : 0, 
                //         isset($_POST["onFri"]) ? 1 : 0);
                break;
            case "delChild":
                $childController->deleteChild($_POST["id"]);
                break;
            case "addChild":
                $childController->addChild($_POST["name"], 
                        $_POST["fromDate"], 
                        $_POST["toDate"], 
                        isset($_POST["onMon"]) ? 1 : 0, 
                        isset($_POST["onTue"]) ? 1 : 0, 
                        isset($_POST["onWed"]) ? 1 : 0, 
                        isset($_POST["onTur"]) ? 1 : 0, 
                        isset($_POST["onFri"]) ? 1 : 0);
                break;
            default:
                break;
        }

    }
    http_response_code(302);
    header("Location: /");
?>