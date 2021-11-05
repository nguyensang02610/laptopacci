<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . '/../library/session.php');
Session::checkLogin(); // gọi hàm check login để ktra session
include_once($filepath . '/../library/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * 
 */
class adminlogin
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_admin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser); //gọi ham validation từ file Format để ktra
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass); //mysqli gọi 2 biến. (adminUser and link) biến link -> gọi conect db từ file db

        if (empty($adminUser) || empty($adminPass)) {
            $alert = "User and Pass không nhập rỗng";
            return $alert;
        } else {
            $query = "SELECT * FROM tbl_user WHERE user = '$adminUser' AND password = '$adminPass' LIMIT 1 ";
            $result = $this->db->select($query);
            if ($result != false) {
                //session_start();
                // $_SESSION['login'] = 1;
                //$_SESSION['user'] = $user;
                $value = $result->fetch_assoc();
                Session::set('adminlogin', true); // set adminlogin đã tồn tại
                // gọi function Checklogin để kiểm tra true.
                Session::set('adminId', $value['id']);
                Session::set('adminUser', $value['user']);
                Session::set('adminHo', $value['ho']);
                Session::set('adminName', $value['ten']);
                Session::set('adminImage', $value['image']);
                Session::set('adminQuyen', '0');
                header("Location:index.php");
            } else {
                $alert = "Tài khoản hoặc mật khẩu không đúng";
                return $alert;
            }
        }
    }
}
?>