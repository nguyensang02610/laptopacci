<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . '/../library/session.php');
Session::checkLogin(); // gọi hàm check login để ktra session
include_once($filepath . '/../library/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
class nhanvien_login
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function nhanvien_login($phone, $password)
    {
        $phone = $this->fm->validation($phone); //gọi ham validation từ file Format để ktra
        $password = $this->fm->validation($password);

        $phone = mysqli_real_escape_string($this->db->link, $phone);
        $password = mysqli_real_escape_string($this->db->link, $password); //mysqli gọi 2 biến. (adminUser and link) biến link -> gọi conect db từ file db

        if (empty($phone) || empty($password)) {
            $alert = "Không được để trống số điện thoại hoặc mật khẩu";
            return $alert;
        } else {
            $query = "SELECT * FROM tbl_nhanvien WHERE phone = '$phone' AND password = '$password' LIMIT 1 ";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set('adminlogin', true); // set adminlogin đã tồn tại
                // gọi function Checklogin để kiểm tra true.
                Session::set('adminId', $value['id']);
                Session::set('adminHo', $value['hoten']);
                Session::set('adminName', $value['note']);
                Session::set('adminImage', $value['image']);
                Session::set('adminQuyen', $value['quyen']);
                if ($value['quyen'] == 1)
                {
                    header("Location:order_list.php");
                }
                else
                {
                    header("Location:index.php");
                }
                
            } else {
                $alert = "Số điện thoại hoặc mật khẩu không đúng";
                return $alert;
            }
        }
    }
}

?>