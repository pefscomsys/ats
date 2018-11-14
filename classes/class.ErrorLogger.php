<?php
/**
 *
 */
class ErrorLogger
{
    private $exception;
    private $message;
    private $trace;
    private $dbc;

    function __construct($exception, $dbc)
    {
        $this->exception = $exception;
        $this->message  = $exception->getMessage();
        $this->trace = $exception->getTrace();
        $this->log();
    }

    private function log()
    {
        $query = "INSERT INTO `error_logs`
            (`message`, `stack_trace`)
            VALUES
            ('$this->message', '$this->trace')
        ";

        $this->dbc->query($query);
    }
}

 ?>
