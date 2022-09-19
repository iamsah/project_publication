<script>
    // $(document).ready(function() {
    //     $('.js-example-basic-multiple').select2();
    // });

    // ,'id'=>'authors' add input then
    // $('#authors').select2({
    //     authors: true,
    //     multiple: true,
    //     tokenSeparators: [',']
    // });

</script>

{{--    for subcategory display--}}

<script>
    $(document).ready(function() {
        $('#category_id').change(function() {
            var category = $(this).val();
            var path = "{{URL::route('backend.category.getSubcategory')}}";
            $.ajax({
                url:path,
                data: {'category_id':category,'_token':$('meta[name="csrf-token"]').attr('content')},
                method:'post',
                dataType : 'text',
                success:function(response) {
                    $('#subcategory_id').empty();
                    $('#subcategory_id').append(response);
                }
            });
        })
    });
</script>
