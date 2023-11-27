</div>


<script src="{{asset('js/bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#selected-products').select2();
        $('#selected-products').on('submit', function (e) {
            e.preventDefault();

            var formData = $(this).serialize();
            $.ajax({
                url: "{{route('invoice.store')}}",
                type: "post",
                data: formData,
                success:function (response) {
                    console.log(response)
                },error:function (xhr) {
                    console.log(xhr.responseText)
                }
            })
        });
    });

</script>
</body>
</html>
