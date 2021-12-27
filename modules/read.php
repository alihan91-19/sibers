<?php

$page = isset($_GET["page"]) ? intval($_GET["page"]) : 0;

$page = isset($_GET["inpage"]) ? intval($_GET["inpage"]) : 10;

$sort = isset($_GET["sort"]) ? ($_GET["sort"] == "asc" ? "asc" : "desc") : "";

$users = $DB->fetch("SELECT * FROM `users` LIMIT ?,?", [$page, $inpage]);

$data = "";

if($users) {
  foreach($users as $value) {
    $data .= "<tr>
      <td>{$value["name"]}</td>
      <td>{$value["email"]}</td>
      <td>{$value["age"]}</td>
    </tr>";
  }

  $data .= '<nav>
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="/' . ($page > 1 ? '?page=' . ($page - 1) : '/') . '">Назад</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="/?page=' . ($page + 1) .'">Вперед</a></li>
    </ul>
  </nav>';
} else {
  $data = "Нет пользователей";
} 

//EOF