<?php
/**
 *
 */
class Base64Image
{

    private $imageData;
    private $dbc;

    private $fileName;

    private $extension = 'jpg';

    const destinationPath = "../images/all/";
    const destinationPathShort = "images/all/";

    function __construct($imageData)
    {
        $this->imageData  = $imageData;

        $db = new dbc();
        $dbc = $db->get_instance();

        $this->dbc  = $dbc;
    }

    public function uploadFile()
    {
        $this->prepareName();

        //check if the directory exists
        if($this->directoryExists(SELF::destinationPath))
        {
            //move file
            $this->moveFile();
        }
        else {
            $this->createDirectory(SELF::destinationPath);
            $this->moveFile();
        }

        $this->logImage();
    }

    private function prepareName()
    {
        $const = "CAR_";
        $random = date("YmdHis");
        $extension = $this->extension;

        $fullName = $const . $random . '.' . $extension;

        $this->fileName = $fullName;
    }

    private function directoryExists($directory)
    {
        if(file_exists($directory))
        {
            return true;
        }
        return false;
    }

    private function createDirectory($directory)
    {
         $mode = 0755;
        mkdir($directory, $mode, TRUE);

    }

    private function moveFile()
    {
        $data = $this->imageData;

        list($type, $data)  = explode(';', $data);
        list(, $data) = explode(',', $data);

        $data = base64_decode($data);

        file_put_contents($this->getFilePath(), $data);
    }

    private function logImage()
    {
        $mysql_date = date("Y-m-d");
        $day = date("d");
        $month = date("m");
        $year = date("Y");

        $path = $this->getRelativePath();

        $query = "INSERT INTO `all_pictures`
                (`mysql_date`, `day`, `month`, `year`, `file_path`)
                VALUES
                ('$mysql_date', '$day', '$month', '$year', '$path')
        " ;

        $this->dbc->query($query);
    }

    private function getRelativePath()
    {
        return SELF::destinationPathShort . $this->fileName;
    }

    public function getFilePath()
    {
        return SELF::destinationPath . $this->fileName;
    }
}

 ?>
