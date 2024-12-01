<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tim Kiem Ten</title>
</head>

<body>
  <form method="get" action="#">
    <table border="1" cellspacing="0">
      <tr>
        <td>Ngày </td>
        <td><input type="input" name="ngay"></td>
      </tr>
      <tr>
        <td>Tháng </td>
        <td><input type="input" name="thang"></td>
      </tr>
      <tr>
        <td>Năm </td>
        <td><input type="input" name="nam"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="Submit" value="In thứ" name="Submit"></td>
      </tr>
    </table>
  </form>

  <?php
  function kiemTraNamNhuan($nam)
  {
    if ((($nam % 4 == 0) && ($nam % 100 != 0)) || ($nam % 400 == 0)) {
      return true;
    } else {
      return false;
    }
  }
  function timThu($ngay, $thang, $nam)
  {
    $tong = $ngay;
    for ($i = 1; $i < $thang; $i++) {
      switch ($i) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
          $tong = $tong + 31;
          break;
        case 4:
        case 6:
        case 9:
        case 11:
          $tong = $tong + 30;
          break;
        case 2:
          if (kiemTraNamNhuan($nam) == true) {
            $tong = $tong + 29;
          } else {
            $tong += $tong + 28;
          }
      }
    }
    for ($i = 1970; $i < $nam; $i++) {
      if (kiemTraNamNhuan($i) == true) {
        $tong = $tong + 366;
      } else {
        $tong = $tong + 365;
      }
    }
    return ($tong - 1) % 7;
  }
  ?>

  <?php
  if (isset($_GET['Submit']) && ($_GET['Submit'] == "In thứ")) {
    $ngay = (int)$_GET['ngay'];
    $thang = (int)$_GET['thang'];
    $nam = (int)$_GET['nam'];
    $thu = array("Thứ năm", "Thứ sáu", "Thứ bảy", "Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư");
    $s = timThu($ngay, $thang, $nam);
    echo "Ngày " . $ngay . " tháng " . $thang . " năm " . $nam . " là " . $thu[$s];
  }
  ?>

  <div>
    <a href="index.html">Home</a>
  </div>
</body>

</html>