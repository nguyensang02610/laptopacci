<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../library/database.php');
include_once($filepath . '/../helpers/format.php');

?>
<?php

class hedieuhanh
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
    }

	public function show_hdh()
	{
		$query = "SELECT * FROM tbl_hdh";
		$result = $this->db->select($query);
		return $result;
	}

	public function gethdhbyName($name)
	{
		$query = "SELECT * FROM tbl_hdh where hdh_name = '$name' ";
		$result = $this->db->select($query);
		return $result;
	}
}
?>