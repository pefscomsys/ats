<?php
/**
 *@author tnced <tncedric@yahoo.com>
 */

class ImageUploader
{
    private $tmpPath;
    private $fileName;

    private $extension;

    private $dbc;

    /**
    * @var $normal  // determines if the script is one level deep or not
    */

    public $normal = true; // default is true.

    const destinationPath = "../images/all/";
    const destinationPathShort = "images/all/";

    function __construct($tmpPath, $extension)
    {
        $this->tmpPath = $tmpPath;
        $this->extension = $extension;

        $db = new dbc();
        $dbc  = $db->get_instance();
        $this->dbc  = $dbc;
    }

    /**
    * @return string the filepath of the uploaded image
    * @param empty accepts nothing. take tmp path from constructor
    */
    public function uploadFile()
    {
        $this->prepareName();

        //test if the directory exist

        if($this->directoryExists($this->getUploadDirectory()))
        {
            //move file
            $this->moveFile();
        }
        else {
            $this->createDirectory($this->getUploadDirectory());
            $this->moveFile();
        }

        $this->LogImage();

        return $this->fileName;
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
        $destination = $this->getUploadUrl();

        // move_uploaded_file($this->tmpPath, $destination);
        if(move_uploaded_file($this->tmpPath, $destination))
        {
        }
        else {
            echo 'Failed to upload Image';
        }

    }

    private function LogImage()
    {
        $mysql_date = date("Y-m-d");
        $day = date("d");
        $month = date("m");
        $year = date("Y");

        $path = $this->getUploadUrl();

        $query = "INSERT INTO `all_pictures`
                (`mysql_date`, `day`, `month`, `year`, `file_path`)
                VALUES
                ('$mysql_date', '$day', '$month', '$year', '$path')
        " ;

        $this->dbc->query($query);
    }

    public function getUploadDirectory()
    {
        //if its a normal upload then use the ../image
        // else use image/
        if($this->normal == false)
        {
            return SELF::destinationPathShort;
        }
        else {
            return SELF::destinationPath;
        }
    }

    public function getUploadUrl()
    {
        //if its a normal upload then use the ../image
        // else use image/
        if($this->normal == false)
        {
            return $this->getRelativePath();
        }
        else {
            return $this->getFilePath();
        }
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
