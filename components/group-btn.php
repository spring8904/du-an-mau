<div class="d-flex gap-2 my-3">
  <button class="btn btn-primary" onclick="selectAll()">Select All</button>
  <button class="btn btn-secondary" onclick="deselectAll()">Deselect All</button>
  <a href="#" class="btn btn-danger">Delete Selected</a>
  <a href="./?controller=<?= $controller ?>&action=add" class="btn btn-success">Add <?= ucfirst($controller) ?></a>
</div>