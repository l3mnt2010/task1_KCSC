<?php
class Utils
{
                                        private $error;
                                        private $logfile;

                                        function __construct()
                                        {
                                                                                $this->logfile = "_error.log";
                                        }

                                        public function __toString()
                                        {
                                                                                $this->writelog();
                                                                                return "Error: " . $this->error;
                                        }

                                        public function writelog()
                                        {
                                                                                file_put_contents("app/logs/" . date('H_i_s') . $this->logfile, $this->error);
                                        }
}
