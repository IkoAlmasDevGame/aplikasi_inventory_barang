<?php

namespace model;

class Authentication
{
    protected $table = "users";
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function LoginAuth($username, $password)
    {
        if (empty($_POST['username']) || empty(md5($_POST['password'], false))):
            header("location:error/error-msg.php?HttpStatus=401");
            exit(0);
        else:
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars(md5($_POST['password']), false);
            $akses = htmlspecialchars($_POST['level']);
            password_verify($password, PASSWORD_DEFAULT);
            $hasil = $_POST['angka1'] + $_POST['angka2'];
            if ($akses == 'superadmin') {
                $SQL = "SELECT * FROM $this->table WHERE username = '$username' and password = '$password' and level = 'superadmin'";
                $mysql = $this->db->query($SQL);
                $cek = mysqli_num_rows($mysql);
                if ($cek > 0) {
                    $response = array($username, $password);
                    $response[$this->table] = array($username, $password);
                    if ($row = $mysql->fetch_assoc()):
                        if ($row['level'] == 'superadmin') {
                            $_SESSION['superadmin'] = $row['id'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['nama'] = $row['nama'];
                            $_SESSION['level'] = 'superadmin';
                            $_SESSION['user_akses'] = $akses;
                            if ($hasil == $_POST['hasil']):
                                $_SESSION['status'] = true;
                                header("location:admins/error/error-msg.php?HttpStatus=200");
                                exit(0);
                            else:
                                $_SESSION['status'] = false;
                                unset($_POST['hasil']);
                                header("location:index.php");
                                exit(0);
                            endif;
                        }
                    endif;
                    $_COOKIE['cookies'] = $username;
                    $_SERVER['HTTPS'] = "on";
                    $HttpStatus = $_SERVER["REDIRECT_STATUS"];
                    if ($HttpStatus == 400) {
                        header("location:error/error-msg.php?HttpStatus=400");
                        exit(0);
                    }
                    if ($HttpStatus == 403) {
                        header("location:error/error-msg.php?HttpStatus=403");
                        exit(0);
                    }
                    if ($HttpStatus == 500) {
                        header("location:error/error-msg.php?HttpStatus=500");
                        exit(0);
                    }
                    setcookie($response[$this->table], $row, time() + (86400 * 30), "/");
                    array_push($response[$this->table], $row);
                    die;
                    exit(0);
                } else {
                    unset($_POST['hasil']);
                    $_SESSION['status'] = false;
                    $_SERVER['HTTPS'] = "off";
                    header("location:index.php");
                    exit(0);
                }
            } elseif ($akses == 'admin') {
                $SQL = "SELECT * FROM $this->table WHERE username = '$username' and password = '$password' and level = 'admin'";
                $mysql = $this->db->query($SQL);
                $cek = mysqli_num_rows($mysql);
                if ($cek > 0) {
                    $response = array($username, $password);
                    $response[$this->table] = array($username, $password);
                    if ($row = $mysql->fetch_assoc()):
                        if ($row['level'] == 'admin') {
                            $_SESSION['admin'] = $row['id'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['nama'] = $row['nama'];
                            $_SESSION['level'] = 'admin';
                            $_SESSION['user_akses'] = $akses;
                            if ($hasil == $_POST['hasil']):
                                $_SESSION['status'] = true;
                                header("location:admin/error/error-msg.php?HttpStatus=200");
                                exit(0);
                            else:
                                $_SESSION['status'] = false;
                                unset($_POST['hasil']);
                                header("location:index.php");
                                exit(0);
                            endif;
                        }
                    endif;
                    $_COOKIE['cookies'] = $username;
                    $_SERVER['HTTPS'] = "on";
                    $HttpStatus = $_SERVER["REDIRECT_STATUS"];
                    if ($HttpStatus == 400) {
                        header("location:error/error-msg.php?HttpStatus=400");
                        exit(0);
                    }
                    if ($HttpStatus == 403) {
                        header("location:error/error-msg.php?HttpStatus=403");
                        exit(0);
                    }
                    if ($HttpStatus == 500) {
                        header("location:error/error-msg.php?HttpStatus=500");
                        exit(0);
                    }
                    setcookie($response[$this->table], $row, time() + (86400 * 30), "/");
                    array_push($response[$this->table], $row);
                    die;
                    exit(0);
                } else {
                    unset($_POST['hasil']);
                    $_SESSION['status'] = false;
                    $_SERVER['HTTPS'] = "off";
                    header("location:index.php");
                    exit(0);
                }
            } elseif ($akses == 'petugas') {
                $SQL = "SELECT * FROM $this->table WHERE username = '$username' and password = '$password' and level = 'petugas'";
                $mysql = $this->db->query($SQL);
                $cek = mysqli_num_rows($mysql);
                if ($cek > 0) {
                    $response = array($username, $password);
                    $response[$this->table] = array($username, $password);
                    if ($row = $mysql->fetch_assoc()):
                        if ($row['level'] == 'petugas') {
                            $_SESSION['petugas'] = $row['id'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['nama'] = $row['nama'];
                            $_SESSION['level'] = 'petugas';
                            $_SESSION['user_akses'] = $akses;
                            if ($hasil == $_POST['hasil']):
                                $_SESSION['status'] = true;
                                header("location:petugas/error/error-msg.php?HttpStatus=200");
                                exit(0);
                            else:
                                $_SESSION['status'] = false;
                                unset($_POST['hasil']);
                                header("location:index.php");
                                exit(0);
                            endif;
                        }
                    endif;
                    $_COOKIE['cookies'] = $username;
                    $_SERVER['HTTPS'] = "on";
                    $HttpStatus = $_SERVER["REDIRECT_STATUS"];
                    if ($HttpStatus == 400) {
                        header("location:error/error-msg.php?HttpStatus=400");
                        exit(0);
                    }
                    if ($HttpStatus == 403) {
                        header("location:error/error-msg.php?HttpStatus=403");
                        exit(0);
                    }
                    if ($HttpStatus == 500) {
                        header("location:error/error-msg.php?HttpStatus=500");
                        exit(0);
                    }
                    setcookie($response[$this->table], $row, time() + (86400 * 30), "/");
                    array_push($response[$this->table], $row);
                    die;
                    exit(0);
                } else {
                    unset($_POST['hasil']);
                    $_SESSION['status'] = false;
                    $_SERVER['HTTPS'] = "off";
                    header("location:index.php");
                    exit(0);
                }
            }
        endif;
    }
}