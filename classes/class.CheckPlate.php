<?php
/**
 *
 */
class CheckPlate
{

    private $path;
    private $dbc;

    public $commandOutput;

    public $isPlate;

    public $plateNumber;

    const commandLinux = "alpr --country us --json ";
    const commandWindows = "C:\\Program Files\\openalpr\\alpr.exe --country us --json";

    function __construct($path)
    {
        $this->path = $path;

        $db = new dbc();
        $dbc = $db->get_instance();

        $this->dbc = $dbc;

        //run plate and save log
        $this->runPlate();
    }

    private function runPlate()
    {
        $output = $this->exec();
        $this->commandOutput = $output;

        $this->parseResult();
    }

    private function exec()
    {
        $platform = $this->getPlatform();

        //prepare the environment for runnint the command
        $oldldpath = getenv('LD_LIBRARY_PATH');
        putenv("LD_LIBRARY_PATH=");

        if($platform == "LINUX")
        {
            $fullCommand = SELF::commandLinux . $this->path;
        }
        else {
            $fullCommand = SELF::commandWindows . $this->path;
        }

        //execute the command
        session_write_close();
        exec($fullCommand, $result);

        //sert variables back
        putenv("LD_LIBRARY_PATH=$oldldpath");

        return $result;
    }

    private function getPlatform()
    {
        $OSdetails = php_uname();

        $os = substr($OSdetails, 0, 5);

        if($os == "Linux")
        {
            return "LINUX";
        }
        else {
            return "WINDOWS";
        }
    }

    private function parseResult()
    {
        $result = $this->commandOutput;

        $resultObject = json_decode($result[0]);

        $outputResult = $resultObject->{'results'};

        if(empty($outputResult))
        {
            $this->isPlate = FALSE;
        }
        else {
            $this->isPlate = TRUE;

            //get the plate number
            $number = $outputResult[0]->{'plate'};

            $this->plateNumber = $number;

            $this->SaveLog();
        }
    }

    private function SaveLog()
    {
        $day = date("d");
        $month = date("m");
        $year = date("Y");
        $mysql_date = date("Y-m-d");

        $log = $this->commandOutput[0];

        $plate = $this->plateNumber;

        $pathFixed = str_replace("../", '', $this->path);

        $query = "INSERT INTO `recognised_plates`
            (`day`, `month`, `year`, `mysql_date`,
                `path`, `plate`, `log`
            )
            VALUES
            ('$day', '$month', '$year', '$mysql_date',
                '$pathFixed', '$this->plateNumber', '$log'
            )
        ";

        $this->dbc->query($query);
    }
}

 ?>
