<script>
    $(function () {
        $('#create-modal').on('click', function (e) {
            e.preventDefault();
            $('.modal-title').text('Add Tag');
            $('#action').val('add');
            $('#options_modal').modal('show');
        });
        $(document).on('click', '.edit', function (e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                url: "/admin/tag/" + id + "/edit",
                dataType: "json",
                success: function (html) {
                    $('#name').val(html.data.name);
                    $('#slug').val(html.data.slug);
                    $('#description').val(html.data.descriptions);
                    if(html.data.status === 1){
                        let two = $('#status').prop('checked', true);
                        $.uniform.update(two);
                    }else {
                        $('#status').prop('checked', false);
                    }
                    $('#hidden_id').val(html.data.id);
                    $('.modal-title').text("Edit Tag");
                    $('#action_button').val("edit");
                    $('#action').val("edit");
                    $('#options_modal').modal('show');
                }
            })
        });
        $(document).on('click', '.delete', function(){
            let cat_id = $(this).attr('id');
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            }).then(function(result) {
                if(result.value) {
                    $.ajax({
                        url:"tag/destroy/"+cat_id,
                        success:function(data)
                        {
                            $('#confirmModal').modal('hide');
                            $('#data-table').DataTable().ajax.reload();
                            swal.fire({
                                title:'Deleted!',
                                text:'Tag has been deleted.',
                                type:'success',
                                confirmButtonClass: 'btn btn-success',
                            });
                        }
                    });
                }
            });
        });
        $('#crud-form').on('submit', function (e) {
            e.preventDefault();
            let action = $('#action').val();
            if (action === 'add') {
                $.ajax({
                    url: "{{ route('admin.tag.store') }}",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function (data) {
                        let html = '';
                        if (data.errors) {
                            html += '<div class="alert alert-danger alert-styled-left alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>×</span></button>\n' +
                                '        <h5><i class="icon fa fa-check fa-fw" aria-hidden="true"></i> Error</h5>';
                            for (let count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                            $('#form_result').html(html);
                        } else {
                            $('#crud-form')[0].reset();
                            let two = $('#status').prop('checked', false);
                            $.uniform.update(two);
                            $('#options_modal').modal('hide');
                            swal.fire({
                                title: 'Good job!',
                                text: data.success,
                                type: 'success',
                                confirmButtonClass: 'btn btn-primary',
                            });
                            $('#data-table').DataTable().ajax.reload();
                        }
                    }
                })
            } else if (action === "edit") {
                $.ajax({
                    url: "{{ route('admin.tag.update') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        let html = '';
                        if (data.errors) {
                            html += '<div class="alert alert-danger alert-styled-left alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>×</span></button>\n' +
                                '        <h5><i class="icon fa fa-check fa-fw" aria-hidden="true"></i> Error</h5>';
                            for (let count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                            $('#form_result').html(html);
                        } else {
                            $('#crud-form')[0].reset();
                            let two = $('#status').prop('checked', false);
                            $.uniform.update(two);
                            $('#options_modal').modal('hide');
                            swal.fire({
                                title: 'Good job!',
                                text: data.success,
                                type: 'success',
                                confirmButtonClass: 'btn btn-primary',
                            });
                            $('#data-table').DataTable().ajax.reload();
                        }
                    }
                });
            }
        });
    });
</script>
