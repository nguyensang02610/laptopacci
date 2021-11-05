<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../library/database.php');
include_once($filepath . '/../helpers/format.php');

?>
<?php

class thongke
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
    }

	public function thongke_doanhthu_thang()
	{
		$query = "SELECT SUM(price) as 'Doanhthu' FROM tbl_order WHERE (MONTH(date_order)) = (SELECT MONTH(NOW()))";
		$result = $this->db->select($query);
		return $result;
	}

    public function thongke_doanhthu_nam()
	{
		$query = "SELECT SUM(price) as 'Doanhthu' FROM tbl_order WHERE (YEAR(date_order)) = (SELECT YEAR(NOW()))";
		$result = $this->db->select($query);
		return $result;
	}

	public function donhang_canxuly()
	{
		$query = "SELECT COUNT(*) as 'donhang' FROM tbl_order WHERE status != 0";
		$result = $this->db->select($query);
		return $result;
	}

    public function donhang_all()
	{
		$query = "SELECT COUNT(*) as 'donhang' FROM tbl_order WHERE status = 0 or 1";
		$result = $this->db->select($query);
		return $result;
	}

    public function donhang_thanhcong()
	{
		$query = "SELECT COUNT(*) as 'donhang' FROM tbl_order WHERE status = 3";
		$result = $this->db->select($query);
		return $result;
	}


}
?>