<?php
class User_remember
{
                                        private $id;
                                        private $username;
                                        private $email;
                                        private $admin;

                                        public function __construct($id, $username, $email, $admin)
                                        {
                                                                                $this->id = $id;
                                                                                $this->username = $username;
                                                                                $this->admin = $admin;
                                                                                $this->email = $email;
                                        }
                                        public function getName()
                                        {
                                                                                return $this->username;
                                        }
                                        public function getRole()
                                        {
                                                                                return $this->admin;
                                        }
                                        public function getId()
                                        {
                                                                                return  $this->id;
                                        }
                                        public function getEmail()
                                        {
                                                                                return $this->email;
                                        }
}
