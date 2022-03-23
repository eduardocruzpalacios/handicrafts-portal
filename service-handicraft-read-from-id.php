<?php

function loadUserHandicraftOnSession($id)
{
  if (!isUserHandicraftOnSession()) {
    $_SESSION['userhandicraft'] = array();
    $result = readUserHandicraft($id);
    if ($result) {
      while ($row = mysqli_fetch_row($result)) {
        $handicraft = new Handicraft();
        $handicraft->set_id($row[0]);
        $handicraft->set_date($row[1]);
        $handicraft->set_user($row[2]);
        $handicraft->set_title($row[3]);
        $handicraft->set_description($row[4]);
        $handicraft->set_onsale($row[5]);
        $handicraft->set_price($row[6]);
        $handicraft->set_img($row[7]);
        array_push($_SESSION['userhandicraft'], $handicraft);
      }
    }
  }
}

function isUserHandicraftOnSession()
{
  if (isset($_SESSION['userhandicraft'])) {
    return true;
  }
  return false;
}
?>