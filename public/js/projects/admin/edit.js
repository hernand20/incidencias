$(function() {
  $('[data-category]').on('click', editCategoryModal);
  $('[data-level]').on('click', editLevelModal);
});

function editCategoryModal() {
  // ID
  var category_id = $(this).data('category');
  $('#category_id').val(category_id);
  //name
  var category_name = $(this).parent().prev().text();
  $('#category_name').val(category_name);
  //Show
  $('#modalEditarCategory').modal('show');
}
function editLevelModal() {
  // ID
  var level_id = $(this).data('level');
  $('#level_id').val(level_id);
  //name
  var level_name = $(this).parent().prev().text();
  $('#level_name').val(level_name);
  //Show
  $('#modalEditarLevel').modal('show');
}
