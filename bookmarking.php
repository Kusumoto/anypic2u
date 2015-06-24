<?php
session_start();
if (empty($_SESSION['ses_fbid']))
	header("Location: index.php");
?>
<script type="text/javascript">
    function CloseWindow(alertmsg) {
    	alert(alertmsg);
        window.close();
        window.opener.location.reload();
    }
</script>
<?php
include("func_bookmark.php");

if (empty($_GET)) {
	echo "<body onLoad=\"CloseWindow('ผิดพลาดเกี่ยวกับการรับส่งค่า')\">ผิดพลาดเกี่ยวกับการรับส่งค่า</body>";
	exit();
}

if (empty($_GET['action'])) {
	echo "<body onLoad=\"CloseWindow('ผิดพลาดเกี่ยวกับการรับส่งค่า')\">ผิดพลาดเกี่ยวกับการรับส่งค่า</body>";
	exit();
}

if (empty($_GET['type'])) {
	echo "<body onLoad=\"CloseWindow('ผิดพลาดเกี่ยวกับการรับส่งค่า')\">ผิดพลาดเกี่ยวกับการรับส่งค่า</body>";
	exit();
}

if (empty($_GET['id'])) {
	echo "<body onLoad=\"CloseWindow('ผิดพลาดเกี่ยวกับการรับส่งค่า')\">ผิดพลาดเกี่ยวกับการรับส่งค่า</body>";
	exit();
}


if ($_GET['action'] == 'add') {
	$type = $_GET['type'];
	$id = $_GET['id'];
	$name = $_GET['name'];

	if (empty($_GET['name'])) {
	echo "<body onLoad=\"CloseWindow('ผิดพลาดเกี่ยวกับการรับส่งค่า')\">ผิดพลาดเกี่ยวกับการรับส่งค่า</body>";
	exit();
}

	$type = addslashes($type);
	$id = addslashes($id);
	$name = addslashes($name);

	if (checkbookmark($_SESSION['ses_fbid'],$type,$id) == true) {
		$temp = bookmarking($_SESSION['ses_fbid'],$type,$id,$name);
		if ($temp == true) {
			echo "<body onLoad=\"CloseWindow('การ Bookmark เสร็จสมบูรณ์')\">การ Bookmark เสร็จสมบูรณ์</body>";
		}else{
			echo "<body onLoad=\"CloseWindow('การ Bookmark ผิดพลาด')\">การ Bookmark ผิดพลาด</body>";
		}
	}else{
		echo "<body onLoad=\"CloseWindow('คุณ Bookmark เรื่องนี้ไปแล้ว')\">คุณ Bookmark เรื่องนี้ไปแล้ว</body>";
	}
}

if ($_GET['action'] == 'remove') {
	$type = $_GET['type'];
	$id = $_GET['id'];

	$type = addslashes($type);
	$id = addslashes($id);
	
	if (checkbookmark($_SESSION['ses_fbid'],$type,$id) == false) {
		$temp = removebookmark($_SESSION['ses_fbid'],$type,$id);
		if ($temp == true) {
			echo "<body onLoad=\"CloseWindow('การลบ Bookmark เสร็จสมบูรณ์')\">การลบ Bookmark เสร็จสมบูรณ์</body>";
		}else{
			echo "<body onLoad=\"CloseWindow('การลบ Bookmark ผิดพลาด')\">การลบ Bookmark ผิดพลาด</body>";
		}
	}else{
		echo "<body onLoad=\"CloseWindow('คุณลบ Bookmark เรื่องนี้ไปแล้ว')\">คุณลบ Bookmark เรื่องนี้ไปแล้ว</body>";
	}
}
?>