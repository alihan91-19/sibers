<table class="table">
  <thead>
    <tr>
      <th scope="col" >#
      <a href="<?=PATH_BASE . "?sort=desc"?>"><svg data-icon="long-arrow-alt-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" height="20px" width="20px"><path fill="currentColor" d="M168 345.941V44c0-6.627-5.373-12-12-12h-56c-6.627 0-12 5.373-12 12v301.941H41.941c-21.382 0-32.09 25.851-16.971 40.971l86.059 86.059c9.373 9.373 24.569 9.373 33.941 0l86.059-86.059c15.119-15.119 4.411-40.971-16.971-40.971H168z"></path></svg></a>
      <a href="<?=PATH_BASE . "?sort=asc"?>"><svg data-icon="long-arrow-alt-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" height="20px" width="20px"><path fill="currentColor" d="M88 166.059V468c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12V166.059h46.059c21.382 0 32.09-25.851 16.971-40.971l-86.059-86.059c-9.373-9.373-24.569-9.373-33.941 0l-86.059 86.059c-15.119 15.119-4.411 40.971 16.971 40.971H88z"></path></svg></a></th>
      <th scope="col">Login</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Age</th>
      <th scope="col">Sex</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?=$data?>
  </tbody>
</table>