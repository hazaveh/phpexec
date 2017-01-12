<?php
/**
 * Authored by Mahdi Hazaveh.
 * Email: Mahdi@hazaveh.net
 * Date: 1/10/2017
 * Time: 6:45 PM
 */
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class ServerCommand extends Command {
    protected function configure()
    {
        $this->setName("serve")
             ->setDescription("Serve the application using php built in server")
             ->setDefinition([
                 new InputOption("host", "--host" , InputOption::VALUE_OPTIONAL, 'change default host'),
                 new InputOption("port", "--port" ,InputOption::VALUE_OPTIONAL, 'change default port')
             ]);
    }
    protected function  execute(InputInterface $input, OutputInterface $output)
    {

        $host = "localhost";
        $port = "8000";

        // Setting Custom Host
        if ($input->getOption("host") != null) {
            $host = $input->getOption("host");
        }

        // Setting Custom Port
        if ($input->getOption("port") != null) {
            $port = $input->getOption("port");
        }
        $output->writeln("<info>Starting Built in PHP Web Server!</info>");
        $output->writeln("<comment>Server running at http://$host:$port</comment>");
        echo shell_exec("php -S $host:$port -c " . __DIR__ . "/../php.ini");
    }
}

Class IncludeCommand extends Command {
    protected function configure()
    {
        $this->setName("make:include")
            ->setDescription("Include your own php files with output");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!file_exists(__DIR__ . "/../includes")) {
            mkdir(__DIR__ . "/../includes");
            $content = '<?php $foo = "bar"; ?>';
            file_put_contents(__DIR__ . "/../includes/foo.php", $content);
            $output->writeln("<info>CREATING INCLUDES FOLDER : SUCCESS</info>");
        } else {
            $output->writeln("<error>INCLUDES FOLDER ALREADY EXISTS!</error>");
        }
        if (!file_exists(__DIR__ . "/../includes.php")) {
$content = '<?php
// Add your filed to the include folder and require them as below:
require_once "includes/foo.php";
?>';
            file_put_contents(__DIR__ . "/../includes.php", $content);
            $output->writeln("<info>CREATING INCLUDES.PHP FILE: SUCCESS</info>");
        } else {
            $output->writeln("<error>INCLUDES FILE ALREADY EXISTS!</error>");
        }
    }
}
