<?php
include_once substr(__DIR__, 0, -7).'/config/config.php';

function execute($sql)
{
  $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  mysqli_query($con, $sql);
  mysqli_close($con);
}

function executeResult($sql)
{
  $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  $result = mysqli_query($con, $sql);
  $data = [];
  if ($result != null) {
    while ($row = mysqli_fetch_array($result, 1)) {
      $data[] = $row;
    }
  }
  mysqli_close($con);

  return $data;
}

function executeSingleResult($sql)
{
  $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  $result = mysqli_query($con, $sql);
  $row = null;
  if ($result != null) {
    $row = mysqli_fetch_array($result, 1);
  }
  mysqli_close($con);

  return $row;
}
