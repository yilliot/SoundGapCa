$(function(){
  $('.select_goto_url').change(function(){
    window.location.replace($(this).val());
  });
});