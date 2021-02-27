<?php
    require_once "conf/globals.inc";

    var_dump($_POST);

    if (isset($_POST["action"])) {
        switch ($_POST["action"]) {
            case "edit":
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
            case "del":
                $childController->deleteChild($_POST["id"]);
                break;
            case "add":
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