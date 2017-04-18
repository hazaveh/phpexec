<?php
/**
 * Author: mahdi@hazaveh.net
 * Date: 18/04/2017
 * Time: 12:25 PM
 */

class Snippets {

    public function __construct()
    {
        header('Content-Type: application/json');
        if ($_GET["action"]) {
            switch ($_GET["action"]) {
                case "store":
                    $this->store();
                    break;
                case "get":
                    $this->get();
                    break;
            }
        }

    }

    public function store() {
        if ($_POST["name"] && $_POST["code"]) {
            try {
                chdir("../snippets/");
                $snippet = json_encode([
                    "name" => $_POST["name"],
                    "code" => $_POST["code"]
                ]);

                $name = uniqid("phpexec_");
                $name = getcwd() . DIRECTORY_SEPARATOR . $name . ".json";
                file_put_contents($name, $snippet);

                echo json_encode(["status"=>"success"]);

            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            echo json_encode(["status"=>"error"]);
        }
    }

    public function get() {
            try {
                chdir("../snippets/");
                $snippetsPath = getcwd();
                $snippets = array_slice(scandir($snippetsPath), 2);
                foreach ($snippets as $i => $v) {
                    if (strpos($v, "phpexec") === false) {
                        unset($snippets[$i]);
                    }
                }
                $output = [];
                foreach ($snippets as $snippet) {
                    $output[] = json_decode(file_get_contents($snippetsPath . DIRECTORY_SEPARATOR . $snippet));
                }

                echo json_encode($output);

            } catch (Exception $e) {

            }
    }

    public function delete() {

    }
}

$run = new Snippets();

