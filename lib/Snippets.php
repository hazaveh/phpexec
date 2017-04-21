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
                case "destroy":
                    $this->destroy();
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

                $fileName = uniqid("phpexec_");
                $name = getcwd() . DIRECTORY_SEPARATOR . $fileName . ".json";
                file_put_contents($name, $snippet);

                echo json_encode(["status"=>"success", "file" => $fileName . ".json"]);

            } catch (Exception $e) {
                echo json_encode(["status" => "error", "message" => $e->getMessage()]);
            }
        } else {
            echo json_encode(["status"=>"error", "message" => "Data input is empty."]);
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
                    $res = ["file" => $snippet];
                    $res = array_merge($res, json_decode(file_get_contents($snippetsPath . DIRECTORY_SEPARATOR . $snippet), true));
                    $output[] = $res;
                }

                echo json_encode($output);

            } catch (Exception $e) {

            }
    }

    public function destroy() {
            if ($_POST["file"]) {
               try {
                chdir("../snippets/");
                unlink(trim($_POST["file"]));
                echo json_encode(["status"=>"success"]);
               } catch (Exception $e) {
                echo json_encode(["status" => "error", "message" => $e->getMessage()]);
               }     
            } else {
                echo json_encode(["status"=>"error", "message" => "Data input is empty."]);
            }
    }
}

new Snippets();

