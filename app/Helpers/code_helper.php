<?php
// Function: used to convert a string to revese in order
/*
* tel_format
* แสดงเบอร์โทรแบบ xxx-xxx-xxxx
* @author
* @Create Date 2564-07-30
* @Update Date
*/
  function tel_format(string $string = NULL)
  {
    return substr($string, 0, 3) . '-' . substr($string, 3, 3) . '-' . substr($string, 6);
  }
/*
* date_thai
* แสดงวันที่ foemat ไทย และเวลา ชม. กับนาที
* @author Natdanai
* @Create Date 2564-07-30
* @Update Date
*/
  function date_thai($strDate = NULL)
  {
    $str_year = date("Y",strtotime($strDate));
    $str_month= date("n",strtotime($strDate));
    $str_day = date("j",strtotime($strDate));
    $str_hour = date("H",strtotime($strDate));
    $str_min = date("i",strtotime($strDate));
    $str_month_cut = Array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    $str_month_thai = $str_month_cut[$str_month];

    if ($str_hour == '00') {
      return "$str_day $str_month_thai $str_year";
    }
    return "$str_day $str_month_thai $str_year $str_hour:$str_min";
  }
  /*
  * datetime_format_value
  * แสดงวันที่ ในรูปแบบ yyyy/mm/ddThh/mm/ss เพื่อไว้แสดง value ใน v_service_edit
  * @author Natdanai
  * @Create Date 2564-08-08
  */
  function datetime_format_value(string $string = NULL) {
      return substr($string, 0, 10) . 'T' . substr($string, 11);
  }

  /*
  * diff_datetime
  * return difference between date
  * @author Benjapon
  * @Create Date  2564-12-08
  */
  function diff_datetime($date_input = NULL) {
    if ($date_input != NULL) {
      date_default_timezone_set("Asia/Bangkok");
      $date_now = Date("Y-m-d H:i:s");
  
      $sub_date = substr($date_now,0 , 10);
      $sub_date_input = substr($date_input, 0, 10);
      $datetime_now = date_create($sub_date);
      $datetime_input = date_create($sub_date_input);
      $diff = date_diff($datetime_input, $datetime_now);
  
      // substring hour
      $sub_hour = substr($date_now, 10, 3);
      intval($sub_hour);
      $sub_hour_input = substr($date_input, 10, 3);
      intval($sub_hour_input);
  
      // substring minute
      $sub_min = substr($date_now, 14, 2);
      intval($sub_min);
      $sub_min_input = substr($date_input, 14, 2);
      intval($sub_min_input);
  
      $day_diff = $diff->format("%R%a");
      $day_diff = intval($day_diff);
  
      // more than 3 days
      if ($day_diff > 3){ 
        echo date_thai($date_input);
      }
      // 1 - 3 days
      else if($day_diff >=1 && $day_diff <=3){
        $day_ago = "Days ago,";
        if ($day_diff ==1) {
          $day_ago = "Day ago,";
        }
        echo $day_diff. " " . $day_ago . " " . $sub_hour_input . ":" . $sub_min_input;
      }
      // same day
      else if($day_diff == 0){
        if($sub_hour-$sub_hour_input >=1){
          echo $sub_hour - $sub_hour_input . " Hours ago";
        }else{
          echo $sub_min - $sub_min_input . " Mins ago";
        }
      }
      else {
        echo "invalid datetime";
      }
    }
    else {
      return "";
    }
  }
  function short_date($date) {
    $abbr_month = array("", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    $month = substr($date, 5, 2);
    $date = substr($date, 8, 2);
    return $abbr_month[$month] . " " . $date;
  }
  function short_time($date_time = "2021-12-11 13:00:00") {
    return substr($date_time, 11, 5);
  }

  function format_date_invoice($full_date) {
    // input    2022-02-06
    // output   February 02, 2022

    $abbr_month = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $month = substr($full_date, 5, 2); // 02

    if ($month[0] == "0") {
      $month = substr($full_date, 6, 1); // 2
    }
    $date = substr($full_date, 8, 2);
    $year = substr($full_date, 0, 4);

    return $abbr_month[$month] . " " . $date . ", " . $year;
  }

  function show_add_service_form() {
    $elem = '<div class="container row">';
		$elem .= '<center>';
		$elem .= '<div class="form-group">';
		$elem .= '<label class="form-label">Step</label>';
		$elem .= '<div class="selectgroup w-100">';
    $elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="150" class="selectgroup-input" onclick="show_service_form()" id="service_step">';
		$elem .= '<span class="selectgroup-button selectgroup-button-icon">';
    $elem .= '<i class="flaticon-home"></i>';
    $elem .= '</span>';
		$elem .= '</label>';
    $elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="150" class="selectgroup-input" onclick="show_container_form()" id="container_step">';
		$elem .= '<span class="selectgroup-button">Container</span>';
		$elem .= '</label>';
		$elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="150" class="selectgroup-input" onclick="show_agent_form()" id="agent_step">';
		$elem .= '<span class="selectgroup-button">Agent</span>';
		$elem .= '</label>';
		$elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="200" class="selectgroup-input" onclick="show_customer_form()" id="customer_step">';
		$elem .= '<span class="selectgroup-button">Customer</span>';
		$elem .= '</label>';
		$elem .= '</div>';
		$elem .= '</div>';
		$elem .= '</center>';
		$elem .= '</div>';
    return $elem;
  }

  function show_agent_form($type = 1) {
    $attr = '';
    if ($type == 2) {
      $attr = 'readonly';
    }
    $elem = '<div class="col-md-2 input-label branch-div">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_tax">Tax number </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6 " style="margin-right: 10%;">';
    $elem .= '<input type="text" class="form-control" id="agn_tax" name="agn_tax" placeholder="12345678" ' . $attr . '>';
    $elem .= '</div>';

    $elem .= '<div class="col-md-2 input-label">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_address">Company location </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6 " style="margin-right: 10%;">';
    $elem .= '<textarea type="text" class="form-control" id="agn_address" name="agn_address" placeholder="Company location" ' . $attr . '></textarea>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<h3>2. Contact information</h3>';
    $elem .= '<div class="row">';
    $elem .= '<div class="col-md-2 input-label">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_firstname">First name </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6 " style="margin-right: 10%;">';
    $elem .= '<input type="text" class="form-control" id="agn_firstname" name="agn_firstname" placeholder="First name" ' . $attr . '>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-2 input-label">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_lastname">Last name </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6 " style="margin-right: 10%;">';
    $elem .= '<input type="text" class="form-control" id="agn_lastname" name="agn_lastname" placeholder="Last name" ' . $attr . '>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-2 input-label">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_tel">Contact number </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6 ">';
    $elem .= '<div class="input-group" style="margin-right: 10%;">';
    $elem .= '<div class="input-group-prepend ">';
    $elem .= '<span class="input-group-text "><i class="fas fa-phone"></i></span>';
    $elem .= '</div>';
    $elem .= '<input type="tel" class="form-control" id="agn_tel" name="agn_tel" placeholder="xxx-xxx-xxxx" ' . $attr . '>';
    $elem .= '</div>';
    $elem .= '</div>';

    $elem .= '<div class="col-md-2 input-label">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_email">Email </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6">';
    $elem .= '<div class="input-group" style="margin-right: 10%;">';
    $elem .= '<div class="input-group-prepend ">';
    $elem .= '<span class="input-group-text "><i class="fas fa-envelope"></i></span>';
    $elem .= '</div>';
    $elem .= '<input type="email" class="form-control" id="agn_email" name="agn_email" placeholder="example@gmail.com" ' . $attr . '>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '</div>';
    return $elem;
  }

  function Convert($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".","");
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false) 
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
    
    $ret = "";
    $baht = ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
    
    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else 
        $ret .= "ถ้วน";
    return $ret;
}
 
function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
    
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}
?>
