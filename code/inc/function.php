<?php
function showmon()
{	global $conn;
	$query_dq2="SELECT DISTINCT(MaMH),TenMH FROM monhoc ORDER BY id DESC";
	$categories2=mysqli_query($conn,$query_dq2);
	while($category2=mysqli_fetch_array($categories2,MYSQLI_ASSOC))
	{
			echo("<option value='".$category2["MaMH"]."'>".$category2['TenMH']."</option>");
	}
	return true;
}
function selectmon($name,$class)
{
	global $conn;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>--Chọn môn học--</option>";
	showmon();
	echo "</select>";
}
function showmon1($diachi)
{	global $conn;
	$query_dq3="SELECT DISTINCT(MaMH),TenMH FROM monhoc ORDER BY id DESC";
	$categories3=mysqli_query($conn,$query_dq3);
	while($category3=mysqli_fetch_array($categories3,MYSQLI_ASSOC))
	{
		if($diachi==$category3["MaMH"])
		{			
			echo("<option selected='selected' value='".$category3["MaMH"]."'>".$category3['TenMH']."</option>");
		}else
		{
			echo("<option value='".$category3["MaMH"]."'>".$category3['TenMH']."</option>");
		}
	}
	return true;
}
function selectmon1($name,$class,$diachi)
{
	global $conn;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>--Chọn môn học--</option>";
	showmon1($diachi);
	echo "</select>";
}
function showlop()
{	global $conn;
	$query_dq4="SELECT DISTINCT(MaL),TenL FROM lop ORDER BY id DESC";
	$categories4=mysqli_query($conn,$query_dq4);
	while($category4=mysqli_fetch_array($categories4,MYSQLI_ASSOC))
	{
			echo("<option value='".$category4["MaL"]."'>".$category4['TenL']."</option>");
	}
	return true;
}
function selectlop($name,$class)
{
	global $conn;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>--Chọn lớp--</option>";
	showlop();
	echo "</select>";
}
function showlop1($diachi)
{	global $conn;
	$query_dq5="SELECT DISTINCT(MaL),TenL FROM lop ORDER BY id DESC";
	$categories5=mysqli_query($conn,$query_dq5);
	while($category5=mysqli_fetch_array($categories5,MYSQLI_ASSOC))
	{
		if($diachi==$category5["MaL"])
		{			
			echo("<option selected='selected' value='".$category5["MaL"]."'>".$category5['TenL']."</option>");
		}else
		{
			echo("<option value='".$category5["MaL"]."'>".$category5['TenL']."</option>");
		}
	}
	return true;
}
function selectlop1($name,$class,$diachi)
{
	global $conn;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>--Chọn lớp--</option>";
	showlop1($diachi);
	echo "</select>";
}
function showkhoa()
{	global $conn;
	$query_dq6="SELECT DISTINCT(MaK),TenK FROM khoa ORDER BY id DESC";
	$categories6=mysqli_query($conn,$query_dq6);
	while($category6=mysqli_fetch_array($categories6,MYSQLI_ASSOC))
	{
			echo("<option value='".$category6["MaK"]."'>".$category6['TenK']."</option>");
	}
	return true;
}
function selectkhoa($name,$class)
{
	global $conn;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>--Chọn khoa--</option>";
	showkhoa();
	echo "</select>";
}
function showkhoa1($diachi)
{	global $conn;
	$query_dq7="SELECT DISTINCT(MaK),TenK FROM khoa ORDER BY id DESC";
	$categories7=mysqli_query($conn,$query_dq7);
	while($category7=mysqli_fetch_array($categories7,MYSQLI_ASSOC))
	{
		if($diachi==$category7["MaK"])
		{			
			echo("<option selected='selected' value='".$category7["MaK"]."'>".$category7['TenK']."</option>");
		}else
		{
			echo("<option value='".$category7["MaK"]."'>".$category7['TenK']."</option>");
		}
	}
	return true;
}
function selectkhoa1($name,$class,$diachi)
{
	global $conn;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>--Chọn khoa--</option>";
	showkhoa1($diachi);
	echo "</select>";
}
function showkhoahoc()
{	global $conn;
	$query_dq1="SELECT DISTINCT(MaKH),TenKH FROM khoahoc ORDER BY id DESC";
	$categories1=mysqli_query($conn,$query_dq1);
	while($category1=mysqli_fetch_array($categories1,MYSQLI_ASSOC))
	{
			echo("<option value='".$category1["MaKH"]."'>".$category1['TenKH']."</option>");
	}
	return true;
}
function selectkhoahoc($name,$class)
{
	global $conn;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>--Chọn khóa học--</option>";
	showkhoahoc();
	echo "</select>";
}
function showkhoahoc1($diachi)
{	global $conn;
	$query_dq8="SELECT DISTINCT(MaKH),TenKH FROM khoahoc ORDER BY id DESC";
	$categories8=mysqli_query($conn,$query_dq8);
	while($category8=mysqli_fetch_array($categories8,MYSQLI_ASSOC))
	{
		if($diachi==$category8["MaKH"])
		{			
			echo("<option selected='selected' value='".$category8["MaKH"]."'>".$category8['TenKH']."</option>");
		}else
		{
			echo("<option value='".$category8["MaKH"]."'>".$category8['TenKH']."</option>");
		}
	}
	return true;
}
function selectkhoahoc1($name,$class,$diachi)
{
	global $conn;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>--Chọn khóa học--</option>";
	showkhoahoc1($diachi);
	echo "</select>";
}
function showhedaotao()
{	global $conn;
	$query_dq9="SELECT DISTINCT(MaHDT),TenHDT FROM hedaotao ORDER BY id DESC";
	$categories9=mysqli_query($conn,$query_dq9);
	while($category9=mysqli_fetch_array($categories9,MYSQLI_ASSOC))
	{
			echo("<option value='".$category9["MaHDT"]."'>".$category9['TenHDT']."</option>");
	}
	return true;
}
function selecthedaotao($name,$class)
{
	global $conn;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>--Chọn hệ đào tạo--</option>";
	showhedaotao();
	echo "</select>";
}
function showhedaotao1($diachi)
{	global $conn;
	$query_dq0="SELECT DISTINCT(MaHDT),TenHDT FROM hedaotao ORDER BY id DESC";
	$categories0=mysqli_query($conn,$query_dq0);
	while($category0=mysqli_fetch_array($categories0,MYSQLI_ASSOC))
	{
		if($diachi==$category0["MaHDT"])
		{			
			echo("<option selected='selected' value='".$category0["MaHDT"]."'>".$category0['TenHDT']."</option>");
		}else
		{
			echo("<option value='".$category0["MaHDT"]."'>".$category0['TenHDT']."</option>");
		}
	}
	return true;
}
function selecthedaotao1($name,$class,$diachi)
{
	global $conn;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>--Chọn hệ đào tạo--</option>";
	showhedaotao1($diachi);
	echo "</select>";
}
?>