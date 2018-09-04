 var path = "{{ url('api/customerswithorders') }}";
         $('input.typeahead').typeahead({
            source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    // console.log(data);
                    return process(data);
                });
            }
        });

        $(document).ready(function() {
            $('#search').keyup(function() {
               var query = $.trim($(this).val());
               if (query === '') {
                    $('#results').css('display', 'none');
                    // return;
                } else {
                    $('#results').css('display', 'block');
                    $.ajax({
                        type: "GET",
                        url: "{{ url('api/customerswithorders') }}" + "?customer=" + query,
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            $.each(data, function(index, customer){
                                $('#results').append("<div class='result'>" + "<a target=_blank href='customers/"+customer.id+"'>" + customer.name + "</a>" + "</div>");
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });   
                }
            })
        });