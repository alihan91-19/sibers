<?php

$page = isset($_GET["page"]) ? intval($_GET["page"]) : 0;
if($page > 0) $page--;

$inpage = isset($_GET["inpage"]) ? intval($_GET["inpage"]) : 10;

$sort = isset($_GET["sort"]) ? ($_GET["sort"] == "asc" ? "asc" : "desc") : "";

$users = $DB->fetchAll("SELECT * FROM `users` ORDER BY id LIMIT " . ($page*$inpage) . "," . $inpage);

$data = "";

if($users) {
  print_r ($users);
  foreach($users as $value) {
    $data .= '<tr>
      <td>' . $value["id"] . '</td>  
      <td>' . $value["login"] . '</td> 
      <td>' . $value["firstname"] . '</td>
      <td>' . $value["lastname"] . '</td>
      <td>' . getAge($value["birthday"]) . '</td>
      <td>' . getSex($value["sex"]) . '</td>
      <td><a href="' . PATH_BASE . '?req=view&id=' . $value["id"] .'"><svg data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" height="20px" width="20px"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg></a></td>
      <td><a href="' . PATH_BASE . '?req=edit&id=' . $value["id"] .'"><svg data-icon="pencil-alt"  role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="20px" width="20px"><path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path></svg></a></td>
      <td><a href="' . PATH_BASE . '?req=delete&id=' . $value["id"] .'"><svg data-icon="trash-alt"  role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="20px" width="20px"><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg></a></td>
    </tr>';
  }

  $data .= '<nav>
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="' . PATH_BASE . ($page > 1 ? '?page=' . $page : '') . '">Prev</a></li>
      <li class="page-item"><a class="page-link" href="' . PATH_BASE . '?page=' . ($page + 2) .'">Next</a></li>
    </ul>
  </nav>';
} else {
  $data = "Нет пользователей";
} 

//EOF