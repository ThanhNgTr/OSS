<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script language="javascript">
	function kiemtra() {
		if (a.hoten.value == "") {
			alert("Bạn chưa điền tên")
			a.hoten.focus();
			return false;
		}
		if (a.dienthoai.value == "") {
			alert("Bạn chưa điền SĐT<br> hãy điền số điện thoại để chúng tôi liên lạc lại với bạn")
			a.dienthoai.focus();
			return false;
		}
		if (a.diachi.value == "") {
			alert("Bạn chưa điền địa chỉ")
			a.diachi.focus();
			return false;
		}
		if (a.hoten.value != "" && a.dienthoai.value != "" && a.diachi.value != "") {
			a.submit();
		}
	}
	$(function() {
		$('#row_dim').hide();
		$('#type').change(function() {
			if ($('#type').val() == '1') {
				$('#row_dim').show();
			} else {
				$('#row_dim').hide();
			}
		});
	});
</script>
<!----
<div class="thongtinkhachhang">
<h3>Thông tin thanh toán</h3>
<form action="index.php?content=cart&action=insert" method="POST" id="a" onsubmit="return kiemtra();">
	<table>
		<tr><td class="tieude">Tên khách hàng</td><td><input type="text" name="hoten"/></td></tr>
		<tr><td class="tieude">Địa chỉ giao hàng</td><td><input type="text" name="diachi"/></td></tr>
		<tr><td class="tieude">Số điện thoại</td><td><input type="text" name="dienthoai"/></td></tr>
		<tr><td class="tieude">Email</td><td><input type="text" name="email"/></td></tr>
		<tr><td class="tieude">Ngày nhận: </td><td><input type="date" name="ngaynhan"/></td></tr>
		<tr><td colspan="2" class="submit"><center><input type="submit" value="Đặt hàng"/></center></td></tr>
	</table>
</form>
</div>
-->
<div class="thongtinkhachhang">
	<h3>Thông tin thanh toán</h3>
	<form action="index.php?content=cart&action=insert" method="POST" id="a" onsubmit="return kiemtra();">
		<table>
			<?php
			if (isset($_SESSION['idnd'])) {
				$sql = mysqli_query($link, "select * from nguoidung where idnd='" . $_SESSION['idnd'] . "'");
				$row = mysqli_fetch_array($sql);
			} else {
				$row['tennd'] = null;
				$row['diachi'] = null;
				$row['dienthoai'] = '';
				$row['email'] = null;
			}
			?>
			<tr>
				<td colspan="2" align="center">Thông tin khách hàng</td>
			</tr>
			<tr>
				<td class="tieude">Tên khách hàng</td>
				<td><input type="text" name="hoten" value="<?php echo $row['tennd'] ?>" /></td>
			</tr>
			<tr>
				<td class="tieude">Địa chỉ giao hàng</td>
				<td><input type="text" name="diachi" value="<?php echo $row['diachi'] ?>" /></td>
			</tr>
			<tr>
				<td class="tieude">Số điện thoại</td>
				<td><input type="text" name="dienthoai" value="<?php echo $row['dienthoai'] ?>" /></td>
			</tr>
			<tr>
				<td class="tieude">Email</td>
				<td><input type="email" name="email" value="<?php echo $row['email'] ?>" /></td>
			</tr>
			<tr>
				<td class="tieude">Phương thức: </td>
				<td>
					<select name="phuongthuc" id="type">
						<option value="0">Ship COD</option>
						<option value="1">Chuyển khoản</option>
					</select>

					<!-- <img src="/dienthoai/img/logo-header.png" alt="Lamp" width="32" height="32"> -->
				</td>
			</tr>
			<tr align="center" id="row_dim">
				<td colspan="2">
					<img src="/dienthoai/img/tknh.jpg" alt="Lamp" width="300">
				</td>
			</tr>
			<tr>
				<td colspan=" 2" class="submit">
					<center><input type="submit" value="Đặt hàng" /></center>
				</td>
			</tr>
		</table>
	</form>
</div>