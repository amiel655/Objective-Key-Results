$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Update");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Edit');
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $('#objective').val($(this).data('objective'));
          $('#description').val($(this).data('description'));
          $('#date_received').val($(this).data('date_received'));
          $('#days_ago').val($(this).data('days_ago'));
          $('#date_due').val($(this).data('date_due'));
          $('#man_hours').val($(this).data('man_hours'));
          $('#status').val($(this).data('status'));
          $('#remarks').val($(this).data('remarks'));
          $('#myModal').modal('show');
      });

      $('.modal-footer').on('click', '.edit', function() {

        $.ajax({
            type: 'post',
            url: '/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'objective': $('#objective').val(),
                'description': $('#description').val(),
                'date_received': $('#date_received').val(),
                'days_ago': $('#days_ago').val(),
                'date_due': $('#date_due').val(),
                'man_hours': $('#man_hours').val(),
                'status': $('#status').val(),
                'remarks': $('#remarks').val(),
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.objective + "</td><td>" + data.description + "</td><td>" + data.date_received + "</td><td>" + data.days_ago + "</td><td>" + data.date_due + "</td><td>" + data.man_hours + "</td><td>" + data.status + "</td><td>" + data.remarks + "</td></tr>");
            }
        });
    });
});