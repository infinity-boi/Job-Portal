<?php

if (!function_exists('renderYearOptions')) {
  function renderYearOptions($old = "")
  {
    $year = date('Y') + 1;
    $a = 0;
    while ($a < 9) {
      $year--;
      $selected = (!empty($old) && $year == $old) ? "selected" : "";
      echo '<option ' . $selected . ' value="' . $year . '">' . $year . '</option>';
      $a++;
    }
  }
}

if (!function_exists('renderExperienceOptions')) {
  function renderExperienceOptions($old = "")
  {
    $experience = [
      ["label" => "0 (Fresher)", "value" => 0],
      ["label" => "06 Months", "value" => 6],
      ["label" => "1 Year", "value" => 12],
      ["label" => "1.5 Years", "value" => 18],
      ["label" => "2 Years", "value" => 24],
      ["label" => "2.5 Years", "value" => 30],
      ["label" => "3 Years", "value" => 36],
      ["label" => "3+ Years", "value" => 50],
    ];

    foreach ($experience as $exp) {
      $selected = ($exp["value"] == $old) ? "selected" : "";
      echo '<option ' . $selected . ' value="' . $exp["value"] . '">' . $exp["label"] . '</option>';
    }
  }
}

if (!function_exists('renderExperience')) {
  function renderExperience($exp)
  {
    $experience = [
      ["label" => "0 (Fresher)", "value" => 0],
      ["label" => "06 Months", "value" => 6],
      ["label" => "1 Year", "value" => 12],
      ["label" => "1.5 Years", "value" => 18],
      ["label" => "2 Years", "value" => 24],
      ["label" => "2.5 Years", "value" => 30],
      ["label" => "3 Years", "value" => 36],
      ["label" => "3+ Years", "value" => 50],
    ];

    foreach ($experience as $expOption) {
      if ($expOption['value'] == $exp) {
        return $expOption['label'];
      }
    }

    return ""; // Default if no match
  }
}

if (!function_exists("is_in_array")) {
  function is_in_array($array, $key, $key_value)
  {
    foreach ($array as $k => $v) {
      if (is_array($v)) {
        if (is_in_array($v, $key, $key_value) === 'yes') {
          return 'yes';
        }
      } else {
        if ($v == $key_value && $k == $key) {
          return 'yes';
        }
      }
    }
    return 'no';
  }
}

if (!function_exists("thousandsCurrencyFormat")) {
  function thousandsCurrencyFormat($num)
  {
    if ($num > 1000) {
      $x = round($num);
      $x_number_format = number_format($x);
      $x_array = explode(',', $x_number_format);
      $x_parts = array('k', 'm', 'b', 't');
      $x_count_parts = count($x_array) - 1;
      $x_display = $x_array[0] . ((int)$x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
      $x_display .= $x_parts[$x_count_parts - 1];

      return $x_display;
    }

    return $num;
  }
}

if (!function_exists('renderJobType')) {
  function renderJobType($type)
  {
    $types = [
      1 => "Full Time",
      2 => "Part Time",
      3 => "Contract",
      4 => "Internship",
      5 => "Office"
    ];

    return $types[$type] ?? ""; // Return empty if no match
  }
}

if (!function_exists('renderHiringFromArray')) {
  function renderHiringFromArray($array)
  {
    $array = json_decode($array, true); // Decode as associative array for better handling
    if (!is_array($array)) {
      return ''; // Return empty if not an array
    }

    $new_array = array_map('renderHiring', $array);
    return join(', ', $new_array);
  }
}

if (!function_exists('renderHiring')) {
  function renderHiring($type)
  {
    $types = [
      1 => 'Face to Face',
      2 => 'Written Test',
      3 => 'Telephonic',
      4 => 'Group Discussion',
      5 => 'Walk In'
    ];

    return $types[$type] ?? ""; // Return empty if no match
  }
}

if (!function_exists('renderGender')) {
  function renderGender($type)
  {
    $genders = [
      1 => 'Male',
      2 => 'Female',
      3 => 'Male and Female'
    ];

    return $genders[$type] ?? ""; // Return empty if no match
  }
}

if (!function_exists('applicationHasUser')) {
  function applicationHasUser($applications, $user_id)
  {
    foreach ($applications as $appl) {
      if ($appl['user_id'] == $user_id) {
        return true;
      }
    }
    return false;
  }
}

if (!function_exists('renderSkillNames')) {
  function renderNames($collections, $id_array, $search, $seek)
  {
    $new_arr = [];
    if (!is_array($id_array)) {
      return $new_arr; // Return empty if id_array is not an array
    }

    foreach ($collections as $collection) {
      if (isset($collection->$search) && in_array($collection->$search, $id_array)) {
        $new_arr[] = $collection->$seek ?? null;
      }
    }
    return $new_arr;
  }
}
